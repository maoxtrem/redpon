# Proxy HTTP → HTTPS

Configuración mínima de Nginx:

- `:80` redirige permanentemente a `https://$host$request_uri`.
- `:443` termina TLS y reenvía las solicitudes a `app:3000`.

## Uso

1. Cambia `example.com` y `www.example.com` en `nginx/nginx.conf` por tu dominio.
2. Coloca el certificado y la clave en `certs/fullchain.pem` y `certs/privkey.pem`.
3. Sustituye el servicio `app` por tu aplicación, o ajusta `upstream app` al host y puerto reales.
4. Arranca el proxy:

   ```sh
   docker compose up -d
   ```

Comprueba la redirección con:

```sh
curl -I http://example.com
```

Debe devolver `301` y una cabecera `Location` con `https://...`.
