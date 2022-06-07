<?php 
	session_start();
    $con= mysqli_connect("localhost","root","","htbook");
    mysqli_set_charset($con, 'UTF8');
    if(isset($_GET['id'])){
        $sql = "DELETE FROM books WHERE BookID = '".$_GET["id"]."'";
        mysqli_query($con,$sql);            
        header('Location: viewbook_admin.php?typeid='.$_GET['typeid']);
    }else{
        die("không tồn tại");
    }
?>