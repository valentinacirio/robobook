<?php
    session_start();
    include("connessione_db.php");


    if(!isset($_SESSION["username"])){
        header ("Location:login.php");
        exit;
    }


?>

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" type="immagini/logo-icon" href="immagini/logo4.ico"/>
    </head>

    <body>



     <header id="headerhomepage">

     <a href="Robobook%20-%20Homepage.php">
     <img src="immagini/logo4.ico" width="360" height="300" alt="Logo Robobook" title="Logo Robobook" id="iniziopagina"/>
     </a>

     <span id="titlehomepage">Il tuo profilo</span>
     <br/>
     </header>



     <div id="home">
     <a  class="home" href="Robobook%20-%20Homepage.php">Home</a>
     </div>
     <br/><br/><br/>









     <br/>
     
     <br/>


        <?php


            $username = $_SESSION["username"];  

            $sql = "SELECT * FROM utenti WHERE username = '$username'"; 
            $risultato = mysqli_query($connessione, $sql) or die("<a href='login.php'>Errore! Torna alla pagina di login</a>");
            $userData=mysqli_fetch_assoc($risultato);    
            mysqli_close($connessione);     
                                                        
    ?>

<h1>Ecco i tuoi dati</h1>
       
        <br>
        <b>Username:</b> <?= $userData["username"]  ?> <br><br> 
        <b>Email:</b> <?= $userData["email"] ?> <br><br>
  
            <br><br>
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