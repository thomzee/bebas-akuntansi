## Installation
You can install this application just like any other Laravel projects.
1. Clone the project
2. Copy the `.env.example` file and name it `.env`
3. Setup `.env` file based on your local environtment
4. Run `composer install`
5. Run `php artisan migrate --seed` to migrate and seed into your database
6. The last step is running `php artisan serve`
7. Open [http://localhost:8000](http://localhost:8000) on your favorite browser.

**_NOTE:_**
Since we need the test running well, if you're using Virtual Host as a replacement of installation step no 7 and 8, please also setup the APP_URL inside the `.env` file.

## Running Test
Simply run `php artisan test` to run the test

## API Documentation
Below is a link provided by postman
[https://documenter.getpostman.com/view/1808439/TW71jRhs](https://documenter.getpostman.com/view/1808439/TW71jRhs)

## Custom Plugins
- Laramap [https://github.com/thomzee/laramap](https://github.com/thomzee/laramap)<br/>
_This is my own open-source project to provide a rapid object mapping, datatables friendly, and consistent response of an API stored on `bebasakuntansi/app/Services/Mapper/Facades/Mapper.php`_
- Generavel<br/>
_This is my own CRUD generator to generate standard API methods to support my project development. I haven't publish this plugin for public yet. This plugin stored on `bebasakuntansi/app/Services/Generavel/Providers/GeneravelServiceProvider.php`_
