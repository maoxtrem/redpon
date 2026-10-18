# HTTPS para redpon.com en Ubuntu

## Proyectos en apps/

Cada proyecto tiene su propia carpeta dentro de `apps/` y un servicio
independiente en `docker-compose.yml`. La aplicación actual está en
`apps/redpon/` y se ejecuta en el servicio `redpon`.

```text
apps/
  redpon/
    server.js
    public/
      index.html
```

Para añadir otro proyecto, crea `apps/nombre-proyecto/` y declara un nuevo
servicio en Compose con su imagen o Dockerfile y su propia carpeta montada.
Cada contenedor puede utilizar el mismo puerto interno sin conflicto;
Nginx accede a cada uno por el nombre de su servicio. Añade su dominio y
certificado al proxy cuando vayas a publicarlo. Crear la carpeta por sí
solo no inicia un contenedor.

```sh
sudo docker compose up -d redpon
sudo docker compose logs -f redpon
```

## Servicios internos

MySQL, Mercure y Redis arrancan con Compose. MySQL guarda sus datos en
`./data/mysql` del anfitrión (`/root/redpon/data/mysql` en este VPS), montada
en `/var/lib/mysql` del contenedor y excluida de Git. Conserva esta carpeta
entre despliegues. Mercure y Redis utilizan volúmenes de Docker.
No publican puertos en el VPS ni tienen rutas en Nginx.
Sus direcciones dentro de la red de Compose son `mysql:3306`,
`http://mercure:80` y `redis:6379`. La aplicación todavía no los utiliza.

Las contraseñas y claves JWT están en `.env`, excluido de Git. Para un
despliegue nuevo, copia `.env.example` a `.env` y completa todos los secretos
con valores diferentes (por ejemplo, usando `openssl rand -hex 32`).
MySQL crea la base `redpon` y el usuario `redpon` en su primer arranque;
las variables de inicialización no cambian credenciales de una base existente.

```sh
sudo docker compose up -d mysql mercure redis
sudo docker compose ps
```

Mercure utiliza la [imagen oficial](https://mercure.rocks/docs/deployment/docker)
con claves JWT propias y HTTP interno; Nginx gestionará su acceso público
cuando se configure esa integración.

## Proxy HTTPS

Nginx publica los puertos 80 y 443. Las peticiones HTTP redirigen con `301`
a `https://redpon.com`, conservando la ruta y los parámetros. HTTPS reenvía
las peticiones a `redpon:3000`.

## Preparar el servidor

Necesitas Docker Engine con el complemento `docker compose` en Ubuntu.

1. Configura el registro DNS **A** de `redpon.com` con la IP pública de tu
   servidor. Si publicas un registro **AAAA**, también debe apuntar a este
   servidor y tener conectividad IPv6.
2. Permite TCP **80** y **443** en el firewall del proveedor y en Ubuntu.
   Si UFW está activo, ejecuta `sudo ufw allow 80/tcp` y
   `sudo ufw allow 443/tcp`.
3. Comprueba que ningún otro servicio del servidor ocupa esos puertos.

El certificado cubre `redpon.com` y `portainer.redpon.com`. Ambos registros
DNS deben apuntar al VPS. No se incluye `www.redpon.com`.

## Portainer

Portainer se administra desde `https://portainer.redpon.com`, mediante Nginx
con soporte para WebSocket. El certificado compartido incluye ambos dominios.
Compose reutiliza el volumen externo existente `portainer_data`, conservando
los usuarios y la configuración. No publica el puerto 9443 en el VPS.
En un servidor nuevo, crea primero el volumen con
`sudo docker volume create portainer_data`.

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
