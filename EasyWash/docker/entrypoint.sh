#!/usr/bin/env bash
set -e

PORT_TO_USE=${PORT:-8080}
sed -ri "s/Listen 80/Listen ${PORT_TO_USE}/" /etc/apache2/ports.conf
sed -ri "s/:80>/:${PORT_TO_USE}>/" /etc/apache2/sites-available/000-default.conf
sed -ri 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

exec apache2-foreground
