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

MIT License

Copyright (c) 2020 Rees Alumasa

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
