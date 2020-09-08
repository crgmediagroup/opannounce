# opannounce
CMS for announcements. Embed posts in PHP.

## Installation
To install, first download the latest release.

### Database Setup
There are two items in the latest release - a SQL file and a folder containing Opannounce. Navigate to phpMyAdmin in your hosting panel, and create a Database using the default settings. Import the SQL file downloaded earlier.

### File Setup
Upload the folder to your web server. This is the folder that contains the admin panel and modules. Navigate to installpath/includes/config.php, and edit the values in there to your website.

### Account Setup
After that, navigate to the admin panel at the URL you installed the folder. Log in with the default credentials:<br/>
| Username | admin             |<br/>
| Email    | admin@example.com |<br/>
| Password | admin             |<br/>
After you log in, change your email by navigating to profile.php and changing your email. Log out, and use the forgot password function. After you log in with your new credentials, you are done setting up.
