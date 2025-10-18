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
     <br/>
     <span class="titlepage">Benvenuto</span>
     </header>

     

     <div id="home">
     <a  class="home" href="Robobook%20-%20Homepage.php">Home</a>
     </div>
     <br/><br/><br/>



<?php
    session_start();   

    include("connessione_db.php");

    
    if(!isset($_SESSION["username"])){
        


       
        if(!isset($_POST["username"]) || empty($_POST["username"])
        && !isset($_POST["password"]) || empty($_POST["password"])){

            
            header("Location:login.php");
            exit;

        }else{
            
            $username = mysqli_real_escape_string($connessione,$_POST["username"]);
            $password = mysqli_real_escape_string($connessione,$_POST["password"]);

            $sql = "SELECT `username`, `nome`, `cognome`, `email`, `matricola`, `amministratore` FROM utenti WHERE username = '$username' AND password='$password'";
            $risultato = mysqli_query($connessione, $sql) or die("<a href='login.php'>Errore! Torna alla pagina di login</a>"); 
                 


            
            if (mysqli_num_rows($risultato) > 0) {
                

                $row = mysqli_fetch_assoc($risultato);    

                   

                $_SESSION['username']=$row['username'];
                $_SESSION['amministratore']=$row['amministratore'];
                $_SESSION['nome']=$row['nome'];
                $_SESSION['cognome']=$row['cognome'];
                $_SESSION['email']=$row['email'];
                $_SESSION['matricola']=$row['matricola'];

             

            }else{
                echo "<a href='login.php'>Credenziali errate! Torna alla pagina di login</a>";
                exit;
            }
        }
    }
    mysqli_close($connessione);
?>






      <h1> Benvenuto <b><?=$_SESSION["username"]?></b></h1>
 
    <h3>Servizi</h3>
     <ul>
        <li>
        <?php 
        if($_SESSION['amministratore']==0){
        echo "<a href = 'profilo_utenti.php'> Profilo </a>";
        }
        else{echo "<a href='profilo_admin.php'>Profilo</a>";}
        ?>
        </li>
        
    <li><a href= 'logout.php'> Logout </a></li>
    <li><a href= 'modifica_password.php'>Cambia password</a></li>
    <li><a href= 'Robobook%20-%20Prenotazioni.html'>Prenotazioni</a></li>
    <li><a href= 'cerca_turni_liberi.php'>Cerca turno libero</a></li>



      
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



