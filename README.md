# mt_demo_app
Welcome to the MagicTelecom Demo App

## Goal Prlject
The main goal of this project is to show you how to use our RESTful API. You should be able to learn really quick how to buy numbers and fully manage your inventory.

## Features
- Query our inventory for available locations.
- Buy numbers.
- Review orders

## Installation Instructions

### Using git && Composer 

1- Clone the repo in your projects directory ```git clone git@github.com:MagicTelecom/mt_demo_app.git``` 

2- cd into your new folder ```cd mt_demo_app/```

3- Run composer install to install all dependencies ```php composer.phar install```

4- Update the SDK configuration file to use the live enviromment, and your API token. 

4.1 - To get your API token go to profile page https://www.magictelecom.com/profile , and copy your toke under the Api Tokens section.

4.2 - Open Configuration class located on the vendor folder ```nano vendor/magictelecom/magictelecomapi/src/Configuration.php```, and replace the $BASEURI and $APITOKEN variables. 
  - For production enviromment ensure that the ```$BASEURI``` is set to https://api.magictelecom.com
  - For sandbox enviromment ensure that the ```$BASEURI``` is set to http://sandbox.api.magictelecom.com
  - Update the ```$APITOKEN``` with your token. 


5 - Create a virtual host for this new project. Something like this for apache2: 

```
<VirtualHost *:80>
ServerName demoapp.magictelecom.dev

DocumentRoot "/home/vagrant/projects/mt_demo_app"
DirectoryIndex index.php

<Directory "/home/vagrant/projects/mt_demo_app">
    Options Indexes FollowSymlinks MultiViews
    AllowOverride All
    Allow from All
</Directory>

  ## Logging
  ErrorLog "/var/log/apache2/demoapp.magictelecom.dev_error.log"
  ServerSignature Off
  CustomLog "/var/log/apache2/demoapp.magictelecom.dev_access.log" combined 

  ## Server aliases
  ServerAlias demoapp.magictelecom.dev
  ## SetEnv/SetEnvIf for environment variables
  
  SetEnv APP_ENV prod
</VirtualHost>

```


5- Add your new domain to your /etc/hosts file ```127.0.0.1 demoapp.magictelecom.dev```

6- That's all, you should be able to load the website on your browser http://demoapp.magictelecom.dev
