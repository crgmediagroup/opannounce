# opannounce
CMS for announcements. Embed posts in PHP. Please note that source code does not contain CSS or JS for the admin panel.

## Installation
To install, first download the latest release.

### Database Setup
There are two items in the latest release - a SQL file and a folder containing Opannounce. Navigate to phpMyAdmin in your hosting panel, and create a Database using the default settings. Import the SQL file downloaded earlier.

### php.ini setup
Set the following values in your php.ini file.
```
file_uploads = On
 
upload_max_filesize = 16M
 
max_file_uploads = 20
 
post_max_size = 20M
 
max_input_time = 60
memory_limit = 128M
max_execution_time = 30
```

### File Setup
Upload the folder to your web server. This is the folder that contains the admin panel and modules. Navigate to installpath/includes/config.php, and edit the values in there to your website. Example values are already included.

### Account Setup
After that, navigate to the admin panel at the URL you installed the folder. Log in with the default credentials:<br/>
| Username | admin             |<br/>
| Email    | admin@example.com |<br/>
| Password | admin             |<br/>
After you log in, change your email by navigating to profile.php and changing your email. Log out, and use the forgot password function. After you log in with your new credentials, you are done setting up.

## Quick start

### Make an Announcement
Navigate to Pages > Post an Announcement in the sidebar of the Admin Panel. Fill in the fields and hit post when you are done.

### Embed it in a PHP page
This code will embed data about the newest post. If there is none, no data will be returned.
```
<?php
  require('installpath/includes/modules.php');
  $newestPost = getNewestPost();
?>

<?=$newestPost['authorname']?><br/>
<?=$newestPost['author']?><br/>
<?=$newestPost['date']?><br/>
<?=$newestPost['title']?><br/>
<?=$newestPost['id']?><br/>
<?=$newestPost['content']?><br/>
```
Congratulations, you just used Opannounce to make and publish a post!

## List of Modules
- `getNewestPost();`
- `getSecondPost();`
- `getThirdOrMorePost($number)` For this one, replace $number with the Xnd newest post value. For example, to get the 3rd newest post, replace it with 3.
- `getPostWithId($id)` For this one, replace $id with the id of the post you would like to get.

## Actions
OpAnnounce can do a lot more than just embedding posts in pages.

### Individual Post Pages

#### Create the post PHP page
First, create a post page. You can use the `getPostWithId($id)` module. Put the following code in your page.

```
<?php
  require('installpath/includes/modules.php');
  $post = getPostWithId($_GET["id"]);
?>
```
That code will return six variables in an array just like any other module, using the GET method. For example, `example.com/path/to/post.php?id=4` will get a post with an id of 4.

#### Embedded posts as hyperlinks
For your embedded posts to link to individual pages, you need to make a hyperlink. See the example below.
```
<?php
  require('installpath/includes/modules.php');
  $newestPost = getNewestPost();
?>
<a href="path/to/post.php?id=<?=$newestPost['id']?>"><?=$newestPost['title']?></a>
```
This example will create a hyperlink for the newest post and have it link to a post page with information about that post.

### Multiple Accounts
To have multiple users on your Opannounce installation, you just need to use signup again. Navigate to Pages > Signup, and fill out their details. If you like you can just put in some random password and have them use the forgot password function.
