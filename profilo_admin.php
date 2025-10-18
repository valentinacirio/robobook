<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" type="immagini/logo-icon" href="immagini/logo4.ico"/>
    <title>Profilo Admin</title>
</head>
<body>
<header class="header">


<a href="Robobook%20-%20Homepage.php">
 <img src="immagini/logo4.ico" width="360" height="300" alt="Logo Robobook" title="Logo Robobook" id="iniziopagina"/>
</a>

<span class="titlepage">Profilo</span>

</header>



<div id="home">

<a  class="home" href="Robobook%20-%20Homepage.php">Home</a>

</div>
<br/><br/><br/>

    
 


<br><br> 
    <?php

    session_start();
    include("connessione_db.php");
    //verifico se l'utente è loggato
    if(!isset($_SESSION['username'])){
        //se utente non è loggato lo reinvio alla pagina di login
        header("location:login.php");
        exit;
    }
    //se l'utente invece è già loggato verfico se è amministratore
    else{
        if($_SESSION['amministratore']==0){
            echo "Non sei amministratore: accesso negato!";
            header("refresh:5;url=profilo_utenti.php");
            exit;
        }
    }
        
//Richiamo i dati dell'amministratore
$username=$_SESSION['username'];
$query="SELECT * FROM `utenti` WHERE username='$username'";
$risultato=mysqli_query($connessione,$query) or die("Problema di connessione con il server");
$userData=mysqli_fetch_assoc($risultato);//trasformo il risultato in un array
mysqli_close($connessione);



?>
    <h1>Ecco i tuoi dati:</h1>
        <a href = "home.php" >Pagina di benvenuto</a>
        <br><br>
        <b>Username:</b> <?= $userData["username"]  ?> <br><br> 
        <b>Email:</b> <?= $userData["email"] ?> <br><br>
        
        
        <b>Modifica prenotazioni</b>
        <ul>
            <li><a href='Robobook%20-%20Prenotazioni.html'>Aggiungi prenotazione</a></li>
            <li><a href='elimina_prenotazione.php'>Elimina prenotazione</a></li>
        </ul>
<br>
   
        <h3><b>Servizi</b></h3>
            <ul>
                 <li><a href = "home.php" >Pagina di Benvenuto</a></li>
                <li><a href= 'logout.php'> Logout </a></li>
                <li><a href= 'modifica_password.php'>Cambia password</a></li>
                <li><a href= 'Robobook%20-%20Prenotazioni.html'>Prenotazioni</a></li>
                <li><a href= 'cerca_turni_liberi.php'>Cerca turno libero</a></li>
    
                
</ul>
   
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