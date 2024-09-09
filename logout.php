<?php
    session_start(); 

    $_SESSION = array(); // Reset session variables

    session_destroy(); // Destroy session

    //redirerct for users to login again
    header('Location: login.php');
    
?>