<?php # Script 9.2 - mysqli_connect.php
// This file contains the database access information.
// This file also establishes a connection to MySQL,
// selects the database, and sets the encoding.
// Set the database access information as constants:
define('DB_USER', 'id12308554_root');
define('DB_PASSWORD', '12345');
define('DB_HOST', 'localhost');
define('DB_NAME', 'id12308554_movietime');
// Make the connection:
$dbm = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );
// Set the encoding...
mysqli_set_charset($dbm, 'utf8');
