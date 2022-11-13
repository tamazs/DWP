<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'Tamas');
define('DB_PASS', '1234');
define('DB_NAME', 'NewInDkDB');

//Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Check connection
if ($conn -> connect_error) {
    die('Connection failed ' . $conn->connect_error);
}
