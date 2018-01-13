
<?php

$id=$_GET['id'];




	@$rej = trim($_REQUEST["rej"]);
           
 
			if ($rej == "rej")
			{
				$tresc1 = trim($_POST["tresc1"]);
		
				$blad_01='';
				
				
				$blad = '0';
				if (empty($tresc1) == true)
				{
					$blad_01 = "<font color='black'>Pole <i>Tresc</i> nie zostało wypełnione!!</font></br>";
					$blad='1';
				}

				if ($blad =='1')
				{
					echo "<center><table border='1px' BGCOLOR='red'><tr><td align='center'>";
					echo $blad_01;
					
					echo "</td></tr></table></center>";					
				}
				
				if ($blad != '1')
				{
					
					$wynik1 = mysqli_query ($polaczenie, "INSERT INTO tresc (odpowiedz,id) VALUES ('".$tresc1."','".$id."')")or die('Błąd zapytania do tabeli!');

					if ($wynik&&$wynik1)
					{                                                                             // jakies przekierowaie  do logowania , jakies hiper lacze 
						echo "<center><table border='1px' BGCOLOR='green'><tr><td align='center'>";
						echo "<font color='black'>Odpowiedź została wysłana</font>";
						echo "</td></tr></table></center>";
	
					}
				}
				
			}
		

//echo $idr;
$wynik  = mysqli_query ($polaczenie,"SELECT tresc,odpowiedz FROM  tresc WHERE (id = '$id')")or die('Błąd zapytania do tabeli!');

print "<TABLE CELLPADDING=5 BORDER=1>";
print "<TR><TD>Treść</TD><TD>Odpowiedz</TD></TR>\n";
	while ($wiersz = mysqli_fetch_array ($wynik))
{	
	$tresc = $wiersz [0];
	$odpowiedz = $wiersz [1];
	echo "<TR><TD>$tresc</TD><TD>$odpowiedz</TD></TR>\n";
}
print "</TABLE>";

    

	echo "<form action='' method='post'>";
		echo "<input type='hidden' name='rej' value='rej'>";
	echo "<p class='tytul'>Odpowiedz</p></br>";
echo"<textarea name='tresc1' cols='30' rows='10'></textarea><br/><br/>";
echo"<input type='submit' name='logowanie' value='Wyślij'>";
echo"</form>";

?>
