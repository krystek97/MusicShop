<?php 
session_start();

if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] = true){
    header('Location: music.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE-edge,chrome=1"/>
    <title>MusicShop - Sklep Muzyczny</title> 
  </head>
  <body>
    Ach muzyka , to magia wieksza od wszystkiego , co my tu robimy! - Albus Dumbledore<br/><br/>
    
    <form action="login.php" method="post">
      Login : <br/>
      <input type="text" name="login"/><br/>
      Haslo : <br/>
      <input type="password" name="password"/><br/><br/>
      
      <input type="submit" value="Zaloguj sie"/>   
    </form>
    <?php

    
    if(isset($_SESSION['mistake'])){
        echo $_SESSION['mistake'];
    }
    ?>
  </body>
</html>