<?php 
session_start();
if(!isset($_SESSION['zalogowany'])){
    header('Location: index.php');
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
    <?php 
     echo "<p>Witaj ".$_SESSION['user']." !     ".' <a href="logout.php">Wyloguj sie</a>'."<br/><br/>";
     echo "<p>Liczba zakupionych albumow : ".$_SESSION['albums']."<br/><br/></p>";
     echo "<strong>Email : ".$_SESSION['email']."<br/></strong>";
     echo "<strong>Dni Premium : ".$_SESSION['dnipremium']."</strong>";
    ?>
  </body>
</html>