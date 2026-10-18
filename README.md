# HTTPS para redpon.com en Ubuntu

Nginx publica los puertos 80 y 443. Las peticiones HTTP redirigen con `301`
a `https://redpon.com`, conservando la ruta y los parámetros. HTTPS reenvía
las peticiones a `app:3000`.

## Preparar el servidor

Necesitas Docker Engine con el complemento `docker compose` en Ubuntu.

1. Configura el registro DNS **A** de `redpon.com` con la IP pública de tu
   servidor. Si publicas un registro **AAAA**, también debe apuntar a este
   servidor y tener conectividad IPv6.
2. Permite TCP **80** y **443** en el firewall del proveedor y en Ubuntu.
   Si UFW está activo, ejecuta `sudo ufw allow 80/tcp` y
   `sudo ufw allow 443/tcp`.
3. Comprueba que ningún otro servicio del servidor ocupa esos puertos.

Esta configuración cubre únicamente `redpon.com`; no solicita un certificado
para `www.redpon.com`.

## Emitir el certificado y activar HTTPS

Desde la carpeta del proyecto, reemplaza el correo por el tuyo y ejecuta:

```sh
sudo sh scripts/certificate.sh init tu-correo@ejemplo.com
```

También puedes ejecutar `sudo sh scripts/certificate.sh init` para registrar
la cuenta de Let's Encrypt sin correo.

El comando acepta los términos de Let's Encrypt, levanta la aplicación y
Nginx en modo inicial HTTP, solicita el certificado y reinicia el proxy con
TLS. Hasta que termine la emisión, HTTPS todavía no estará disponible.
La ruta `/.well-known/acme-challenge/` queda accesible por HTTP para la
validación de Let's Encrypt; las demás rutas redirigen a HTTPS.

Los certificados y claves se guardan en la carpeta existente `certs/`, fuera
de Git. Nginx utiliza `certs/live/redpon.com/fullchain.pem` y
`certs/live/redpon.com/privkey.pem`, que dentro del contenedor corresponden
a `/etc/letsencrypt/live/redpon.com/`. Conserva toda la carpeta `certs/`
entre despliegues: los archivos de `live/` enlazan a los de `archive/`.
Una vez emitido el certificado,
puedes arrancar normalmente con `sudo docker compose up -d`.

## Renovación automática

Primero comprueba que la renovación funciona:

```sh
sudo sh scripts/certificate.sh renew --dry-run
```

Abre el cron de root con `sudo crontab -e` y añade esta línea, sustituyendo
`/ruta/absoluta/redpon` por la ubicación real del proyecto en Ubuntu:

```cron
17 3,15 * * * /bin/sh /ruta/absoluta/redpon/scripts/certificate.sh renew >> /var/log/redpon-certbot.log 2>&1
```

Se comprueba la renovación dos veces al día y se recarga Nginx después de
una ejecución correcta. Mantén abierto el puerto 80 para validar las
renovaciones. Referencia: [documentación de Certbot](https://eff-certbot.readthedocs.io/en/stable/using.html#webroot).

## Verificación

```sh
curl -I 'http://redpon.com/prueba?origen=http'
curl -I https://redpon.com
sudo docker compose exec -T proxy nginx -t
```

La primera petición debe devolver `301` con
`Location: https://redpon.com/prueba?origen=http`. La segunda debe completar
la conexión TLS con un certificado válido.

Si falla la emisión, verifica el DNS, los puertos y los registros:

```sh
sudo docker compose logs proxy
```
