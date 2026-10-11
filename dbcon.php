<?php
// Start of PHP code block


$host = "localhost"; // Database server address. "localhost" means the database is on the same machine. Equivalent to 127.0.0.1
$username = "root";
$password = "";      // Password for the MySQL user. Empty here, meaning no password is set
$db_name = "php_db_cabiasa"; // Name of the database you want to connect to


// Create a new MySQLi connection object using the credentials above
$conn = new mysqli($host, $username, $password, $db_name);


?>
