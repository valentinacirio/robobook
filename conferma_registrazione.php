<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" type="immagini/logo-icon" href="immagini/logo4.ico"/>
    <title>Form Registrazione</title>
</head>
<body>
<header class="header">


<a href="Robobook%20-%20Homepage.php">
 <img src="immagini/logo4.ico" width="360" height="300" alt="Logo Robobook" title="Logo Robobook" id="iniziopagina"/>
</a>

<span class="titlepage">Conferma Registrazione</span>

</header>



<div id="home">

<a  class="home" href="Robobook%20-%20Homepage.php">Home</a>

</div>
<br/><br/><br/>




<br><br> 
    <?php
  session_start();
  if(isset($_SESSION['username'])){
    header("location:home.php");
    exit;
  }
    
include ("connessione_db.php");


 
//Verifico che tutti i dati di input siano stati inseriti 


 if(!isset($_POST["nome"]) || empty($_POST["nome"])  &&
!isset($_POST["cognome"]) || empty($_POST["cognome"]) &&
!isset($_POST["email"]) || empty($_POST["email"]) &&
!isset($_POST["username"]) || empty($_POST["username"]) &&
!isset($_POST["password"]) || empty($_POST["password"]) &&
!isset($_POST['matricola']) || empty ($_POST['matricola']) &&
!isset($_POST["confermaPassword"]) || empty($_POST["confermaPassword"]))
//non c'è bisogno per il campo amministratore perchè ho inserito l'attributo required

{header("location:registrazione.php");
    exit;}
 
 //uso mysqli_real_escape_string sui dati ricevuti
 $nome=mysqli_real_escape_string($connessione, $_POST['nome']);   
 $cognome=mysqli_real_escape_string($connessione, $_POST['cognome']);  
 $username=mysqli_real_escape_string($connessione, $_POST['username']);  
 $email=mysqli_real_escape_string($connessione, $_POST['email']);  
 $matricola=mysqli_real_escape_string($connessione,$_POST['matricola']);
 $password=mysqli_real_escape_string($connessione, $_POST['password']);  
 $confermaPassword=mysqli_real_escape_string($connessione, $_POST['confermaPassword']);  
$amministratore=$_POST['admin'];

 //controllo che le password corrispondano
 if($password!=$confermaPassword)//per verificare questa condizione le due password non devono corrispondere
 {
    echo "Le due password non corrispondono.";
    echo "<br><a href='registrazione.php'>Ritorna alla pagina di registrazione</a>";
    exit;
 }

 //verifico se esiste già un altro utente con lo stesso username
 $query="SELECT * FROM utenti WHERE username='$username'";//seleziono tutti i record che hanno $username come username.
 $risultato=mysqli_query($connessione, $query) or die("<a href='registrazione.php'>Ritorna alla pagina di registrazione</a>");
 if(mysqli_num_rows($risultato)>0)//se questa condizione è verificata vuol dire che esiste già un utente con lo
 //stesso username all'interno del database

 {
    echo "Esiste già un utente con questo username.  ";
    echo "<br><a href='registrazione.php'>Torna alla pagina della registrazione</a>";
    exit;
 }
 //Ci possono essere massimo due amministratori
if($amministratore==1){
    $query="SELECT * FROM utenti WHERE amministratore = 1";
    $risultato=mysqli_query($connessione,$query) or die("Problema di connessione con il server");
   //se il numero di righe è maggiore di 1 vuol dire che già esistono 2 admin
    if(mysqli_num_rows($risultato)>1){
        echo "Non possono esistere più di due amministratori.<br>";
        echo "<a href='registrazione.php'>Torna alla pagina di registrazione</a>";

    exit;
   
    }
}
//registro l'utente nel database
$query="INSERT INTO `utenti`(`username`, `nome`, `cognome`, `email`, `matricola`, `password`, `amministratore`) VALUES ('$username','$nome','$cognome','$email','$matricola', '$password','$amministratore')";
$risultato=mysqli_query($connessione,$query) or die ("Problema di connessione con il server.");
echo "Registrazione effettuata con successo!  ". "<a href='login.php'>Accedi ora</a>";


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