<?php 

session_start();
if(isset($_POST['submit'])){
    include_once 'dbh.php' ;

    //to prevent injection into the database
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

  

        //errorhandler
        //check for empty fields * good practice to check for errors first
        if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) ){
            
             header("Location: ../signup.php?signup=empty");
         exit();

        }else{

            //check if the input characters are valid 
            if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
                header("Location: ../signup.php?signup=invalid");
                exit();
                
            }else{
                //check if email is valid 
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: ../signup.php?signup=email");
                    exit();
                }else {
                    //check if the username is already taken 
                    $sql ="SELECT * FROM users WHERE user_uid='$uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows();

                    if($resultCheck > 0){
                        header("Location: ../signup.php?signup=usertaken");
                    exit();
                    }else {
                        //hashing the password 
                        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                        //INSERT THE USER INTO THE DATABASE
                        $sqlinsert=" INSERT INTO users (user_first, user_last, user_email, user_uid , user_pwd) VALUES ('$first', '$last' , '$email', '$uid', '$hashedpwd')";
                        $result = mysqli_query($conn, $sqlinsert);
                        header("Location: ../home.php?signup=succes");
                        exit();
                    }

                }
            }
        }

    }else {
    header("Location: ../signup.php");
    exit();
}


?>