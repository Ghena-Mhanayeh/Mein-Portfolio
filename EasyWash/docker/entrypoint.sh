#!/usr/bin/env bash
set -e

PORT_TO_USE=${PORT:-8080}
sed -ri "s/Listen 80/Listen ${PORT_TO_USE}/" /etc/apache2/ports.conf
sed -ri "s/:80>/:${PORT_TO_USE}>/" /etc/apache2/sites-available/000-default.conf
sed -ri 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# --------- BEGIN: einmalige Migration ----------
# ENV-Namen aus Railway: erst DATABASE_URL parsen, sonst MYSQL*/DB_*
if [ -n "${DATABASE_URL}" ]; then
  php -r '
    $p=parse_url(getenv("DATABASE_URL"));
    printf("export DB_HOST=%s\nDB_PORT=%s\nDB_USER=%s\nDB_PASSWORD=%s\nDB_NAME=%s\n",
      $p["host"], $p["port"]??3306, $p["user"], $p["pass"], ltrim($p["path"],"/"));
  ' >> /tmp/db.env
elif [ -n "${MYSQLHOST}" ]; then
  echo "export DB_HOST=${MYSQLHOST}
export DB_PORT=${MYSQLPORT:-3306}
export DB_USER=${MYSQLUSER}
export DB_PASSWORD=${MYSQLPASSWORD}
export DB_NAME=${MYSQLDATABASE}" >> /tmp/db.env
else
  echo "export DB_HOST=${DB_HOST}
export DB_PORT=${DB_PORT:-3306}
export DB_USER=${DB_USER}
export DB_PASSWORD=${DB_PASSWORD}
export DB_NAME=${DB_NAME}" >> /tmp/db.env
fi
# shellcheck disable=SC1091
. /tmp/db.env

# nur laufen lassen, wenn explizit aktiviert
if [ "${RUN_MIGRATIONS}" = "true" ]; then
  echo "[migrate] checking schema on ${DB_HOST}:${DB_PORT}/${DB_NAME} ..."

  # Prüfe, ob eine Kern-Tabelle existiert (<<< HIER ANPASSEN, z. B. 'users' oder 'bestellungen' >>>)
  MARKER_TABLE="${Kunde:-users}"

  if ! mysql -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" \
       -e "SELECT 1 FROM information_schema.tables WHERE table_schema='${DB_NAME}' AND table_name='${MARKER_TABLE}' LIMIT 1;" \
       >/dev/null 2>&1; then
    if [ -f /var/www/html/sql/schema.sql ]; then
      echo "[migrate] importing sql/schema.sql ..."
      mysql -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" < /var/www/html/sql/schema.sql
      echo "[migrate] import done."
    else
      echo "[migrate] /var/www/html/sql/schema.sql not found!"; exit 1
    fi
  else
    echo "[migrate] schema present, skipping."
  fi
fi
# --------- END: einmalige Migration ----------

exec apache2-foreground
