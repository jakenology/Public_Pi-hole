#!/bin/bash
printuser="jaykepeters"

# Update 
apt-get update -y

# Upgrade
apt-get upgrade -y

# CUPS
apt-get install -y cups

# Printer Admin
usermod -a -G lpadmin $printuser

# Settings
cupsctl --remote-any
/etc/init.d/cups restart

# Done!
echo "CUPS Successfully Installed!"

# foo2zjs
cd /tmp
wget -O foo2zjs.tar.gz http://foo2zjs.rkkda.com/foo2zjs.tar.gz
tar zxf foo2zjs.tar.gz
cd foo2zjs
make
make install
make cups
rm foo2zjs.tar.gz

# Done!
echo "foo2zjs Successfully Installed!"
