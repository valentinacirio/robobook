<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" type="immagini/logo-icon" href="immagini/logo4.ico"/>
    <title>Prenotazioni</title>
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
include("connessione_db.php");
//verfica se l'utente è loggato
if(!$_SESSION['username'])
{header("location:login.php");
exit;}


//escape delle variabili

$ora=mysqli_real_escape_string($connessione,$_SESSION['ora']);
$data=mysqli_real_escape_string($connessione,$_SESSION['data']);
$laboratorio=mysqli_real_escape_string($connessione,$_SESSION['laboratorio']);
$matricola=mysqli_real_escape_string($connessione,$_SESSION['matricola']);
$nome=mysqli_real_escape_string($connessione,$_SESSION['nome']);
$cognome=mysqli_real_escape_string($connessione,$_SESSION['cognome']);
$email=mysqli_real_escape_string($connessione,$_SESSION['email']);
$nota=mysqli_real_escape_string($connessione,$_POST['nota']);

$dati=[
    
'nome'=>$nome,
'matricola'=>$matricola,
'cognome'=>$cognome,
'email'=>$email,
'laboratorio'=>$laboratorio,
'data'=>$data,
'ora'=>$ora,
'nota'=>$nota];

//query al db per inserimento dati
$query="INSERT INTO `prenotazione_laboratori`(`matricola`, `nome`, `cognome`, `email`, `laboratorio`, `nota`, `data`, `ora`) VALUES ('$matricola','$nome','$cognome','$email','$laboratorio','$nota','$data','$ora')";
$risultato=mysqli_query($connessione,$query) or die("Problema di connessione con il server.");
echo "<h4>Prenotazione effettuata con successo.","Torna alla pagina dei <a href='home.php'>servizi</a></h4>";
echo "<p>Riepilogo della prenotazione:</p>","<ul>";
foreach ($dati as $campo=>$dato)
{
   
    echo "<li>",strtoupper($campo),":" , " " , "$dato</li>";
}
echo "</ul>"
?>
</body>
</html>