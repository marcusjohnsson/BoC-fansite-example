<?php
            
             include ('dbh.php');
             session_start();

                if($_SESSION['u_admin']== 0 || $_SESSION['u_admin']== 2) {
                    header("location: index.php?access=denied");
                    exit();
                }

                if(isset($_POST['update'])){
                    $userId = $_POST['userId'];
                    $userfirst= $_POST['username'];
                    $userLast = $_POST['userlast'];
                    $useremail = $_POST['useremail'];
                    $userUid = $_POST['userUid'];
                    $usertype = $_POST['usertype'];

                    $SqlUpdate = "UPDATE users SET 
                    user_first = '$userfirst',
                    user_last = '$userLast',
                    user_email= '$useremail',
                    user_uid = '$userUid',
                    admin = '$usertype'
                    WHERE
                    user_id = $userId
                    ";
                    $result = mysqli_query($conn, $SqlUpdate);
                    header("location: ../admin.php?update=completed");
                
                }