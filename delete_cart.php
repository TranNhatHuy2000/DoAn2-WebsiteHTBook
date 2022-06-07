<?php
session_start();
$cart=$_SESSION['cart'];
$id=$_GET['bookid'];
if($id == 0)
{
unset($_SESSION['cart']);
}
else
{
unset($_SESSION['cart'][$id]);
}
header("location:cart.php");
exit();
?>