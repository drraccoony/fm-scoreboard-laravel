# Convention Game Scoreboard

This application needs a better description

## Local Setup
The following are dependencies for running locally
* PHP (+8.0)
* Composer
* Docker Desktop
* Node
* NPM

With these dependencies installed do the following:
1. Start Docker Desktop
2. Run in terminal `composer require laravel/sail --dev`
3. Copy the file `.env.example` then rename the copy to `.env`
4. Run in terminal `npm install`

This should complete the setup of the local environment

## Local Runtime
To run the Laravel app locally make sure to complete the [Local Setup](#local-setup) first. Once completed then do the following:
1. Run in terminal `npm run dev`
2. Run in another terminal `./vendor/bin/sail up`
3. Wait until `Started Selenium` is seen in the terminal

Now you can visit the site by opening a browser and going to http://localhost

Whenever you make a change to the source files it should automatically refresh in your browser. If not then stop the terminal running `npm run dev` and run the command again.

## Working with the database
To run the migrations and init your database, you'll want to run `sail artisan migrate:fresh`. This will run through all the migration files and populate your database with the tables and columns.

If you want to migrate **and** populate the database with some seed data (sample data to play with), you'll want to run it with the `--seed` parameter, like such: `sail artisan migrate:fresh --seed`.

### Tinkering!
A super useful tool for playing with the database and running queries in the command line/terminal is `sail artisan tinker`.

Some examples:

- Get user id 2 in the DB:
    ```bash
    >>> $team = App\Models\User::find(2)
    ```
- Get user id 4, and return its team relationship.
    ```bash
    >>> $user = App\Models\User::find(2)
    >>> $user->team
    ```
- Create a new team.
    ```bash
    >>> use App\Models\team
    >>> $t = new team;
    >>> $t->name = 'Space Hoots'
    >>> $t->owner_id = 2
    >>> $t->save();
    ```
    This should return `true` if it worked.


<hr>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
