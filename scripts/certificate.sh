#!/bin/sh
set -eu

cd "$(dirname "$0")/.."

case "${1:-}" in
    init)
        if [ -n "${2:-}" ]; then
            set -- --email "$2"
        else
            set -- --register-unsafely-without-email
        fi
        docker compose up -d app proxy
        attempt=0
        until docker compose exec -T proxy nginx -t; do
            attempt=$((attempt + 1))
            if [ "$attempt" -ge 15 ]; then
                echo "Nginx no ha arrancado; revisa docker compose logs proxy." >&2
                exit 1
            fi
            sleep 2
        done
        docker compose run --rm certbot certonly \
            --webroot --webroot-path /var/www/certbot \
            --cert-name redpon.com --domain redpon.com \
            "$@" --agree-tos --non-interactive
        docker compose restart proxy
        docker compose exec -T proxy nginx -t
        ;;
    renew)
        shift
        docker compose run --rm certbot renew --non-interactive "$@"
        docker compose exec -T proxy nginx -t
        docker compose exec -T proxy nginx -s reload
        ;;
    *)
        echo "Uso: sh scripts/certificate.sh {init [correo@ejemplo.com]|renew [--dry-run]}" >&2
        exit 1
        ;;
esac
