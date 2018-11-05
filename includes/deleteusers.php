<?php
            
             include ('dbh.php');
             session_start();

                if($_SESSION['u_admin']== 0 || $_SESSION['u_admin']== 2) {
                    header("location: index.php?access=denied");
                    exit();
                }
            
            if(isset($_POST['deleteusers'])){
                $postedResult = $_POST['deleteusers'];
                $sqlDelete = "DELETE FROM users WHERE user_id=$postedResult";
                $result = mysqli_query($conn, $sqlDelete);
                header("location: ../admin.php?delete=done");
                exit();
                 }
              
