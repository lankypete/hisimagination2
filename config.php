<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 1);

$con = mysqli_connect('127.0.0.1', 'root', 'root', 'hisdb') or die("fuck couldn't connect to your database, please make sure your info is correct!");
