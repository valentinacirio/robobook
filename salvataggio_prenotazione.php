<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" type="immagini/logo-icon" href="immagini/logo4.ico"/>
    <title>Conferma Prenotazione</title>
</head>
<body>
<header class="header">


<a href="Robobook%20-%20Homepage.php">
 <img src="immagini/logo4.ico" width="360" height="300" alt="Logo Robobook" title="Logo Robobook" id="iniziopagina"/>
</a>

<span class="titlepage">Salvataggio prenotazione</span>

</header>



<div id="home">

<a  class="home" href="Robobook%20-%20Homepage.php">Home</a>

</div>
<br/><br/><br/>

  



<br><br> 
    <?php
session_start();
if(!isset($_SESSION['username']))//significa che l'utente non è loggato
{
   header("location:login.php");
    exit;
}

    include("connessione_db.php");


    //verifico che tutti i dati di input siano stati inseriti

    if(!isset($_POST['nome']) || empty($_POST['nome']) 
    || !isset($_POST['cognome']) || empty($_POST['cognome'])
    || !isset($_POST['matricola']) || empty($_POST['matricola'])
    || !isset($_POST['email']) || empty($_POST['email']) 
    || !isset($_POST['laboratorio']) || empty($_POST['laboratorio'])
    || !isset($_POST['ora']) || empty($_POST['ora'])
    || !isset($_POST['data']) || empty($_POST['data'])
    ){header("location:Robobook%20-%20Prenotazioni.html");
        exit;

    }
 


    //Escape delle variabili
    $nome=mysqli_real_escape_string($connessione, $_POST['nome']);
    $cognome=mysqli_real_escape_string($connessione, $_POST['cognome']);
    $matricola=mysqli_real_escape_string($connessione, $_POST['matricola']);
    $data=mysqli_real_escape_string($connessione, $_POST['data']);
    $laboratorio=mysqli_real_escape_string($connessione, $_POST['laboratorio']);
    $ora=mysqli_real_escape_string($connessione, $_POST['ora']);
    $email=mysqli_real_escape_string($connessione, $_POST['email']);
    $nota=mysqli_real_escape_string($connessione,$_POST['nota']);
    //messaggi di errore
    

    //controllare se quel turno in quell giorno è già occupato per quel laboratorio
    
    $query1="SELECT 'laboratorio', 'data','ora' FROM `prenotazione_laboratori` WHERE laboratorio='$laboratorio' AND data='$data' AND ora='$ora'";
    $risultato1=mysqli_query($connessione,$query1) or die("Problema di connessione con il server.");
    if(mysqli_num_rows($risultato1)>0){//se ci sono già righe esistenti vuol dire che il turno è già occupato
        echo "Turno già occupato. Selezionarne un altro.<br>";
        echo "Torna alla pagina di prenotazione: <a href='Robobook%20-%20Prenotazioni.html'>Prenotazioni</a>";
        }
    
    else{
        $query2="INSERT INTO `prenotazione_laboratori`(`matricola`, `nome`, `cognome`, `email`, `laboratorio`, `nota`, `data`, `ora`) VALUES ('$matricola','$nome','$cognome','$email','$laboratorio','$nota','$data','$ora')";
        $risultato2=mysqli_query($connessione,$query2) or die("Problema di connessione con il server.");
        echo "Prenotazione effettuata con successo.<br>";
        if($_SESSION['amministratore']==0){ echo "Torna alla tua pagina di <a href='profilo_utenti.php'>profilo</a>",
            " oppure aggiungi altre <a href='Robobook%20-%20Prenotazioni.html'>prenotazioni</a>.";

        }
        else{ echo "Torna alla tua pagina di <a href='profilo_admin.php'>profilo</a>",
            " oppure aggiungi altre <a href='Robobook%20-%20Prenotazioni.html'>prenotazioni</a>.";}


     //creo una funzione che mi genera un array con tutti i dati inseriti
 function crea_array($dati){//assumo dei dati che corrispondono a quelli pervenuti tramtie post
    $prenotazione=[];
    foreach($dati as $key=>$value){
        $prenotazione[$key]=$value;//creo array associativo
    
    }
    return $prenotazione;
}
$prenotazione=crea_array($_POST);//mi servirà per la stampa del riepilogo prenotazione

     
        echo "Ecco il riepilogo della tua prenotazione:<br><ul>";
        foreach($prenotazione as $campo=>$dato){
    
            echo "<li>",strtoupper($campo),":" , " " , "$dato</li>";//creo una lista con tutte le informazioni relative alla prenotazione
        }
        echo "</ul>";
       
    }
    mysqli_close($connessione);
    ?>
   

</body>
</html>