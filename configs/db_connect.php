<?php

//Sec SW Dev - Assignment 2
//Alana Staszczyszyn
//March 5, 2018

ob_start();
session_start();

//DB creds
define('DBHOST', 'localhost');
define('DBUSER', 'omnomnom');
define('DBPASS', 'waffleshapedfrenchfries!');
define('DBNAME', 'testblog');

$conn = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//time
date_default_timezone_set('America/New_York');

?>