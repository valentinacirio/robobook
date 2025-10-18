<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" type="immagini/logo-icon" href="immagini/logo4.ico"/>
    <title>Gestione prenotazioni</title>
</head>
<body>
<header id="headerhomepage">

<a href="Robobook%20-%20Homepage.php">
<img src="immagini/logo4.ico" width="360" height="300" alt="Logo Robobook" title="Logo Robobook" id="iniziopagina"/>
</a>

<span id="titlehomepage">Prenotazioni</span>
<br/>
</header>



<div id="home">
<a  class="home" href="Robobook%20-%20Homepage.php">Home</a>
</div>
<br/><br/><br/> 
<?php
session_start();
include("connessione_db.php");

//verifico se l'utente è loggato
if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit;
}

//verifico se l'utente è amministratore
if($_SESSION['amministratore']==0){
    echo "Non sei amministratore:accesso negato!";
    header("refresh:5;url=profilo_utenti.php");
    exit;
}
//verifico ricezione dei dati
if(!isset($_POST['id']) || empty($_POST['id']))
{header("location:elimina_prenotazione.php");
        exit;
}

else{
    //escape delle variabili
    $id=mysqli_real_escape_string($connessione,$_POST['id']);
    

    $query0="DELETE FROM `prenotazione_laboratori` WHERE id='$id'";
    $risultato0=mysqli_query($connessione, $query0) or die("Problema di connessione con il server.");
    
    echo "Cancellazione effettuata con successo!  ", 
    "Continua la cancellazione delle <a href='elimina_prenotazione.php'>prenotazioni</a>",
    " oppure torna sul tuo <a href='profilo_admin.php'>profilo</a>.";
}

mysqli_close($connessione);
?>


 <br/><br/>






 <br/><br/><br/><br/><br/> <br/><br/>





<footer class="footer">
<div class="footerscritte">

 © Valentina Cirio
<br/>
 © Felice D'Andrea
<br/>
 © Robobook
<br/>
<a href="Robobook%20-%20Privacy%20Policy.html">Privacy Policy</a>
<br/>
<a href="#iniziopagina">Torna all'inizio della pagina</a>

</div>
</footer>


    
</body>
</html>