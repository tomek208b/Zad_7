<?php
//session_start();

include ("polaczenia.php");

ob_start();
//include ("sesia.php");
include ("cookis.php");
//$id=$_SESSION['user'];
$id=$_COOKIE['id'];
$wynik  = mysqli_query ($polaczenie,"SELECT imie FROM  user WHERE (id = '$id')")or die('Błąd zapytania do tabeli!');	
			while ($wiersz = mysqli_fetch_array ($wynik))
{	$imie=$wiersz [0];}
echo "<p><font size='5' color='green'>Witaj ".$imie."</font></p></br>";
$wynik1  = mysqli_query ($polaczenie,"SELECT * FROM  loguser WHERE (user = '$id') ORDER BY id DESC  LIMIT 1,1 ")or die('Błąd zapytania do tabeli!');	
			while ($wiersz1 = mysqli_fetch_array ($wynik1))
{	$ip=$wiersz1 [2];
$data=$wiersz1 [3];
$os=$wiersz1 [4];
$przeg=$wiersz1 [5];
$stan=$wiersz1 [6];}
if($stan=='1')
{
echo "<p><font size='5' color='red'> Ktoś próbował sie zalogować nie poprawnymi danymi dnia:  ".$data." z nr IP: ".$ip." </font></p></br>";	
}


echo "</br></br><a href='out.php'>Wyloguj</a></br>";


ob_end_flush();
?>
<head>

<html>
<head>
	<title>Tomasz Kapischke</title>
</head>
<body>

<?php

if(isset($_COOKIE['id']))
{




  
	 if($_GET['akcja']=='up')
	 {
		echo"<br><a href='index.php?akcja=back'>powrót</a><br>" ;	 	 
include ("dodajzgloszenie.php");

		
	 }		
     else {  if($_GET['akcja']=='ut'&&$_GET['id']>'0')
				 
	 {		

	echo"<br><a href='index.php?akcja=ut'>powrót</a><br>" ;
include ("odpowiedz.php");
	 }		 else{
		 if($_GET['akcja']=='ut')
	 {
		
	echo"<br><a href='index.php?akcja=back'>powrót</a><br>" ;
include ("userview.php");

	 }		 
	  else
	  {	    
echo "<a href='index.php?akcja=up'>Zgłoś problem</a><br>";
echo "<a href='index.php?akcja=ut'>Problemy w toku</a><br>";

	 }}}
	
}






ob_end_flush();
?>








</center> 
</body>
</html>



