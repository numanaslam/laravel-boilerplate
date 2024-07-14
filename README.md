### Developify App for Shopify

#### Usage

This is not a package - it's a full Laravel project that you should use as a starter boilerplate, and then add your own custom functionality.

##### Server Deployment Scripts
```
-- Server Commands --
sudo apt update
sudo apt upgrade
sudo apt install apache2
sudo apt install mysql-server
sudo mysql_secure_installation

-- MySQL Commands --
sudo mysql;
SELECT user,authentication_string,plugin,host FROM mysql.user;
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
FLUSH PRIVILEGES;
create database DB_NAME_HERE;

-- PHP Commands --
sudo apt update
sudo apt-add-repository ppa:ondrej/php
sudo apt update
sudo apt install -y php7.2 php7.2-cli php7.2-common php7.2-gettext php7.2-mysql php7.2-dom php7.2-simplexml php7.2-xml php7.2-curl php7.2-gd php7.2-imagick php7.2-json php7.2-mbstring php7.2-zip
sudo apt install git
sudo apt install composer

-- Phpmyadmin --
sudo apt install phpmyadmin
sudo nano /etc/apache2/apache2.conf
Include /etc/phpmyadmin/apache.conf [put this in the first line]
sudo service apache2 restart

-- Apache Useful Commands --
sudo a2enmod rewrite
sudo service apache2 restart
sudo a2ensite <sitename.conf>
sudo service apache2 restart
```
##### Apache vHost Template
```
<VirtualHost *:80>
  ServerAdmin webmaster@localhost
  ServerName vhost.local
  ServerAlias vhost.local
  DocumentRoot /var/www/loyalty/public
  
  ErrorLog ${APACHE_LOG_DIR}/error.log
  CustomLog ${APACHE_LOG_DIR}/access.log combined
  
  <Directory /var/www/loyalty/public>
          Options Indexes FollowSymLinks MultiViews
          AllowOverride All
          Require all granted
  </Directory>
</VirtualHost>
```

##### Application Setup

- Clone the repository with `git clone`
- Install `redis` server using any helpful article
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate --seed` (it has some seeded data - see below)
- Run `sudo chmod -R 777 storage/` on root folder
- Run `sudo chmod -R 777 backups/` in database folder
- Create a folder in public folder `sudo mkdir qrcodes`. Run `sudo chmod -R 777 qrcodes/` on it
- Open php.ini file in editor `sudo nano /etc/php/7.2/apache2/php.ini` and change the following settings
  - `upload_max_filesize = 20M`
  - `post_max_size = 20M`
  - `max_execution_time = 300`
  - `max_input_time = 300`
- Configure AWS Bucket settings so uploading of files can be done properly
- That's it: launch the main URL and login with default credentials `admin@admin.com` - `password`
- Two cron jobs are provided with this system. You need to add the following Cron entries to your server.
    - `* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1`
- If you are setting up redis queue don't forgot to create `storage/logs/supervisor` folder and assign permissions appropriately.

