# About
This assesment project is developed for BYLC according to provide SRS.

# Installation
* Make sure your device has all package installed required by Laravel project. For more info: [Laravel Installatin Guide](https://laravel.com/docs/8.x/installation)
* Clone Github project to a local directry.
* Setup Virtual host and point domain to the directory (Optional)
* Install composer dependency. run ```composer install``` in project directory.
* Duplicate .env.example file naming .env and change APP_URL and Database information.
* Run ```php artisan key:generate``` to generate Application Key.
* Run ```php artisan migrate``` to migrate database.
* Run ```php artisan db:seed``` to seed database for default user.
* Additional FakeCustomers and FakeEmployee seeders also available for test data.
* Run database server and development server to test features.

# Default Users
* Email: customer@example.com, Password: password  ---  for Customer account
* Email: employee@example.com, Password: password  ---  for Employee account
* Email: admin@example.com, Password: password  ---  for Admin account
