FROM cockpithq/cockpit:core-2.14.1

# CMS-friendly upload limits (php defaults are 2M). Everything runs as root
# on FrankenPHP, so the Railway volume at /var/www/html/storage needs no chown;
# the /install step recreates the storage subfolders on the empty volume.
RUN { \
  echo 'upload_max_filesize = 128M'; \
  echo 'post_max_size = 128M'; \
  echo 'memory_limit = 256M'; \
} > /usr/local/etc/php/conf.d/uploads.ini
