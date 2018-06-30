#!/usr/bin/env bash
#SETTINGS
symfony_version="4.0.*"
#
#EXEC
sudo apt update

#sudo mkdir /var/www

echo Setting up Symfony 4 installation

echo Change Permissions of webroot..
sudo chown -R vagrant:root /var/www

echo create project skeleton..
composer create-project symfony/skeleton /var/www/wg_suche $symfony_version
cd /var/www/wg_suche
composer require symfony/phpunit-bridge
composer require annotations
composer require security
composer require symfony/expression-language
composer require twig
composer require symfony/templating
composer require asset
composer require symfony/yaml

echo setup server config..
sudo a2enmod rewrite
sudo mv /home/vagrant/000-default.conf /etc/apache2/sites-available/000-default.conf
sudo apt install libyaml-dev
sudo pecl install yaml-2.0.0
sudo mv /home/vagrant/20-yaml.ini /etc/php/7.1/fpm/conf.d/20-yaml.ini

echo Setup Db..
mysql -uroot -psecret < /home/vagrant/shema.sql
sudo rm /home/vagrant/shema.sql

echo setup xdebug..
sudo apt install php7.1-dev -y
sudo apt install php-pear -y
sudo apt install libcurl4-openssl-dev -y
sudo mv /home/vagrant/15-xdebug.ini /etc/php/7.1/fpm/conf.d/15-xdebug.ini
sudo pear config-set 'php_ini' '/etc/php/7.1/fpm/php.ini'
sudo pecl install xdebug
sudo chown -R vagrant:root /var/www

echo Setup finished
echo reboot box
sudo reboot