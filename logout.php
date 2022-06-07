<?php
session_start();

if(isset($_SESSION['Position']) && $_SESSION['Position'] != NULL){
    unset($_SESSION['Position']);
    unset($_SESSION['userid']);
    header("location: login.php");
}

?>