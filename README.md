# README

1. Go to the project folder
2. Provide the right permission for the `storage` folder.
    Reference: https://stackoverflow.com/questions/30639174/how-to-set-up-file-permissions-for-laravel
    For test purposes, you can use 775 or 777.

2. Create your `.env` file
3. Add database configuration
    ````
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=jokes
    DB_USERNAME=root
    DB_PASSWORD=12345678
    ````
4. In the terminal run the command:
    ````
    php artisan migrate
    ````
   
# Notes
You must to create your own `virtualhost`, set the DocumentRoot (example)

````
DocumentRoot /var/www/html/jokes/public/
````

and provide the following permissions

````
<Directory PROJECT_LOCATION>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Require all granted
</Directory>
````

The `mod_rewrite` should be enabled.

Reference: https://www.digitalocean.com/community/tutorials/how-to-rewrite-urls-with-mod_rewrite-for-apache-on-ubuntu-18-04
