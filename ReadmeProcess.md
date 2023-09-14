1. Installed Laravel Project
2. Added Authentication Using Laravel Breeze.
3. Added Role based Authentication using LaraTrust.
4. Configured LaraTrust, Database seeds ran and ran migrations. Added Authentication roles on web.php file. Modified User Model and added 'HasRolesAndPermissions' properties on User Model.
5. Added Controllers [Category, SubCategory, Product, Order], and these Controllers have two methods, index and add.
6. Added Corresponding Routes, and Organized those routes with middlewares group, controller group and routes group respectively.
7. Added Blade templates and organized folder structure for the admin dashboard.
8. Corresponding named Routes are attached to the navigation side bar links.
9. Added Prettier for better readable code structure and formatting.
10. Added Dynamic Page Title
11. Added UI for Add and List Catgories, Subcategories and Products.
12. Add Migration files according to the TableStructure.md file. Three migration files with the drop class as well for rollback convenience.

13. Add three models for Category, Subcategory and Products table for the CRUD operations. And populated with the 'protected $fillable' array varible of strings to identify the properties which must be filled when creating a row of that table.
syntax is, 

protected $fillable = [
    "name",
    "slug"
    ... etc
]

14. Add New Category to the database.
- Create a new named route for category creation and the route must be a POST route. And assign a controller method.
- Use that route in the view form as action="{{route('name')}}". And also pass the csrf token just after the form tag and using @csrf keyword.
- Create the controller method and accept the request parameters and body. 
- Validate the neccessary date and show error message if validation is failed.
- Then insert the data in the db using ModelName::insert method.
- Upon successful completion of the insert operation. Show the redirected the user to the table list page along with a success message.

The way to show the request data in the console is,
$output = new \Symfony\Component\Console\Output\ConsoleOutput();
$output->writeln("<info>$request</info>");

Take away Lesson and Errors
- When creating tables, always use plurals, like 'categories', 'subcategories', 'products' etc. And when creating models, name the models as their singular form, if table name is 'categories', its corresponding model name must be 'Category', it is essential for laravel to work. Laravel implicitly handles these, so the convention must be followed here.
