# AUTH

-   It is suggested to use `laravel breeze` from the very beginning during the installation of laravel.

# Running the app

-   spin up the XAMPP ( for SQL server)
-   `php artisan serve`
-   `npm run dev` for auto frontend change on refresh.

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

# Php Tinker

-   Run `php artisan tinker` to have php code running inside your terminal.

# Controller

-   when your routes file is getting a little messy with functions, you delegate that task to the corresponding controller.
    in our case, we clean up the route and make separate controller.

# DB config and files

-   Create your usual sql db and run `php artisan migrate` to hook up the DB to laravel.
-   use `ENV` files for storing sensitive information and configuration.
-   `php artisan migrate:rollback` : This is to rollback to the previous migration.
-   `... migrate:fresh`: Will drop the tables and re-create the tables. **NEVER** use it in production.
-   Always change the `APP_ENV` to `production` before production.

# ELOQUENT ( Database ORM)

<hr>

-   This is Laravel's ORM - ( Object Relational Mapper)
-   is a fancy term for how Laravel's way of interacting with your DB table.
-   Each of the DB table will have a corresponding Eloquent model.
-   If you have user table it will correspond to the User Model and instances of user will go to what is known as `active pattern` ( records of USER object inside the DB).

# Creating a default DB

1.  create a DB of your choice. e.g - in mySql etc.
2.  update `.env` config file. e.g -

    ```
    DB_CONNECTION=mysql
    DB_HOST=<127.0.0.1 | yourdomain.com>
    DB_PORT=3306
    DB_DATABASE=<name of the db>
    DB_USERNAME=
    DB_PASSWORD=

    ```

This is the most basics, you can do more if you need.

3. With Laravel you do not have to create columns, rows manually but with `migration` class inside `database/migrations/*` folder.Each `migration` class by default have a `up` and `down` method. To create your db you need to run -

    - `php artisan make:migration create_<Name>_table`. This will create the file with default methods. Here you define your db schema for this table.

4. Run `php artisan migrate` to generate the db in your DB.

-   Any additional changes, like adding columns, you can go to [database]('./database/migrations) and update changes.
-   afterwards, run `... migrate:fresh` to update the columns in your db.

    ## Factory

    -   Factory allows us to create fake data that we can insert into our database and to test things out.
        To create factory:
    -   `php artisan make:factory <NameOfModel> --model=NameOfModel`
    -   `Factory()` creates new data. You can then save this data with `seed`( more on that below).
    -   A user factory has a corresponding model. Every eloquent model you create will have the trait,factory ,`hasFactory`. This allows you to call the factory and quickly create and persist a class data to the db. The attributes will be declared inside the class.
    -   Wherever you need to use the factory, you need to make sure the corresponding factory class exist. For instance, if a `Post` class does not have a corresponding factory class, you create one by runnng `php artisan make:factory`.

    ## Manual Seeding

    -   you will find the seeder inside `/database/seeders`.
    -   seeding fills up the database (for instance, the `factory` generated data, saves them to the db).
    -   `php artisan db:seed` seeds the db.
    -   `.. migrate:refresh` will clear out the data from the table.
    -   Next time you need to update DB run `php artisan migrate:fresh --seed` to drop and repopulate the tables.
    -   see how the `truncate()` works inside the `database/seeders`.

    ## Creating Model

    -   After migrating the new table, run `... make:model <name>` in this case `Post` and stick with singularity class name. Not `Posts`.

    ### Shortcut to migrate and model

    -   `php artisan make:model <Name> <flag>` so in our scneario it will be `php artisan make:model Post -m`. this will migrate and create a corresponding model. There are more flags you can find with `php artisan -help`

# DEVELOPMENT

## Creating Dummy User

-   run `php artisan tinker`
-   `$user = new App\Models\User` to create an user instance.
-   `$user->name = <Name>`, `$user->email = <email>`, `$user->password = bcrypt(<pass>)` to fill out the necessary user fields.
-   `$user->save()` to save it to the DB.
-   run `$user` and you shall see the user information.
-   `User::find(id<int>)` or `User::findOrFail(id<int>)` with id number, name etc, will show you the details of the user.
-   `User::all()` returns all users info.
-   `User::pluck(name<string>)` will return only the column mentioned.

## Creating additional tables and so on

-   `php artisan make:migration` - helps you with creating additonal tables
-   `php artisan -help make:migration`- shows you the list of commands available to you.
-   General rule of thumb, make sensible name for what the migration does. e.g - `php artisan make:migration create_posts_table`. SO far looks like the name of the table gotta be plural?
-   Each time you make a migration, generates files right inside the [database](./database/migrations/) dir. Look for the table you just created and update any necessary changes.
-   if you have updated make sure to `migrate:rollback` and migrate again unless make sure to run `.. migrate` to successfully update the DB.

# Commands

-   `<path>\Class::with(<name>)->first()` gets the firest post with <name> (e.g - username).
-   ` App\Models\Post::factory(30)->create();` this will create 30 posts at a time.
-   `php artisan make:component <ComponentName>` - will create a `blade` file with a corresponding `view` file.
-   `php artisan make:controller <name>` - makes a controleller with that name.

# Blade Components

-   Any methods can return a view
-   All the view has their name a PATH and filename associated with their corresponding methods they are called in. for instance -

    ```
    return view('posts.index') //called from the PostController
    ```

-   All blade file must have `<x-NameOfTheComponent>`. e.g - a common layout `<x-layout`.

# FORM SUBMISSION

-   you need both `get` and `post` request when you want to hit a page and read the post values.
-   `@csrf` without this `post` won't work.

# Optimization

1. ## Clockwork and N+1 problem

-   `\Illuminate\Support\Facades\DB:listen($callback)` - you can listen to any incoming queries.
-   you need to pass the name of the request you are looking for in order to stop sending request for each and every name inside a loop. This is what N + 1 problem refers to.

2. ## Eager Loading

-   you define this once inside the model class as property. For instance checkout (Post)['/first-app/app/Models/Post.php]'s `$with` property. with this you solve **n+1** problem as well as you DRY. Wihtout this you would have had to manually load posts with the `with` method.
-   **NOTE** That if you ever needed to disable autoloading or eager loading you can do so by `Class::without(..args)->first()`. This will load the post without the specified relationship. So, if we had passed '_author_', '_category_' this would load the post without the author and _category_.

# Static assets

-   for the images. Put `/images/` instead of `./images`. Prolly this is due to how app visitors only get access to the `public` folder.

# Query Scope

-   Create a method, prefix the name with `scope`
-   you don't call the full name during the method call but just the after part (e.g - _scopeFilter_ => _filter_)
-   you get query as argument and you build your query from there.

# Styling the default components

-   For instance, if you want to style `pagination` components, you need to publish the `vendor` package you wanna have control over.So, for our pagination, those components live inside the `vendor` dir. we need to do `php artisan vendor:publish`. From there you will have to choose the package you want to publish. for us, it is `laravel-pagination`. Simply refer to the number and hit `enter`. The pagination view will be transferred to the project `views` and refer to this new files. You can also use other pagination library from there as well but you will have to refer to their scripts. For instance, if we want to use `bootstrap` paginator, then we will have to include the _bootstrap_url_ in our head component. then we will have to go to `AppServiceProvider` and add the `paginator::useBootStrap()` inside the `boot` method.

# Things to dig about

-   [Mutator and Accessor](https://laravel.com/docs/10.x/eloquent-mutators#attribute-casting)
