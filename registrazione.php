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

<?php
session_start();
if(isset($_SESSION['username']))//utente loggato
{
    
            header("location:home.php");
            exit;
    }


?>
    <header class="header">


        <a href="Robobook%20-%20Homepage.php">
         <img src="immagini/logo4.ico" width="360" height="300" alt="Logo Robobook" title="Logo Robobook" id="iniziopagina"/>
        </a>
        
        <span class="titlepage">Registrazione</span>
        
        </header>
        
        
        
        <div id="home">
        
        <a  class="home" href="Robobook%20-%20Homepage.php">Home</a>
        
        </div>
        <br/><br/><br/>
        
         
        
        
        
        <br><br> 
    <h1>Registrati</h1>
    <form action="conferma_registrazione.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" placeholder="Inserisci nome" >
        <br><br>
        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" placeholder="Inserisci cognome">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Inserisci email">
        <br><br>
        <label for="matricola">Matricola:</label>
        <input type="number" name="matricola" placeholder="Inserisci matricola">
        <br><br>
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Inserisci username">
        <br><br>
        
        
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Inserisci password">
        <br><br>
        <label for="confermapassword">Conferma Password:</label>
        <input type="password" name="confermaPassword" placeholder="Conferma password">
        <br><br>
        <label for="admin">Ruolo:</label>
        <input type="radio" name="admin" value= "1"required>Amministratore
        <input type="radio" name="admin" value= "0">Utente normale<br><br>
      
        <input type="submit" value ="Invia">
        <input type="reset" value="Reset">
        <br><br>
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