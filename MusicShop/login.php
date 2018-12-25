<?php
session_start();
require_once 'connect.php';

if((!isset($_POST['login'])) || (!isset($_POST['password']))){
    header('Location: index.php');
    $_SESSION['mistakeSecond'] = true;
    exit();
}

$connect = @new mysqli($host , $db_user , $db_password , $db_name);

if($connect->connect_errno != 0){
    echo "Error : ".$connect->connect_errno;
}else{
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $login = htmlentities($login , ENT_QUOTES , "UTF-8");
    $password = htmlentities($password , ENT_QUOTES , "UTF-8");
    
    
    if($result = @$connect->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'" , 
        mysqli_real_escape_string($connect, $login) , 
        mysqli_real_escape_string($connect, $password)))){
        
        $count_users = $result->num_rows;
        
        if($count_users > 0){
            $_SESSION['zalogowany'] = true;
            
            $verse = $result->fetch_assoc();
            $_SESSION['id'] = $verse['id'];
            $_SESSION['user'] = $verse['user'];
            $_SESSION['email'] = $verse['email'];
            $_SESSION['dnipremium'] = $verse['dnipremium'];
            $_SESSION['albums'] = $verse['albums'];
            
            if(isset($_POST['login']) && isset($_POST['password'])){
                
            }else{
                header('Location: index.php');
            }
            
            unset($_SESSION['mistake']);
            
            $result->free_result();
            
            header('Location: music.php');            
          
        }else{
            $_SESSION['mistake'] = '<span style="color:red">Nieprawidlowy login lub haslo</span>';
            header('Location: index.php');
        }
    }
    
    $connect->close();
}
?>