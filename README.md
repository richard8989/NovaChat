# NovaChat
This is a repository for a corresponding COP4331 project.

# Materials Required
•	The system needs to be implemented with a server-client architecture.
•	A server architecture with nodes replication(e.g. Kubernetes) is recommended but the system still works in standalone workstations (regular PC).
•	The system runs in LAMP stack, so the admin needs to set up the stack.
o	Install LAMP stack on ubuntu click here.
o	Install XAMPP stack on windows click here.
o	Install LAMP stack on MAC click here.

•	Next, it is required that an administrator clones the project from the following GitHub repository:	https://github.com/richard8989/NovaChat

# Build Instructions
•	The project only requires to be placed in the web server folder. (e.g. for Apache in ubuntu the directory is /var/www/).
•	Next, the database needs to be created in MySQL or MARIA DB. (Use the SQL code included in the file database.sql)
•	Next, specify the database login details in the files config,php and /admin/config.php
•	To use the administrator’s features all admin users need to be created directly in the database.
•	With these steps the front-end application should be accessible from any web browser.
From the web server:					
http://localhost

From clients:
http://IP-ADDRESS-of-WEBSERVER 		or	http://web-server-domain

•	To login as administrator follow the previous step but replace the address by:
From the web server:					
http://localhost/admin

From clients:
http://IP-ADDRESS-of-WEBSERVER/admin 		or	http://web-server-domain/admin

