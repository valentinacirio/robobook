
<?php
//connessione con il database Robobook

$servername="localhost";
$username="root";
$password="";
$dbName="robobook";
$connessione= mysqli_connect($servername, $username, $password, $dbName) 
or die ("Problema di connessione con il server");

?>    