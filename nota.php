<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" type="immagini/logo-icon" href="immagini/logo4.ico"/>
    <title>Conferma prentotazione</title>
</head>
<body>
<header class="header">


<a href="Robobook%20-%20Homepage.php">
 <img src="immagini/logo4.ico" width="360" height="300" alt="Logo Robobook" title="Logo Robobook" id="iniziopagina"/>
</a>

<span class="titlepage">Prenotazioni</span>

</header>



<div id="home">

<a  class="home" href="Robobook%20-%20Homepage.php">Home</a>

</div>
<br/><br/><br/>
    <?php
session_start();
if(!isset($_SESSION['username']))
{header("location:login.php");
exit;}

if(!isset($_GET['ora'])){header("location:cerca_turni_liberi.php");exit;}
  
 

//salvo ora in sessione
$_SESSION['ora']=$_GET['ora'];

    ?>
    <h1>Conferma prenotazione</h1>
    <form action="prenota_turno_libero.php" method="post">
        <textarea name="nota" placeholder="Nota opzionale" cols="30" rows="10"></textarea>
        <br><br>
        <a href="cerca_turni_liberi.php"><input type="button" value="Annulla"></a>
        <input type="submit" value="Conferma">
        </form>
    
</body>
</html>