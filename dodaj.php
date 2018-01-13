<?php
include ("polaczenia.php");
$czas1 = time ();
$czas2 = date ("r", $czas1);
$czas = date("Y-m-d H:i:s");
$agent = "X".$_SERVER['HTTP_USER_AGENT'];
 
$system = array('Windows 2000' => 'NT 5.0', 'Windows XP' => 'NT 5.1'
            ,'Windows Vista' => 'NT 6.0', 'Windows 7' => 'NT 6.1'
            ,'Windows 8' => 'NT 6.2', 'Linux' => 'Linux');
 
$przegladarka = array('Internet Explorer' => 'MSIE', 'Mozilla Firefox' => 'Firefox'
            ,'Opera' => 'Opera', 'Chrome' => 'Chrome');
 
foreach ($system as $nazwa => $id)
   if (strpos($agent, $id)) $system = $nazwa;
 
foreach ($przegladarka as $nazwa => $id)
   if (strpos($agent, $id)) $przegladarka = $nazwa;

   $wynik  = mysqli_query ($polaczenie,"SELECT email FROM  user WHERE (id = '$idusera')")or die('Błąd zapytania do tabeli!');	
			while ($wiersz = mysqli_fetch_array ($wynik))
{	$email=$wiersz [0];}
   
echo "to jest ciekawe : ".$email." efewsf ";
$zapytanie= mysqli_query ($polaczenie, "INSERT INTO loguser (user,ip,data,OS,przegladarka,stan) VALUES ('". $idusera."','".$_SERVER['REMOTE_ADDR']."','".$czas."','".$system."','".$przegladarka."','".$error."')")	or die('Błąd zapytania do tabeli klienci!');

$wynik4  = mysqli_query ($polaczenie,"SELECT id FROM pliki WHERE (iduser = '$idusera')")or die('Błąd zapytania do tabeli!');	
$wiersz4 = mysqli_fetch_array ($wynik4);
if(!isset($wiersz4))	
	{
		


if(mkdir('/home/tomkappl/domains/tomkap.pl/public_html/zad7/'.$email, 0777))
{
	 echo 'Udało się stworzyć katalogu';
}
else
{
 echo 'Nie udało się stworzyć katalogu';
}
$zapytanie1= mysqli_query ($polaczenie, "INSERT INTO pliki (iduser,sciezka) VALUES ('". $idusera."','".$email."')")	or die('Błąd zapytania do tabeli kliencimkir!');
	}

if($error=='1')
{
	$dodaj=$statususer+'1';
		 $wynik8  = mysqli_query ($polaczenie,"UPDATE  user SET status='$dodaj' WHERE id='$idusera'")or die('Błąd zapytania do tabeli klienci21!');
}else{ $dodaj='0';
	 $wynik8  = mysqli_query ($polaczenie,"UPDATE  user SET status='$dodaj' WHERE id='$idusera'")or die('Błąd zapytania do tabeli klienci21!');}

	 
		 if($wynik8 ) echo "wszystko ok i zobaczmy ".$dodaj;




?>


