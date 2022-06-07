<?php session_start();
		$name = $_POST["name"];
		$author = $_POST["author"];
		$price = $_POST["price"];
		$typeid = $_POST["typeid"];
		$qty = $_POST["qty"];
		$description = $_POST['description'];
		$con= mysqli_connect("localhost","root","","htbook");
		$sql = " UPDATE books SET Name='".$name."',Author='".$author."',Description='".$description."',Price='".$price."',TypeID='".$typeid."',Quantity='".$qty."' WHERE BookID=".$_GET['id'];
		mysqli_set_charset($con, 'UTF8');
		mysqli_query($con, $sql);
		header("Location: viewbook_admin.php?typeid=1");
?>