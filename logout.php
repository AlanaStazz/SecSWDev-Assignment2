<?php

//Sec SW Dev - Assignment 2
//Alana Staszczyszyn
//March 5, 2018

session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
   
echo 'You have cleaned session';
header('Refresh: 2; URL = index.php');

?>