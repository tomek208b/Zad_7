<?php
//session_start();

include ("polaczenia.php");

ob_start();
//include ("sesia.php");
include ("cookis.php");
//$id=$_SESSION['user'];




  setcookie("imie",$wys_login,time()+360);
$id=$_COOKIE['id'];
$login=$_COOKIE['login'];
$wynik  = mysqli_query ($polaczenie,"SELECT imie FROM  user WHERE (id = '$id')")or die('Błąd zapytania do tabeli!');	
			while ($wiersz = mysqli_fetch_array ($wynik))
{	$imie=$wiersz [0];

}

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


echo "</br></br><a href='out.php'>Wyloguj</a></br></br>";


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


@$rej = trim($_REQUEST["rej"]);
     
			if ($rej == "rej"){

				if(isset($_COOKIE["cookie"])){
					echo "Witaj: ".$_COOKIE["cookie"];
					
				}
	


}}
ob_end_flush();
?>	


 </br><form action="odbierz.php" method="POST" ENCTYPE="multipart/form-data">
 <input type="hidden" name="rej" value="rej">
 <input type="file" name="plik"/>
 <input type="submit" value="Wyślij plik"/>
 </form>

 <?php
 
   $folder = ($_POST['folder']);
@$rej1 = trim($_REQUEST["rej1"]);
     
			if ($rej1 == "rej1"){
				
				if(mkdir('/home/tomkappl/domains/tomkap.pl/public_html/zad7/'.$login.'/'.$folder, 0777))
					{
					echo 'Udało się stworzyć katalogu';
					}
					else
					{
					echo 'Nie udało się stworzyć katalogu';
					}
				
			}

?>
<form action="" method="post">
<input type="hidden" name="rej1" value="rej1">

<p class='tytul'></p>
Nazwa folderu:<br/>
<input type="text" name="folder" class="textbox"size="30" maxlength="50" />

<input type="submit" name="logowanie" value="dodaj">
<br/><br/><br/>
</form>


</center> 
	
<?php

$directory = $_COOKIE["login"];
$dir = opendir($directory);
echo "Lista plików:<BR />";
 
 
while($file_name = readdir($dir))  {
	 if (($file_name != ".") && ($file_name != "..")) {
		 
	  echo $file_name."<a href='pobierz.php?p=".$file_name."'>pobierz<br> </a>";
      

	 }
}

closedir($dir);




?>


</center> 
</body>
</html>


