<?php
session_start();
// initializing variables
$usernameEmail = "";
$password = "";
$errors = array(); 

// connect to the database
require_once ("dbcontroller.php");
$db_handle = new DBController();
$db_connect = $db_handle->connectDB();

// LOGIN USER
if (isset($_POST['login_user'])) {
    $usernameEmail = mysqli_real_escape_string($db_connect, $_POST['username']);
    $password = mysqli_real_escape_string($db_connect, $_POST['password']);
    if (count($errors) == 0) {
        // $password = md5($password);      
        $query2 = "SELECT name, email FROM access WHERE (username='$usernameEmail' OR email='$usernameEmail') AND password='$password'";
        $results = mysqli_query($db_connect, $query2);
        if (mysqli_num_rows($results) == 1) {
        $row = mysqli_fetch_assoc($results);
          $_SESSION['email'] = $row['email'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['status'] = '1';
          // if($row['status']==0){
          //   $query = "UPDATE user SET status=1 WHERE (username='$usernameEmail' OR email='$usernameEmail') AND password='$password'";
          //   $result = mysqli_query($db_connect, $query);
          // }
            header('location: user.php');  
          
        }else {            
            array_push($errors, "Username or Password is Wrong!");
        }
    }
}


?>