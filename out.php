<?php
ob_start();
setcookie("id","0",time());
unset($_COOKIE['id']);
setcookie("login","",time());
unset($_COOKIE['login']);
/*include ("sesia.php");
if(isset($_SESSION['user']))
{
unset($_SESSION['user']);
}*/
header("Location: logowanie.php"); 
ob_end_flush();
?>

