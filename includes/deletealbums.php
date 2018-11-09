<?php
            
             include ('dbh.php');
             session_start();

                if($_SESSION['u_admin']== 0) {
                    header("location: ../index.php?access=denied");
                    exit();
                }
            
            if(isset($_POST['deleteAlbums'])){
                $albumId = $_POST['deleteAlbums'];
                var_dump($albumId);
                $sqlDelete = "DELETE FROM albums WHERE albumId =$albumId";
                $result = mysqli_query($conn, $sqlDelete);

                $sqlDeletetracks = "DELETE FROM tracks WHERE albumId =$albumId";
                $results = mysqli_query($conn, $sqlDeletetracks);
                if($result === true && $results === true ){
                    header("location: ../moderator.php?delete=done");
                    exit();
    
                }else{
                    echo "fail";
                }
                 }