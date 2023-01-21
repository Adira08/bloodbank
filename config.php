<?php
session_start();
$host = 'localhost';
$username = 'id20176805_bbadityadb';
$password = 'Password1@BBAdira';
$dbname = 'id20176805_bbaditya';

# use a inbuilt php function to connect with 
#mysql server via apache HTTP server
$bloodbank = mysqli_connect($host,$username,$password,$dbname);

//var_dump($adiradb1);



?>