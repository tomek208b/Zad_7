<?php
//session_start();
ob_start();
include ("polaczenia.php");
  $wys_login = ($_POST['email']);
  $wys_pass = ($_POST['haslo']);
?>
<html>
<head>
	<title>Logowanie</title>
</head>
<body>
<?php

	@$rej = trim($_REQUEST["rej"]);
           
 
			if ($rej == "rej")
			{
$wynik = mysqli_query ($polaczenie,"SELECT id,haslo,status FROM  user WHERE (email = '$wys_login')")or die('Błąd zapytania do tabeli!');	
			while ($wiersz = mysqli_fetch_array ($wynik))
{	
$idusera=$wiersz [0];
$pass = $wiersz [1];
$statususer=$wiersz [2];}

echo " id : ".$idusera;
	if (!empty($pass))
	{
			if($pass==$wys_pass&&$statususer<'3')
			{		
		  $error='0';
          //$_SESSION['user'] = $idusera;
		  setcookie("id",$idusera,time()+360);
		  setcookie("login",$wys_login,time()+360);
			echo "<p><font size='5' color='green'>Udało Ci się zalogować :)</font></p></br>";     
		   header("Location: index.php");
			}
			else{ if($statususer>='3')
				{
						echo "<p><font size='5' color='red'>Konto zostało zablokowane!!!!!!!!!!!! </font></p></br>";	
				}
				else
				{
					
					$il=2-$statususer;
		          $error='1';
						echo "<p><font size='5' color='red'>Nie poprawne hasło !!!!!!!!!!! masz jeszcze ".$il." próby </font></p></br>";	
				}
	            }
	if(isset($error)){
		
		
	include ("dodaj.php");}
	
	
	
	 }

	else{
		echo "<p><font size='5' color='red'>Nie udało się tobie zalogować</font></p></br>";	
	}
	
	
//if(isset($_COOKIE['id'])&&($_COOKIE['id']>0)){
  // echo "Ciasteczko istnieje";
//header("Location: index.php");}
//else{
//echo "Brak ciastecza o nazwie aktywacja";}




ob_end_flush();
			}
?>

<center><form action='' method='post'>
<input type='hidden' name='rej' value='rej'>
<p class='tytul'>Logowanie</p>
Login:<br/>
<input type="text" name="email" class="textbox"size="30" maxlength="50" /><br/>
Hasło:<br/>
<input type="password" name="haslo" class="textbox"size="30" maxlength="50" /><br/>
<input type="submit" name="logowanie" value="Loguj">
<br/><br/><br/>
</form>

<a href='newuser.php'>Rejestracja</a><br>
</center> 
</body>
</html>