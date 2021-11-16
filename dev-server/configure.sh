#!/bin/bash

echo "configure nginx"
sudo rm -R /var/www/html
sudo cp /home/job-application/dev-server/config/nginx/job-application.local /etc/nginx/sites-enabled/job-application.local > /dev/null 2>&1
sudo systemctl restart nginx

echo "create symbolic-links"
sudo ln -sf /home/job-application/www/ /var/www/html

echo "configure php"
sudo cp /home/job-application/dev-server/config/php/7.4/php.ini /etc/php/7.4/fpm/php.ini > /dev/null 2>&1
sudo cp /home/job-application/dev-server/config/php/7.4/xdebug.ini /etc/php/7.4/mods-available/xdebug.ini > /dev/null 2>&1
sudo phpenmod xdebug && sudo systemctl restart php7.4-fpm

echo "composer install"
( cd /home/job-application/www && composer install > /dev/null 2>&1)