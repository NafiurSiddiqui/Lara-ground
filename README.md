# Running the app

-   `php artisan serve`

# Directory Structure

-   `app`: Is where all of the classes resides. Core codes.
-   `bootstrap`: Bootstrap the files needed to start the framework.
-   `config`: Is where all of the config for application resides.
-   `database`: contains all the DB migrations, model factories, and seeds.
-   `public`: contains files for JS, CSS,images,etc. and index.php. `index.php` is the entry point for the application.
-   `resource`: Contains all the views, as well as raw, uncompiled JS, CSS.
-   `routes`: contains all of the route definitions for your application. there are 3 defaults routes included by Laravel. [read more about them ](https://laravel.com/docs/10.x/structure#the-routes-directory)

# Things I learned

-   Routes
-   collection
-   Cache
-   Architecture
-   Blade

# DB config and files

-   Create your usual sql db and run `php artisan migrate` to hook up the DB to laravel.
-   use `ENV` files for storing sensitive information and configuration.
-   `php artisan migrate:rollback` : This is to rollback to the previous migration.
-   `... migrate:fresh`: Will drop the tables and re-create the tables. **NEVER** use it in production.
-   Always change the `APP_ENV` to `production` before production.

# ELOQUENT

-   This is Laravel's ORM - ( Object Relational Mapper)
-   is a fancy term for how Laravel's way of interacting with your DB table.
-   Each of the DB table will have a corresponding Eloquent model.
-   If you have user table it will correspond to the User Model and instances of user will go to what is known as `active pattern` ( records of USER object inside the DB).

# Creating User ( DEVELOPMENT )

-   run `php artisan tinker`
-   `$user = new App\Models\User` to create an user instance.
-   `$user->name = <Name>`, `$user->email = <email>`, `$user->password = bcrypt(<pass>)` to fill out the necessary user fields.
-   `$user->save()` to save it to the DB.
-   run `$user` and you shall see the user information.
-   `User::find(id<int>)` or `User::findOrFail(id<int>)` with id number, name etc, will show you the details of the user.
-   `User::all()` returns all users info.
-   `User::pluck(name<string>)` will return only the column mentioned.

# Creating additional tables and so on

-   `php artisan make:migration` - helps you with creating additonal tables
-   `php artisan -help make:migration`- shows you the list of commands available to you.
-   General rule of thumb, make sensible name for what the migration does. e.g - `... create_posts_table`
-   Each time you make a migration, generates files right inside the [database](./database/migrations/) dir.
