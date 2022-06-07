<?php  
	session_start();
	$con= mysqli_connect('localhost','root','','htbook');
	mysqli_set_charset($con, 'UTF8');

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'] ;
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "INSERT INTO user( `Username`, `Password`, `Fullname`, `Address`, `Email`, `Phone`) VALUES ('".$username."','".$password."','".$fullname."','".$address."','".$email."','".$phone."')";
	mysqli_query($con,$sql);
	header("location: login.php")
?>