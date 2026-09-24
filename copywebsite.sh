rm -rf /var/www/html/*
cp -f ./Project-Radio-Website/.htaccess /var/www/html/.htaccess
cp -r -f ./Project-Radio-Website/* /var/www/html
sudo systemctl restart apache2

