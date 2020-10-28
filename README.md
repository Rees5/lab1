# lab1

Requirements
-----
1. An operating System e.g Windows, Linux, Unix etc
2. A web server eg. Apache
3. A text editor eg.Atom
4. A DBMS eg. MYSQL, MongoDB etc.
5. A web browser eg. Google Chrome
6. PHP version 5+
7. Git Bash for windows users

Note
-----
You can also install a cross platform stack package such as xammp or wammp which substitues 2, 4 and 6 above

Setup
-----
1. Open terminal or git bash and navigate to the web folder of the webserver installed.
for instance if you used xammp, open `cd ../xammp/htdocs`
2. create a new project folder e.g `mkdir myprojectfolder`
3. navigate to the new folder e.g `cd myprojectfolder`
4. type `git init`
5. type `git clone https://github.com/Rees5/lab1.git`
6. Open your text editor eg `atom .`
7. Open your DBMS and create a databse named **lab1**
8. Import **lab1.sql** into your db server
9. Locate and open **util.php** from your text editor. Edit it as follows
```
<?php
	class Util {
        //About DB
        static $DB_NAME = "lab1"; //Your database name
        static $DB_USER = "root"; //Your username
        static $DB_USER_PASS = "****"; //Your db server password for the username provided
        static $SERVER_NAME = "localhost"; //Your servername
	}
?>

```
10. Open your web browser and navigate to **localhost/myprojectfolder/lab1-master/register.php**
11. Proceed to the on screen set up options to test/use the program


### License

