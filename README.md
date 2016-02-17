# HAprogcha
## Installation Instructions

I used Homebrew as means to install/develop this application. I'm going to gracefully assume you're doing the same, but if you are not, any Linux, Nginx, PHP stack should work fine, simply substitute the pacakge manager commands (eg `apt` for `yum` or `emerge`)


1) `sudo pecl install mongodb` (install OpenSSL if you don't have it, I ran `sudo apt-get install libcurl4-openssl-dev pkg-config` on Homestead)
2) Add `extension=mongodb.so` to your php.ini file
3) run `sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv EA312927` to add the mongodb package management key
4) create the list file for mongodb `echo "deb http://repo.mongodb.org/apt/ubuntu trusty/mongodb-org/3.2 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-3.2.list`
5) update the package database `sudo apt-get update`
6) install mongodb `sudo apt-get install -y mongodb-org`

