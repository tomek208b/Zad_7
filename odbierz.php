<?php
ob_start();
include ("polaczenia.php");
if(isset($_COOKIE["id"])){
	$id=$_COOKIE["id"];
	echo $id." co t ";
	$login=$_COOKIE['login'];

	
					echo "Witaj: ".$_COOKIE["id"];
					
					if (is_uploaded_file($_FILES['plik']['tmp_name']))
					{
						echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>';
						move_uploaded_file($_FILES['plik']['tmp_name'],
						'/home/tomkappl/domains/tomkap.pl/public_html/zad7/'.$login.'/'.$_FILES['plik']['name']);
						header("Location: index.php");
					}
					else {echo 'Błąd przy przesyłaniu danych!';}
					
					
				}
ob_end_flush();	
?>