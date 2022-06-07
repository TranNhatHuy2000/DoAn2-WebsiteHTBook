<?php 
	session_start();
    $con= mysqli_connect("localhost","root","","htbook");
    mysqli_set_charset($con, 'UTF8');
    if(isset($_GET['typeid'])){
        $sql = "DELETE FROM typebook WHERE TypeID = '".$_GET["typeid"]."'";
        mysqli_query($con,$sql);            
        header('Location: typebook.php');
    }else{
        die("không tồn tại");
    }
?>