#!/bin/bash
# Midnight Theme Installer
# Change Directory
cd /var/www/html/admin/style/vendor/

# Clone the Repository (Download)
sudo git clone https://github.com/jacobbates/pi-hole-midnight.git

# Remove Original CSS
sudo rm -f skin-blue.min.css

# Copy New CSS
sudo cp pi-hole-midnight/skin-blue.min.css .

# Remove Local Repo (Delete)
sudo rm -rf pi-hole-midnight
