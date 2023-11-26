<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phoneno = $_POST['phoneno'];
	$password = $_POST['password'];
	$passwordRepeat = $_POST["repeat_password"];

	
	$conn = new mysqli('localhost:3308','root','','login-reg');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into users(firstname, lastname, email, gender, phoneno,password) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssis", $firstname, $lastname, $email ,$gender, $phoneno, $password );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>