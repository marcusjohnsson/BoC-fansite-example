<?php
            
             include ('dbh.php');
             session_start();

                if($_SESSION['u_admin']== 0 || $_SESSION['u_admin']== 2) {
                    header("location: ../index.php?access=denied");
                    exit();
                }
            
            if(isset($_POST['editusers'])){
                $postedResult = $_POST['editusers'];

                $sqlFetch = "SELECT * FROM users Where user_id = $postedResult";
                $result = $conn->query($sqlFetch);
                $queryResult = mysqli_num_rows($result);
                if($queryResult > 0){
                  while($row=mysqli_fetch_assoc($result)){
                    $userfirst= $row['user_first'];
                    $userLast = $row['user_last'];
                    $useremail = $row['user_email'];
                    $userUid = $row['user_uid'];
                    $usertype = $row['admin'];
                }
             }
             echo "<form style='line-height: 35px;' action='update.php' method='post'>
                <label for='Firstname'>First Name</label>
                <input type='text' name='username' value='$userfirst'>

                <label for='userLast'>Last Name</label>
                <input type='text' name='userlast' value='$userLast'>

                <label for='useremail'>Email adress</label>
                <input type='text' name='useremail' value='$useremail'>
                
                <label for='userUid'>User Id</label>
                <input type='text' name='userUid' value='$userUid'>

                <label for='usertype'>User type</label>
                <input type='number' name='usertype' value='$usertype' max='2'>
                <input type=hidden' name='userId' value='$postedResult'>

                <button type='submit' name='update'>Update</button>
                </form>";
          }
          
   

    

				