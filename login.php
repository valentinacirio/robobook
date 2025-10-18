
<?php
    

    session_start();
    if(isset($_SESSION["username"])){ 
        header("Location:home.php");
        exit;
    }
?>



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

     <span id="titlehomepage">Accedi al tuo profilo</span>
     <br/>
     </header>





     <div id="home">
     <a  class="home" href="Robobook%20-%20Homepage.php">Home</a>
     </div>
     <br/><br/><br/>







     <br/>
     <h1>Benvenuto, puoi effettuare il login</h1>
     <br/>

         <form action = "home.php" method = "post">
         <input type = "text" name = "username" placeholder=" username"/> <input type = "password" name = "password" placeholder=" password"/> 
         <br><br>
         <input type = "submit" value = "Login"/> &nbsp; &nbsp; <a href = "registrazione.php" > Registrati</a> 
         </form>

     </body>
</html>






