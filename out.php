<?php
ob_start();
include ("sesia.php");
if(isset($_SESSION['user']))
{
unset($_SESSION['user']);
}

header("Location: logowanie.php"); 
ob_end_flush();
?>

