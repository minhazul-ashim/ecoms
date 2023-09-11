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

14.
