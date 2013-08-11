#! /bin/sh 
PATH=/sbin:/usr/sbin:/bin:/usr/bin

# Installing Apache2
sudo apt-get install apache2

#Installing Apache2 Module
sudo apt-get install libapache2-mod-php5 libapache2-mod-perl2 php5 php5-cli php5-common php5-curl php5-dev php5-gd php5-imap php5-ldap php5-mhash php5-mysql php5-odbc php-pear php-apc

#Installing MySQL
sudo apt-get install mysql-server mysql-client php5-mysql

#Installing phpMyAdmin
sudo apt-get install libapache2-mod-auth-mysql phpmyadmin

#Download HomeAutomation
echo "Downloading HomeAutomation..."
sudo curl -o home.zip https://codeload.github.com/marlon82/Home-Automation/zip/master
#curl -o home.zip https://codeload.github.com/marlon82/Home-Automation/zip/Marlon


echo "temporäres Verzeichniss erstellen..."
sudo mkdir /temp

echo "unzip HomeAutomation nach temp"
sudo unzip home.zip -d /temp/

echo "Bitte Installationsverzeichniss angeben [/var/www]: \c"
read folder
if [ -n "$folder" ]; then
    dir=$folder
else
    dir="/var/www"
fi
#echo $dir
echo "Kopiere Homepage in das Installations verzeichniss..." 
sudo cp -vR /temp/Home-Automation-master/* $dir

sudo chown -hR www-data:www-data $dir
echo "Owner/Gruppe im Installationsverzeichniss anpassen!"

sudo chmod -R 777 $dir/sensor_graph/
echo "Rechte für JpGraph angepasst!"

echo "Lösche Temp Verzeichniss...."
rm -R /temp


# Apache2 Server rechte für Reboot/shutdown geben....
#echo "%www-data ALL=NOPASSWD: /sbin/shutdown" >> /etc/sudoers
#echo "User \"www-data\" in /etc/sudoers für /sbin/shutdown eingetragen"

#echo "\nOK, installation abgeschlossen...."
#echo "\nBitte im Browser die install.php aufrufen"
#echo "www.<SERVERIP>/skripte/install.php"
