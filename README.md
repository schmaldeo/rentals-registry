# rentals-registry
Rentals registry made with plain PHP and HTML and based on MySQL database.

# Features
You can add an item that you rented to the database, then return it. Return site only displays items that are yet to be returned. You can have an overwiew of all the records in the history tab, where you can also export it to .csv file. <br>
Setup is very simple thanks to built-in wizard that automatically detects if the registry was set up already based on presence of `db_conn.php` file. You can set your database connection up there.

<strong>I recommend not to expose it to the internet and only use it in LAN as it might be vulnerable to sniffers (GET method in one of the setup files). The workaround could be to set the `db_conn.php` file manually. </strong>

# Requirements
Webserver (e.g. Apache) <br>
MySQL/MariaDB <br>
PHP

# Installation
Manual: <br>`git clone https://github.com/schmatteo/rentals-registry.git` <br>
Using pre-compiled package on windows: <br>
Just simply open the installer file and enter path to the place where you want the files to be stored (probably Apache root directory)

# To be added
Access control <br>
Dynamic/static background switch <br>

# Screenshots

![alt text](https://i.imgur.com/y9781Tn.png)
![alt text](https://i.imgur.com/TyHR6yN.png)
![alt text](https://i.imgur.com/fJGgCK6.png)
![alt text](https://i.imgur.com/kmvZ0bW.png)
![alt text](https://i.imgur.com/wkCDbp7.png)
