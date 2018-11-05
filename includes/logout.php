<?php 

if(isset($_POST['logout'])) {
    session_start();
    //remove the session variables
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}