For project to work correctly, you should set up .htaccess file in www directory with text:

<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule ^(.*)$ <laravel_app_folder_name>/public/$1 [L]
</IfModule>

<laravel_app_folder_name> - in this case "Demo_Laravel_project" or other name if you rename folder after cloning.
Project should be stored in www directory.
