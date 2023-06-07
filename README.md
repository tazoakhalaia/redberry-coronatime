<h1>Coronatime corona statistic App</h1>

<h1>Table of Contents</h1>
<h1>Prerequisites<h1></br>
Tech Stack</br>
Getting Started</br>
Migration</br>
Development</br>
DrawSql</br>

<h1>Prerequisites</h1>

| Logo | Name |
| ---      | ---       |
| <img width="50" height="50" src="https://raw.githubusercontent.com/RedberryInternship/example-project-laravel/7a054d64192f92566a0f48349002e0296a9d5347/readme/assets/php.svg" />    |<h2>PHP</h2> |
|<img width="50" height="50" src="https://github.com/RedberryInternship/example-project-laravel/blob/master/readme/assets/mysql.png?raw=true" />| <h2>MySql</h2>|
|<img width="50" height="30" src="https://github.com/RedberryInternship/example-project-laravel/blob/master/readme/assets/npm.png?raw=true" /> | <h2>NPM</h2>|
|<img width="50" height="50" src="https://github.com/RedberryInternship/example-project-laravel/blob/master/readme/assets/composer.png?raw=true" />|<h2>Composer</h2>|

<h1>Tech Stack</h1>

| Logo | Name |
| ---      | ---       |
| <img width="30" height="30" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" />|<h2>Laravel - back-end framework</h2> |
|<img width="30" height="30" src="https://avatars.githubusercontent.com/u/7535935?v=4&s=400" />| <h2>Spatie Translatable - package for translation</h2>|

<h1>Getting Started</h1>

1.  First of all you need to clone E Space repository from github:</br>
https://github.com/RedberryInternship/tamazi-akhalaia-coronatime.git</br>

2. Next step requires you to run composer install in order to install all the dependencies.</br>
```
composer install
```

3. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:</br>
```
npm install
```

and also:</br>
```
npm run dev
```
in order to build your JS/SaaS resources.</br>
4. Now we need to set our env file. Go to the root of your project and execute this command.</br>
```
cp .env.example .env
```

<h1>MySql</h1>
DB_CONNECTION=mysql</br>
DB_HOST=127.0.0.1</br>
DB_PORT=3306</br>
DB_DATABASE=coronatime</br>
DB_USERNAME=tom</br>
DB_PASSWORD=</br>

after setting up .env file, execute:</br>

```
php artisan config:cache
```

in order to cache environment variables.</br>
Now execute in the root of you project following:</br>

```
php artisan key:generate
```

Which generates auth key.</br>
Now, you should be good to go!</br>

<h1>Migration</h1>
if you've completed getting started section, then migrating database if fairly simple process, just execute:</br>

```
php artisan migrate</br>
```

<h1>Running Unit tests</h1>
Running unit tests also is very simple process, just type in following command:</br>

```
composer test
```

<h1>Development</h1>

You can run Laravel's built-in development server by executing:</br>

```
php artisan serve
```
when working on JS you may run:</br>

```
npm run dev
```
<a href="https://ibb.co/1rqnvNX"><img src="https://i.ibb.co/ZB8JLrg/draw-SQL-coronatime-export-2023-05-21.png" alt="draw-SQL-coronatime-export-2023-05-21" border="0"></a>
