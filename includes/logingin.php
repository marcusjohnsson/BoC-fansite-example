<?php 

session_start();
if (isset($_POST['submit'])) {

    include 'dbh.php';
    $uid = mysqli_real_escape_string($conn, $_POST['userid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    

    //error handlers
    //check if the inputs are empty 
    if (empty($uid) || empty($pwd)) {
        // left empty
        header("Location: ../index.php?login=empty");
        exit();
    }else{
        //check to see if it exists or not. if it doesnt exist show error
        $sql=" SELECT * FROM users WHERE user_uid ='$uid' or user_email = '$uid';";
        $result =mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
            if ($resultCheck < 1) {
            header("Location: ../index.php?login=doesntexist");
            exit();
            }else{
                if($row=mysqli_fetch_assoc($result)){
                    //de-hashing the password
                    $hashedpwdCheck = password_verify($pwd, $row['user_pwd']);
                    if($hashedpwdCheck == false){
                        header("Location: ../index.php?login=wrongpassword");
                        exit();
                    }elseif($hashedpwdCheck == true && $row['admin'] == 0) {
                        //log in the user here
                        session_regenerate_id(true);
                        $_SESSION['u_id'] = $row['user_id'];
                        $_SESSION['u_first'] = $row['user_first'];   
                        $_SESSION['u_last'] = $row['user_last'];   
                        $_SESSION['u_email'] = $row['user_email'];   
                        $_SESSION['u_uid'] = $row['user_uid'];
                        $_SESSION['u_admin'] = $row['admin'];  
                        header("Location: ../home.php?login=sucess");
                        exit();
                    }elseif($hashedpwdCheck == true && $row['admin'] == 1) {
                        session_regenerate_id(true);
                        $_SESSION['u_id'] = $row['user_id'];
                        $_SESSION['u_first'] = $row['user_first'];   
                        $_SESSION['u_last'] = $row['user_last'];   
                        $_SESSION['u_email'] = $row['user_email'];   
                        $_SESSION['u_uid'] = $row['user_uid'];  
                        $_SESSION['u_admin'] = $row['admin'];
                        header("Location: ../admin.php?login=sucess");
                        exit();
                    }
                }
        }
    }
}else{
    header("Location: ../login.php?login=error");
    exit();
}
