<?php  
session_start();
	$id=$_GET['id'];
	if(isset($_SESSION['cart'][$id])){
	$sl = $_SESSION['cart'][$id] + 1;
	}
	else{
	$sl=1;
	}
	$_SESSION['cart'][$id]= $sl;
	echo $sl;
	header("location:cart.php");
	exit();
?>