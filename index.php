<?php
//session_start();

include ("polaczenia.php");

ob_start();
//include ("sesia.php");
include ("cookis.php");
//$id=$_SESSION['user'];
  setcookie("imie",$wys_login,time()+360);
$id=$_COOKIE['id'];
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

$directory = $_COOKIE["cookie"];
$dir = opendir($directory);
echo "Lista plików:<BR />";
 
 
while($file_name = readdir($dir))  {
	 if (($file_name != ".") && ($file_name != "..")) {
		 include ("$directory/$file_name");
	   echo "<a href='".$directory."/".$file_name."'>".$file_name."<br> </a>";
	 }
	 
}

closedir($dir);

?>














</center> 
</body>
</html>



