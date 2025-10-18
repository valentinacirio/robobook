
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" type="immagini/logo-icon" href="immagini/logo4.ico"/>
    <title>Gestione prenotazioni</title>
    

<style>
.table-container {
    width: auto;
    border-collapse: collapse;
   
}

.table-container th,
.table-container td {
    padding: auto;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table-container th {
    background-color: #f2f2f2;
}

.table-container tr:hover {
    background-color: #f5f5f5;
}

</style>
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

   
  


<br><br> 
<?php
//innanzitutto devo verificare se l'utente è loggato e se è ammistratore
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

$query="SELECT `id`, `matricola`, `nome`, `cognome`, `email`, `laboratorio`, `nota`, `data`, `ora` FROM `prenotazione_laboratori` WHERE 1";
$risultato=mysqli_query($connessione,$query) or die("Problema di connessione con il server.");

/*Definisco diverse possibilità che l'amministratore può scegliere in base 
al tipo di elimazione che vuole effettuare.*/


?>


<!--Visualizzo una tabella con tutte le prenotazioni-->
<h1>Cancella prenotazioni</h1>
<table class="table-container">
    <tr>
        <th>Matricola</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Email</th>
        <th>Laboratorio</th>
        <th>Nota</th>
        <th>Data</th>
        <th>Ora</th>
    </tr>
    <?php
    foreach($risultato as $tupla){?>
    <form action="cancellazione_id.php" method="post">
        <tr>
            <td>
                <?php echo $tupla['matricola'];?>
            </td>
            <td>
                <?php echo $tupla['nome'];?>
            </td>
            <td>
                <?php echo $tupla['cognome'];?>
            </td>
            <td>
                <?php echo $tupla['email'];?>
            </td>
            <td>
                <?php echo $tupla['laboratorio'];?>
            </td>
            <td>
                <?php echo $tupla['nota'];?>
            </td>
            <td>
                <?php echo $tupla['data'];?>
            </td>
            <td>
                <?php echo $tupla['ora'];?>
            </td>
            <td>
               <input type="hidden" value="<?php echo $tupla['id'];?>" name="id">
               <input type="submit" value="Elimina">
            </td>
        </tr>
    </form>

    
   <?php } ?>
</table>


</body>
</html>