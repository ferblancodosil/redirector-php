# Slim Framework 4 Skeleton Application

This application has been created with skeleton application to quickly setup and start working on a new Slim Framework 4 application. 

## Requeriments

* Develop an API with a single endpoint following the following definition
  ````
  POST /api/v1/short-urls
  ````
 
* The authorization will be type "Bearer Token", for example: Authorization: Bearer my-token
* The token will have to satisfy the parentheses problem


## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application. You will require PHP 7.3 or newer.

```bash
composer install
```

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writable.

To run the application in development, you can run these commands 

```bash
composer start
```

Or you can use `docker-compose` to run the app with `docker`, so you can run these commands:
```bash
docker-compose up -d
```
After that, open `http://localhost:8080` in your browser.

Run this command in the application directory to run the test suite

```bash
composer test
```

That's it! Now go build something cool.
