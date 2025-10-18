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



<br><br> 
    <?php
    session_start();
    include("connessione_db.php");
    if(!isset($_SESSION['username'])){//utente non loggato
        header("location:login.php");
        exit;
    }

    ?>
    <header id="headerhomepage">

<a href="Robobook%20-%20Homepage.php">
<img src="immagini/logo4.ico" width="360" height="300" alt="Logo Robobook" title="Logo Robobook" id="iniziopagina"/>
</a>

<span id="titlehomepage">Modifica Password</span>
<br/>
</header>



<div id="home">
<a  class="home" href="Robobook%20-%20Homepage.php">Home</a>
</div>
<br/><br/><br/>


    <h1>Inserisci username e nuova password</h1>
    <form action="aggiorna_password.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="username">
        <br><br>
        <label for="nuovaPassword">Nuova password:</label>
        <input type="password" name="nuovaPassword" placeholder="nuova password">
        <br><br>
        <input type="submit" value="Aggiorna" >


    </form>
    <br><br><br>
        <?php 
        if($_SESSION['amministratore']==0)//utente normale
        {
            $profilo="profilo_utenti.php";
        }
        else{$profilo="profilo_admin.php";}
        ?>
        <a href = "<?=$profilo?>" >Visualizza il tuo profilo</a>

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