<html>
<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body>


<?php
ob_start();
include ("polaczenia.php");


			@$rej = trim($_REQUEST["rej"]);
            $imie='';
			$nazwisko='';
			$email ='';
			$emailp ='';
			$status='0';
		//	$zezwalam = '0'; 
			if ($rej == "rej")
			{
				$imie = trim($_POST["imie"]);
				$nazwisko = trim($_POST["nazwisko"]);
				$nazwaf = trim($_POST["nazwaf"]);
				$haslo = trim($_POST["haslo"]);
				$haslop = trim($_POST["haslop"]);
				$email = trim($_POST["email"]);
				$emailp = trim($_POST["emailp"]);
		
				$blad_01='';
				$blad_02='';
				$blad_03='';
				$blad_04='';
				$blad_05='';
				$blad_06='';
				$blad_07='';
				$blad_08='';
				$blad_09='';
				$blad_10='';
				$blad_11='';
				$blad_12='';
				$blad_13='';
				$blad_14='';
				$blad_15='';
				$blad_16='';
				/*$blad_17='';
				
				$blad_18='';
				$blad_19='';*/
				$blad = '0';
				if (empty($imie) == true)
				{
					$blad_01 = "<font color='black'>Pole <i>Imie</i> nie zostało wypełnione!!</font></br>";
					$blad='1';
				}

				if (empty($nazwisko) == true)
				{
					$blad_02 = "<font color='black'>Pole <i>Nazwisko</i> nie zostało wypełnione!!</font></br>";
					$blad='1';
				}

							
				if (empty($haslo) == true)
				{
					$blad_08 = "<font color='black'>Pole <i>Haslo</i> nie zostało wypełnione!!</font></br>";
					$blad='1';
				}
					if (empty($haslop) == true)
				{
					$blad_09 = "<font color='black'>Pole <i>Powtórz Haslo</i> nie zostało wypełnione!!</font></br>";
					$blad='1';
				}
				if (empty($email) == true)
				{
					$blad_10 = "<font color='black'>Pole <i>Email</i> nie zostało wypełnione!!</font></br>";
					$blad='1';
				}
				if (empty($emailp) == true)
				{
					$blad_11 = "<font color='black'>Pole <i>Powtórz email</i> nie zostało wypełnione!!</font></br>";
					$blad='1';
				}
				/*if ($zezwalam !=true)
				{
					$blad_17 = "<font color='black'>Musisz zezwolic na przetwarzanie danych zeby zostac zarejestrowanym</font></br>";
					$blad='1';
				} */
				if (empty($emailp) == true||empty($email) == true){}
				else {
				if ($emailp != $email)
				{
					$blad_15 = "<font color='black'>Pole  <i> Email</i>   i   <i>Powtórz email</i> nie sa identyczne!!</font></br>";
					$blad='1';
				}
				}
				if (empty($haslo) == true||empty($haslop) == true){}
				else {
					if ($haslo != $haslop)
				{
					$blad_16 = "<font color='black'>Pole  <i> Hasło</i>  i  <i>Powtórz haslo</i> są rózne!!</font></br>";
					$blad='1';
				}}
				/*if(!StrContains($email, "@"))
                {
					$blad_18 = "<font color='black'>Email jest nie poprawny</font></br>";
					$blad='1';}
                 if(StrContains($emailp, "@"))
{
  $blad_19 = "<font color='black'>Powtórz email jest nie poprawny</font></br>";
					$blad='1';
}*/

				if ($blad =='1')
				{
					echo "<center><table border='1px' BGCOLOR='red'><tr><td align='center'>";
					echo $blad_01;
					echo $blad_02;
					echo $blad_03;
					echo $blad_04;
					echo $blad_05;
					echo $blad_06;
					echo $blad_07;
					echo $blad_08;
					echo $blad_09;
					echo $blad_10;
					echo $blad_11;
					echo $blad_12;
					echo $blad_13;
					echo $blad_14;
					echo $blad_15;
					echo $blad_16;
					/*echo $blad_17;
					echo $blad_18;
					echo $blad_19;*/
					echo "</td></tr></table></center>";					
				}
				
				if ($blad != '1')
				{
					$wynik = mysqli_query ($polaczenie, "INSERT INTO user (imie,nazwisko,email,haslo,status) VALUES ('". $imie."','".$nazwisko."','".$email."','".$haslo."','".$status."')");
					
					
					$wynik1  = mysqli_query ($polaczenie,"SELECT id FROM  user WHERE (email = '$email')")or die('Błąd zapytania do tabeli!');	
			while ($wiersz3 = mysqli_fetch_array ($wynik1))
{	$idusera=$wiersz3 [0];}
					
if(mkdir('/home/tomkappl/domains/tomkap.pl/public_html/zad7/'.$email, 0777))
{
	 echo 'Udało się stworzyć katalogu';
}
else
{
 echo 'Nie udało się stworzyć katalogu';
}
$zapytanie1= mysqli_query ($polaczenie, "INSERT INTO pliki (iduser,sciezka,	rodzaj, nazwa) VALUES ('".$idusera."','".$email."','1','".$email."')")	or die('Błąd zapytania do tabeli kliencimkir!');
					if ($wynik)
					{                                                                             // jakies przekierowaie  do logowania , jakies hiper lacze 
						echo "<center><table border='1px' BGCOLOR='green'><tr><td align='center'>";
						echo "<font color='black'>Użytkownik został umieszczony w bazie. </font>";
						echo "</td></tr></table></center>";
						
						
						
						
					}
				}
				$ma=$email;
				//if(mail($ma, 'Witaj na platformie TKapischke', 'Twoje konto zostało aktywowane życzymy miłego korzystania z naszej platformy wiecej szczegółów na stronie '))
			}
ob_end_flush();			
?>

<center>

<form action="" method="post">
<input type="hidden" name="rej" value="rej">

<p class='tytul'>Rejestracja</p><center>

<p class='tytul'>Dane użytkownika</p><br/>
Imie:<input type="text" name="imie" value="<?php echo $imie; ?>"></br></br>
Nazwisko:<input type="text" name="nazwisko" value="<?php echo $nazwisko; ?>"></br></br>
Email:<input type="text" name="email" value="<?php echo $email; ?>"></br></br>
Powtórz email:<input type="text" name="emailp" value="<?php echo $emailp; ?>"></br></br>
Hasło:<input type="password" name="haslo" ></br></br>
Powtórz hasło:<input type="password" name="haslop"></br></br>

<input type="submit" name="B3" value="Rejestruj"></br></br></br></br>
</center></form>
</center>

<a href='logowanie.php'>Powrót</a><br>
</body>
</html>

