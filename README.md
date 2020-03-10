# README

1. Go to the project folder
2. Run `npm install`
3. Create your `.env` file
4. Add database configuration
    ````
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=jokes
    DB_USERNAME=root
    DB_PASSWORD=12345678
    ````
5. In the terminal run the command:
    ````
    php artisan migrate
    ````
   
Notes:
You must to create your own `virtualhost` and provide the following permissions:
````
<Directory PROJECT_LOCATION>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Require all granted
</Directory>
````

The `mod_rewrite` should be enabled.
Reference: https://www.digitalocean.com/community/tutorials/how-to-rewrite-urls-with-mod_rewrite-for-apache-on-ubuntu-18-04
