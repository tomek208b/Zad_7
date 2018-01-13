<?php
session_start();

include ("polaczenia.php");

ob_start();
include ("sesia.php");
$id=$_SESSION['user'];
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


echo "</br></br><a href='out.php?akcja=wyloguj'>Wyloguj</a></br>";


ob_end_flush();
?>
<head>

<html>
<head>
	<title>Tomasz Kapischke</title>
</head>
<body>

<?php

if(isset($_SESSION['user']))
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

if(isset($_SESSION['work']))
{
	
		 if($_GET['akcja']=='wr')
			 {
				 	echo"<br><a href='index.php?akcja=back'>powrót</a><br>" ;
					include ("sortuj.php");
			 }else{
				  if($_GET['akcja']=='wp'&&$_GET['id']>'0')
				 
	 {		

	echo"<br><a href='index.php?akcja=wp'>powrót</a><br>" ;
include ("konwersacja.php");
	 }		 
	  else
	     
	        {	
				if($_GET['akcja']=='wp')
	 {		
	echo"<br><a href='index.php?akcja=back'>powrót</a><br>" ;
include ("workview.php");
	 }		 
	  else	{	
				echo "<a href='index.php?akcja=wr'>Wszystkie zgłoszenia</a><br>"; 
				echo "<a href='index.php?akcja=wp'>Obsługiwane zgłoszenia</a><br>";
				
			}}
}}

if(isset($_SESSION['admin']))
{
			 if($_GET['akcja']=='ar')
			 {
				 	echo"<br><a href='index.php?akcja=back'>powrót</a><br>" ;
					include ("nework.php");
			 }else{
				 
				 if($_GET['akcja']=='ap')
	 {		
	echo"<br><a href='index.php?akcja=back'>powrót</a><br>" ;
include ("adminviewp.php");
	 }		 
	  else
	        {	if($_GET['akcja']=='ak')
	 {		
	echo"<br><a href='index.php?akcja=back'>powrót</a><br>" ;
include ("adminviewk.php");
	 }		 
	  else
	        {	  
				echo "<a href='index.php?akcja=ar'>Rejestracja pracownika</a><br>"; 
				echo "<a href='index.php?akcja=ap'>Rejestr pracowników </a><br>";
				echo "<a href='index.php?akcja=ak'>Rejestr klientów </a><br>";}}
			 }
}



ob_end_flush();
?>








</center> 
</body>
</html>



