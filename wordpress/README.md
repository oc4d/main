MySQL dump from blue host saved to repo as oc4dwp.sql

- If does not already exist, go into running MySQL container and create database named "wordpress" and dump oc4dwp.sql to that database.

One-time fix for fixing URL's within local wordpress database after dumping from blue host backup


- Locate the wp-login.php file within the running wordpress Docker container and copy it to local file system using docker cp command

- navigate to this line in the php file: "require( dirname(__FILE__) . '/wp-load.php' );"

- just below, add the following lines:
//FIXME: do comment/remove these hack lines. (once the database is updated)
update_option('siteurl', 'http://192.168.99.100:8081/' );
update_option('home', 'http://192.168.99.100:8081/' );

- copy the wp-login.php file back into the running wordpress container using 'docker cp'

- navigate to http://192.168.99.100:8081/wp-login.php and login with the login info provided by Tiffany (for the live Wordpress site)

- once logged in, will be prompted to updated databases. Accept and wait for update.

- once complete, undo edits made to local wp-login.php, save it, then 'docker cp' into the running container to undo the edits made for this fix
