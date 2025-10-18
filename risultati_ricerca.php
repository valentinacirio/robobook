<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" type="immagini/logo-icon" href="immagini/logo4.ico"/>
    <title>Risultati ricerca</title>
</head>
<body>
<header class="header">


<a href="Robobook%20-%20Homepage.php">
 <img src="immagini/logo4.ico" width="360" height="300" alt="Logo Robobook" title="Logo Robobook" id="iniziopagina"/>
</a>

<span class="titlepage">Risulati della ricerca</span>

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
    //utente non loggato
    header("location:login.php");
    exit;
}

//verifico ricezione dei dati
if(!isset($_POST['laboratorio']) || empty($_POST['laboratorio'])
|| !isset($_POST['data']) || empty($_POST['data'])
//|| !isset($_POST['ora']) || empty($_POST['ora'])
)
{header("location:cerca_turni_liberi.php");
exit;
}


//escape della variabili
$laboratorio=mysqli_real_escape_string($connessione,$_POST['laboratorio']);
$data=mysqli_real_escape_string($connessione,$_POST['data']);

//salvo le variabili in sessione
$_SESSION['laboratorio']=$laboratorio;
$_SESSION['data']=$data;
//$ora=mysqli_real_escape_string($connessione,$_POST['ora']);
//inizializzo variabili
$turniOccupati=[];
$turniLiberi=[];
$turni=['12am-14pm','14pm-16pm','16pm-18pm'];
//controllo se il turno è occupatp
$query="SELECT `laboratorio`, `data`, `ora` FROM `prenotazione_laboratori` WHERE laboratorio='$laboratorio' AND data='$data'";
$risultato=mysqli_query($connessione,$query) or die("Problema di connessione con il server.");


if(mysqli_num_rows($risultato)>=1 && mysqli_num_rows($risultato)<3){//se i turni occupati sono 1 o 2


   foreach($risultato as $row)//ricavo i valori della tupla
    {
         
  
       $turniOccupati[]= $row['ora'];}//dopo di ché aggiungo per ogni tupla il valore corrispondente alla chiave ora

    

 foreach($turni as $ora)
        {
          if(!in_array($ora,$turniOccupati))//confronto gli orari dei vari turni con quelli occupati
                {//se non è presente significa che è libero e lo aggiungo all'array turniLiberi
                    $turniLiberi[]=$ora; 
                }
            }
  
        
//ho creato l'array con tutti i posti disponibili
echo "<h1>Questi sono tutti i turni disponibili:</h1>";

echo "<ul>";
foreach($turniLiberi as $turno) //stampa della lista di array
        {
            echo "<li><a href='nota.php?ora=$turno'>$turno</a></li><br>";
        }
      
 echo "</ul>";   
 echo "<br>Clicca sull'orario per prenotare il turno.";
 echo "<br>Oppure torna alla pagina <a href='cerca_turni_liberi.php'>precedente</a> o ritorna ai <a href='home.php'>servizi</a>.";
        
    } 
    
elseif(mysqli_num_rows($risultato)==0)//vuol dire che non ci sono prenotazioni quel giorno
{echo "<h1>Questi sono tutti i turni disponibili:</h1>";

    echo "<ul>";
    foreach($turni as $turno) //stampa della lista di array
            {
                echo "<li><a href='nota.php?ora=$turno'>$turno</a></li><br>";
            }
      
     echo "</ul>";   
    echo "<br>Clicca sull'orario per prenotare il turno.";
    echo "<br>Oppure torna alla pagina <a href='cerca_turni_liberi.php'>precedente</a> o ritorna ai  <a href='home.php'>servizi</a>.";
}
else{echo "I turni per $laboratorio nel giorno $data sono tutti occupati.";
   
    echo "<br>Torna alla pagina <a href='cerca_turni_liberi.php'>precedente</a> o ritorna ai <a href='home.php'>servizi</a>.";
}

mysqli_close($connessione);
    ?>
  






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