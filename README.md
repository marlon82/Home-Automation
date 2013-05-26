# Home Automation

This is a Home Automation Web Site in conjuntion with the XS1 from ezcontrol.

## Installation

### 1.

You need a web Server such as Apache with SQL and PHP support. 

### 2.

Create the database. Just import the files from the folder `DB_structure\`

### 3.

Download all files from this repository and put them onto your webserver. Open and edit the file `config.php` put in your credentials for the database connection. 

### 4. 

Start a Browser and navigate to your web server url. GoTo settings and change the XS1 IP.

### 5.

Now your done.

## Database structure

* `aktor` holds all imported actuators from XS1
* `config` holds all configs for this project
* `devices` holds all created devices such as refridgerators, ...
* `deviceTypes` holds all device types such as actuators, sensors, devices, ...
* `logsensoren` holds all sensor values
* `rooms` holds all rooms created by you
* `sensoren` holds all imported sensors from XS1

## More information

* coming soon
