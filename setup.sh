#!/bin/sh

# increase upload size limits
sed -i \
    -e "s/^post_max_size.*/post_max_size = 1000M/" \
    -e "s/^upload_max_filesize.*/upload_max_filesize = 1000M/" \
    /etc/php/php.ini
