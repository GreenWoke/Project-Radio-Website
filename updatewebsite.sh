cd ./Project-Radio-Website
git pull
cd ..
rm -rf /var/www/html/*
cp -r -f ./Project-Radio-Website/* /var/www/html
sudo systemctl restart apache2
