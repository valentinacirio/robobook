<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" type="immagini/logo-icon" href="immagini/logo4.ico"/>
    <title>Cambio password</title>
</head>
<body>
    
<header id="headerhomepage">

<a href="Robobook%20-%20Homepage.php">
<img src="immagini/logo4.ico" width="360" height="300" alt="Logo Robobook" title="Logo Robobook" id="iniziopagina"/>
</a>

<span id="titlehomepage">Modifca Password</span>
<br/>
</header>



<div id="home">
<a  class="home" href="Robobook%20-%20Homepage.php">Home</a>
</div>
<br/><br/><br/> 
<?php
session_start();
include("connessione_db.php");
//verifichiamo se l'utente è loggato
if(!isset($_SESSION['username']))
{
    //utente non loggato
    header("location:login.php");
    exit;
}



//verifico la ricezione dei dati
if(!isset($_POST['username']) || empty($_POST['username'])
|| !isset($_POST['nuovaPassword']) || empty($_POST['nuovaPassword'])){
    header("location: modifica_password.php");
exit;
}

//escape delle variabili
$username=mysqli_real_escape_string($connessione,$_POST['username']);
$nuovaPassword=mysqli_real_escape_string($connessione,$_POST['nuovaPassword']);


$query0="SELECT `username`, `amministratore` FROM `utenti` WHERE username='$username'";
$risultato0=mysqli_query($connessione,$query0) or die ("Problema di connessione con il server.");
$row=mysqli_fetch_assoc($risultato0);

if(mysqli_num_rows($risultato0)==0){
    //username inesistente
    echo "Username inesistente ", "<a href='modifica_password.php'>Torna indietro</a>";
    exit;
}

elseif($_SESSION['username']==$row['username']){
//richiesta al database
$query="UPDATE `utenti` SET `password`='$nuovaPassword' WHERE username='$username'";
$risultato=mysqli_query($connessione,$query) or die("Problema di connessione con il server.");

if($_SESSION['amministratore']==0)//utente normale
{
    echo "Password cambiata con successo.","Visualizza il tuo <a href='profilo_utenti.php'>profilo</a>";
    
}
else{echo "Password cambiata con successo.","Visualizza il tuo <a href='profilo_admin.php'>profilo</a>";}
}
else{echo "Questo non è il tuo username."," <a href='modifica_password.php'>Torna indietro</a>";}

mysqli_close($connessione);
?>







 




</body>
</html>