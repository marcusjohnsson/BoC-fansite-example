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
        $sql=" SELECT * FROM users WHERE user_uid ='$uid';";
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
                    }else if($hashedpwdCheck == true) {
                        //log in the user here
                        $_session['u_id'] = $row['user_id'];
                        $_session['u_first'] = $row['user_first'];   
                        $_session['u_last'] = $row['user_last'];   
                        $_session['u_email'] = $row['user_email'];   
                        $_session['u_id'] = $row['user_uid'];   
                        header("Location: ../home.php?login=sucess");
                        exit();
                    }
                }
        }
    }
}else{
    header("Location: ../login.php?login=error");
    exit();
}
