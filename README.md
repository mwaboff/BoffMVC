# BoffMVC Framework

BoffMVC is my exploration into building the type of Model-View-Controller frameworks such as PHP's Laravel and Python's Django. It features a streamlined request routing system by dynamically parsing target location from the URL, eliminating the need to manually define routes. It also manages database connections with a simple to use database interface.

## Requirements
PHP 7.X
PDO_MySQL
MySQL

## How To Install
1. Download and extract this project into a folder.
2. Create a MYSQL database.
  * You can use the seed_db.sql to create a database called `boffmvc` that has a basic `users` table with this command: `mysql < seed_db.sql`
3. Configure the database settings in `config.php`, adding your database user, password, and database name (if you aren't using the default option)
4. Set up your web server (such as nginx or apache) to serve index.php.
  * You will have to install the relevant php plugin for the webserver (`php-fpm` for nginx or `mod_php` for apache)

## What are MVC Frameworks
Explaining how an MVC framework works, is a bit out of the scope of this set of instructions, but to provide a brief explanation:
* Models manage the interaction with each conceptual object that gets stored in the database. A good example would be a User or Image.
* Views manage what the user actually sees. They handle very little of the logic outside of how things are displayed.
* Controllers handle the logic of each request. If a browser GET request comes in asking for the page showing all of the users, the Controller will reach out to the Model to get all of the information and then pass it to the View which will display the data collected.

## How BoffMVC is Different
### Routing
Routing is an important part of any framework. When a request comes into the server, the framework's router has to determine what type of request it is and what code to run. Most frameworks require users to manually define each and every route. BoffMVC, however, simplifies this by automatically running the code from the relevant router by dynamically parsing the URL.

Essentially if you direct your browser to `http://example.com/?page=user&uid=1`, it would identify that the page accessed is `user` and search for the `UserController` and load it. One requirement of defining each controller is to run an inherited `manageRequest();` command that then determines which Controller command to run based off of the type of request made.

### Database Interaction
Many well established MVC frameworks will have developed their own Object-Relational Mapping framework that abstract database management. BoffMVC opts instead to encourage users to directly interact with the SQL database. To this end, an interface is provided to the developer. This interface will manage opening a connection to the database and closing it automatically.

### Model Managers
To help split the responsibility for each section of code, BoffMVC recommends the usage of Model Managers. These are separate classes that connect directly to the model and manage things such as:
* Getting a full list of objects that meet a certain criteria
* Check the validity of data prior to creating a new object
Essentially, if a function requires interaction with multiple model objects or if it requires work interacting with other models, it probably belongs in the model manager.

## How To Use
### Where things are located
**Controllers**: `app/controller`
* Please note that Controllers should extend `ApplicationController` and run `manageRequest()` after the class definition.
* Controllers should match the naming format `PageController` where `Page` is what you expect to see in the URL. For example, `example.com/?page=user` would map to `UserController`.
* Note that if a controller does not exist, the router will default to the `HomeController`.
**Models**: `app/model`
* Note what I mentioned earlier regarding the split between Models and Model Managers.
* The naming convention should meet this pattern: `User` and `UserManager`.
**Views**: `app/view`
* Views are where BoffMVC collects the final information and stores it into variables that will get passed into the database.
* All to-be-rendered data should be stored into an array called `$RENDERVARS`.
* Any CSS and JS files can be added to `$RENDERVARS` like this:
  * `$RENDER_VARS["css"] = ["app/view/Register/css/register.css", "app/view/Login/css/login.css"];`
  * `$RENDER_VARS["js"] = ["app/view/Application/js/form-management.js", "app/view/Register/js/register.js"];`
* Views should then require a template `.phtml` page located in `app/template`

Built into this framework has a basic website with basic user authentication built into it to use as an example. Another example project can by [this recipe sharing website](https://github.com/mwaboff/BoffRecipes) that can be used as well for an example.