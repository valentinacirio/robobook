<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" type="immagini/logo-icon" href="immagini/logo4.ico"/>
    <title>Cerca prenotazione</title>
</head>
<body>
<header class="header">


<a href="Robobook%20-%20Homepage.php">
 <img src="immagini/logo4.ico" width="360" height="300" alt="Logo Robobook" title="Logo Robobook" id="iniziopagina"/>
</a>

<span class="titlepage">Cerca</span>

</header>



<div id="home">

<a  class="home" href="Robobook%20-%20Homepage.php">Home</a>

</div>
<br/><br/><br/>

   



<br><br> 
    <?php
    session_start();

    //verifico che l'utente è loggato
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit;
    }
$elencoLaboratori=[
    'Introduzione alle tecniche di programmazione industriale',
    'Modern robotics livello base',
    'Modern robotics livello intermedio',
    'Modern robotics livello avanzato',
    'Robotica aeriale',
    'Design di sensori e circuiti di sensori',
    'Safety robotics'
];

    ?>
    
    <h1>Verifica la disponibilità del turno</h1>
    <form action="risultati_ricerca.php" method="post">
        <label for="laboratorio">Laboratorio:</label>
        
        <select id="laboratorio" name='laboratorio'>
        <?php foreach($elencoLaboratori as $nome){echo"<option value='$nome'>$nome</option>";}?>
         </select>
        <br><br>
        <label for="data">Giorno:</label>
        <input type="date" name="data">
        <br><br>
       
        <input type="submit" value="Cerca">
    </form>

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