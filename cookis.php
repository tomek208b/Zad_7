<?php
if(isset($_COOKIE['id'])&&$_COOKIE['id']>0)
{ echo "Ciasteczko istnieje".$_COOKIE['id'];}
else{
   echo "Brak ciastecza o nazwie aktywacja";
header("Location: logowanie.php"); 
}
?>
