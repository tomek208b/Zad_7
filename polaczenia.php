<?php

$dbhost="localhost"; $dbuser="tomkappl_user"; $dbpassword="tomek12"; $dbname="tomkappl_data";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);


?>