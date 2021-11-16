#!/bin/bash

echo "update: ubuntu"
sudo apt-get update -y > /dev/null 2>&1

echo "remove apache2"
sudo apt remove apache2.* > /dev/null 2>&1

echo "install zip package"
sudo apt-get install zip -y > /dev/null 2>&1

echo "install nginx"
sudo apt-get install -y nginx > /dev/null 2>&1

echo "install php7.4"
sudo apt install software-properties-common -y > /dev/null 2>&1
sudo add-apt-repository ppa:ondrej/php -y > /dev/null 2>&1
sudo apt-get update -y > /dev/null 2>&1
sudo apt install php7.4 php7.4-fpm php7.4-mbstring php7.4-xml php7.4-zip php7.4-bcmath php7.4-mysql php7.4-xdebug php7.4-curl php7.4-sqlite3 -y > /dev/null 2>&1

echo "install composer"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/bin/composer

echo "install wkhtmltopdf"
sudo apt-get install -y wkhtmltopdf > /dev/null 2>&1

# fix for wkhtmltopdf error: QXcbConnection: Could not connect to display
echo "install xvfb-run"
sudo apt-get install -y xvfb > /dev/null 2>&1

echo "installation done"