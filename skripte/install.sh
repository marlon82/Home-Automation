#!/bin/bash
PATH=/sbin:/usr/sbin:/bin:/usr/bin

echo ""
echo "########################"
echo "HomeAutomation installer"
echo "########################"
echo ""
echo "Der Installer wird alle benötigten Dateien herunterladen."
echo "Eine bestehende Internetvebindung wird zwingend benötigt!"
echo "########################"
echo ""
echo ""
read -r -p "Wollen Sie jetzt mit der Installation starten? [Y/n] " response
response = ${response,,}    # tolower
if [[ $response =~ ^(yes|y)$ ]]; then
	# Installing Apache2
	sudo apt-get install -y apache2

	#Installing Apache2 Module
	sudo apt-get install -y libapache2-mod-php5 libapache2-mod-perl2 php5 php5-cli php5-common php5-curl php5-dev php5-gd php5-imap php5-ldap php5-mhash php5-mysql php5-odbc php-pear php-apc

	#Installing MySQL
	sudo apt-get install -y mysql-server mysql-client php5-mysql

	#Installing phpMyAdmin
	sudo apt-get install -y libapache2-mod-auth-mysql phpmyadmin

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
	echo "%www-data ALL=NOPASSWD: /sbin/shutdown" >> /etc/sudoers
	echo "User \"www-data\" in /etc/sudoers für /sbin/shutdown eingetragen"

	# Apache2 Server rechte für apt-get geben....
	echo "%www-data ALL=NOPASSWD: /usr/bin/apt-get" >> /etc/sudoers
	echo "User \"www-data\" in /etc/sudoers für /usr/bin/apt-get eingetragen"

	# Apache2 Server rechte für curl geben....
	echo "%www-data ALL=NOPASSWD: /usr/bin/curl" >> /etc/sudoers
	echo "User \"www-data\" in /etc/sudoers für /usr/bin/curl eingetragen"

	# Apache2 Server rechte für unzip geben....
	echo "%www-data ALL=NOPASSWD: /usr/bin/unzip" >> /etc/sudoers
	echo "User \"www-data\" in /etc/sudoers für /usr/bin/unzip eingetragen"

	# Apache2 Server rechte für mkdir geben....
	echo "%www-data ALL=NOPASSWD: /bin/mkdir" >> /etc/sudoers
	echo "User \"www-data\" in /etc/sudoers für /bin/mkdir eingetragen"

	# m h  dom mon dow   command
0 * * * * wget -q -O /dev/null localhost/cd/skripte/cronjop.php?func=1h
* * * * * wget -q -O /dev/null localhost/cd/skripte/cronjop.php?func=1min
1 0 * * * wget -q -O /dev/null localhost/cd/skripte/cronjop.php?func=midnight
*/5 * * * * wget -q -O /dev/null localhost/cd/skripte/cronjop.php?func=5min 
# Minute   Hour   Day of Month       Month          Day of Week        Command    
# (0-59)  (0-23)     (1-31)    (1-12 or Jan-Dec)  (0-6 or Sun-Sat)                
    5       8          *             *                Sat              wget -q -O /dev/null localhost/cd/skripte/cronjop.php?func=backup&table=*
	
	
	read -r -p "Es müssen auch noch die Cronjobs eingerichtet werden. Wollen Sie damit fortfahren? [Y/n] " responseCron
	responseCron = ${responseCron,,}    # tolower
	if [[ $responseCron =~ ^(yes|y)$ ]]; then
		echo "# Minute   Hour   Day of Month       Month          Day of Week        Command  " >> /etc/crontab
		echo "# (0-59)  (0-23)     (1-31)    (1-12 or Jan-Dec)  (0-6 or Sun-Sat)" >> /etc/crontab
		echo "    5       8          *             *                Sat              wget -q -O /dev/null localhost/cd/skripte/cronjop.php?func=backup&table=*" >> /etc/crontab
		echo "    *       *          *             *                 *               wget -q -O /dev/null localhost/cd/skripte/cronjop.php?func=1min" >> /etc/crontab
		echo "   */5      *          *             *                 *               wget -q -O /dev/null localhost/cd/skripte/cronjop.php?func=5min" >> /etc/crontab
		echo "    0       *          *             *                 *               wget -q -O /dev/null localhost/cd/skripte/cronjop.php?func=1h" >> /etc/crontab
		echo "    1       0          *             *                 *               wget -q -O /dev/null localhost/cd/skripte/cronjop.php?func=midnight" >> /etc/crontab
	fi
	
	ip=$(/sbin/ip -o -4 addr list eth0 | awk '{print $4}' | cut -d/ -f1)
	echo "\n\nOK, installation abgeschlossen...."
	echo "\nBitte im Browser die install.php aufrufen"
	echo "http://"$ip"/skripte/install.php"
else
	echo ""
	echo ""
    echo "\n\nDie Installation wurde abgebrochen!\n"
fi
