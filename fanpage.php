<?php
//connect to database
include 'config.php';

$sql = "SELECT name FROM fantable WHERE active = 1";

$fans = $con->query($sql);

$con->close();



