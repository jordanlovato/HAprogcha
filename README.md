# HAprogcha
## Installation Instructions

I used Homestead as means to install/develop this application. I'm going to eagerly assume you're doing the same, but if you are not, any Linux, Nginx, PHP stack should work fine, simply substitute the pacakge manager commands (eg `apt` for `yum` or `emerge`). I also tested on a Linux/PHP/Mongo stack running `php -S localhost:YOURFAVPORT` and it worked fine.


0) clone the repo and run `composer install`

0b) You might need to run `sudo apt-get install php-pear php5-dev` to get pecl

1) `sudo pecl install mongodb` (install OpenSSL if you don't have it, I ran `sudo apt-get install libcurl4-openssl-dev pkg-config` on Homestead)

1b) I found that pecl was a jerk on my ubuntu machine. You can try running the same command with the `--nocompress` flag like so `sudo pecl install --nocompress mongodb`. My pecl was also complaining about needing another library to `make` the mongodb driver. I ran `sudo apt-get install libpcre3-dev` 

2) Add `extension=mongodb.so` to your php.ini file

3) run `sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv EA312927` to add the mongodb package management key

4) create the list file for mongodb `echo "deb http://repo.mongodb.org/apt/ubuntu trusty/mongodb-org/3.2 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-3.2.list`

5) update the package database `sudo apt-get update`

6) install mongodb `sudo apt-get install -y mongodb-org`


##Tips##
* You might need to create a `.env` file in your project directory. Use the `.env.example` file as a base and delete all database information (or supply it if your mongodb requires auth).

* Speaking of Auth, if your mongodb requires auth, you probably should also update `config/database.php` file.
