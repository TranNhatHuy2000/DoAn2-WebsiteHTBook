<?php 
    $con= mysqli_connect("localhost","root","","htbook");
    mysqli_set_charset($con, 'UTF8');
    if(isset($_GET['id'])){
        $sql = "DELETE FROM user WHERE UserID = '".$_GET["id"]."'";
        mysqli_query($con,$sql);
        header('Location: user.php');
    }else{
        die("không tồn tại");
    }
?>