<?php  
session_start(); 

if($_SESSION['status'] == 1){
    
      } else {
          header('location: login.php');
      }

?>