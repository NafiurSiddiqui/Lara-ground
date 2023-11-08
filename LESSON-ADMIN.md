# Things I did

-   created an admin route
-   created a `posts.create` view
-   we tried to auth guard the admin page from the `PostController->create` but moved it to our custom middleware.
-   Generate custom middleware with `make:middleware MustBeAdministrator`.
-   moved our auth logic there.
-   We register our custom middleware inside the `App\Http\Kernel`

💡 Tips:

if you have roles based authentication, you don't necessarily create roles and routes for each of them. In many cases, the admin will be one or a few. In such a case, you can either -

1. Create an array of admin users name and run the auth logic over them.Or,
2. Create an additional `admin` role column and set a boolean value for them. And check during the auth.

# Publishing the post

-   created a new post route `admin/posts` with `PostController::class` and `store` handler.
-   Inside the `store` Handler,
    -   validated the request fields
    -   assigned `user_id` to the validated fields
    -   submitted to the DB
    -   redirected to the post.

# Media files on Laravel

-   added Thumbnail, put `enctype="multipart/form-data"` form attribute for handling media files.
-   Laravel `filesystem` and working with filedisks.
-   changed the ` 'default' => env('FILESYSTEM_DISK', 'local'),` to ` 'default' => env('FILESYSTEM_DISK', 'public'),` and did the same inside `.env` `FILESYSTEM_DISK=local` to `FILESYSTEM_DISK=public`.
-   We did this in order to stick with the convention of accessing file inside `public` folder. Now as the form is submitted, the folder name and file is created inside `storage/app/public` as we specified inside our `PostController`. This is to store the file submitted right in this path.

-   But we can not reference to this path from our application. For instance, if we want to show the picture on UI. In order to make it happen, we need to, build a bridge, make a `storage:link` link between the `public/images` folder and `storage/app` folder.

We do this by running, the commmand the link the file uploaded and stored inside the `storage` will be avialable to the `public` dir.

# Editing and Deleting the post

-   ` @method('PATCH')` : Is actually used to tell Lara that even though it is a POST request, we want to PATCH the infos updated.
-   ` @method('DELETE')` : You must add a method to delete as well on a POST action.
