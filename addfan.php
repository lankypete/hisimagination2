<?php
include 'config.php';
echo 'hi';
if(isset($_POST['submit'])){
	echo 'values are filled<br>';
	//the missing dat array
	$data_missing = array();

	if(empty($_POST['name'])){
		//if value's are missing then here we go
		$data_missing = 'Name';
	}else{
		//the $nameCopy is for the email message (not real_espace_string)
		$nameCopy = trim($_POST['name']);
		$name = mysqli_real_escape_string($con, trim($_POST['name'])); // Turn our post into a local variable
	}

	if(empty($_POST['email'])){
		//if value's are missing then here we go
		$data_missing = 'Email';
	}else{
		//the $emailCopy is for the email message (not real_espace_string)
		$emailCopy = trim($_POST['email']);
		$email = mysqli_real_escape_string($con, trim($_POST['email'])); // Turn our post into a local variable
	}
}else{
	echo 'didnt submit form';
}

if(empty($data_missing)){
	echo 'data missing is empty' ;
	$hash = md5(rand(0,1000));// Generate random 32 character hash and assign it to a local variable.
	$hashEscaped = mysqli_real_escape_string($con, $hash);
	$query = "INSERT INTO fantable (name, email, hash) VALUES ('$name', '$email', '$hashEscaped')";

	if(mysqli_query($con, $query) === TRUE){
		$to      = $emailCopy; // Send email to our user
		$subject = 'hisimagination fan varification!'; // Give the email a subject
		$message = '

		Thanks for signing up!
		You will be on my fanpage after you have activated yourself by clicking the url below.

		------------------------

		Your Name: '.$nameCopy.'

		------------------------

		Please click this link to activate your account:
		http://localhost:8888/sourcefiles/verify.php?email='.$emailCopy.'&hash='.$hash.'

		'; // Our message above including the link

		$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
		mail($to, $subject, $message, $headers); // Send our email
		echo 'cool it worked';

	}else{
		echo 'so close but noooooo,<br>';
		echo mysqli_error($con);

	}
	}
else{
	echo 'please enter the following info</br>';
	foreach($data_missing as $missing){
		echo "$missing <br>";
	}
}

echo '<form action="http://localhost:8888/sourcefiles/addfan.php" method="post">
			<h2>Room for one more</h2>

			<p>Name:</p>
			<input type="text" name="name" value="">

			<p>Email:</p>
			<input type="text" name="email" value="">
			<br/>
			<input type="submit" name="submit" value="join">
		</form>';


?>