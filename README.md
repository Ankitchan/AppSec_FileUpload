# AppSec_FileUpload
Implemented a Web App adhering to OWASP top 10 attacks

Implemented functionality :
1. Login
2. File upload (only GIF, JPEG, PNG allowed)
3. View Image screen where user can view 10 images per page uploaded by him/her
4. Edit caption
5. Delete image

Instructions to setup
1. Install xampp 7.1.1
2. Unzip AppSecLab1.zip file.
3. Copy all the contents into a folder at <installed path>/xampp/htdocs. Rename it to fileUpload
4. Start the xampp control panel.
5. Edit the port no of apache server from 80 to 8080.
6. Set password to MySQL/MariaDB
7. Start the apache server
8. Start the Mysql/MariaDB server
9. Run sql scripts from <installed path>/xampp/htdocs/fileUpload/db at phpmyadmin.
10. Open http://localhost:8080/fileUpload/config.php and edit the database password to
whatever you set in 6th step.
11. Go to browser and type http://localhost:8080/fileUpload/login.html
12. Enter username as user1 and password: test and login into the app.
Note
1. The signup feature is not yet implemented. Please add a user into” users” table using
phpmyadmin console.
2. For testing other user is username1/testing123
3. There some validations to be done in login screen and edit and delete image
functionality.
4. While running in linux please give full permission to all folders

Future Work
1. Secure the web app against SQL injection,XSS, CSRF and other attacks.

References:
1. https://www.exchangecore.com/blog/how-upload-files-html-php/
2. http://php.net/manual/en/
3. http://www.c-sharpcorner.com/UploadFile/9582c9/script-for-login-logout-and-view-usingphp-
mysql-and-boots/
4. https://esimakin.github.io/twbs-pagination/
