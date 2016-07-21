<?php

include "config.php";

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysqli_escape_string($con, $_GET['email']); // Set email variable
    $hash = mysqli_escape_string($con, $_GET['hash']); // Set hash variable

    $search = mysqli_query($con, "SELECT email, hash, active FROM fantable WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysqli_error($con));
	$match  = mysqli_num_rows($search);

	if($match > 0){
    // We have a match, activate the account
	mysqli_query($con, "UPDATE fantable SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysqli_error($con));
	echo 'Thanks for being here, youve been added to the fanpage!';
	}else{
    echo "No match -> invalid url or account has already been activated.";
	}
}else{
    echo " Invalid approach";

}
?>
<br>
<a href="http://localhost:8888/sourcefiles/index.php">musicianhisimagination.com</a>


