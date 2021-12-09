# project-tracking
PHP-based project tracking system. 

This was a PHP tool made by me in December of 2018 (back when I first started PHP).
Allows you to provide your clients with a URL to see all status updates on their project.

Very simple, and minimal CSS involved. This is just the core PHP project. 

## Usage
Rename `trackingCreate.php` to something more secretive, as this is the administrator URL to create new projects. 
Edit line `8` of `trackingCreate.php`: `if(isset($_GET["edit"]))` to something like `if(isset($_GET["nQoAtO"]))`.
Go to the new create page and create a project. Browse to it, and append it with your new GET string. ie: "https://example.com/1234-5678-9012-3456?nQoAtO" to provide updates.
