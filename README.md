## CS 3910 Assignment 5

This assignment makes use of HTML, SQL, and PHP to create an interface that allows users to 
view and store songs to a MySQL database after they've logged in. If users aren't logged in,
they are redirected to a log-in/landing page.

### Features:
- SQL database of users, songs, and song artists
- Web interface (built w/ HTML and Bootstrap)
	- PHP header
	- Registration
	- Song insertion
	- Artist input
	- Authorization, Log-in/Log-out capabilities
- Utility code (dbutils.php, hashutil.php)



#### Disclaimer:
The utility file `db.sh` is not included in this container. This file contains a snippet for logging in to the MySQL database.
(ex: `mysql --password='' --user='' --host='' ''`)
