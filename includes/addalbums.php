<?php
            
             include('dbh.php');
             session_start();

                if($_SESSION['u_admin']== 0) {
                    header("location: ../index.php?access=denied");
                    exit();
                }
            
            if(isset($_POST['adding'])){
                    $albumName= $_POST['albumname'];
                    $albumDueDate = $_POST['albumdate'];
                    $tracksName = $_POST['tracksname'];
                    $tracksDuration = $_POST['tracksduration'];
                }
                $sqlInsert = "INSERT INTO albums (albumName, albumDueDate) VALUES ('$albumName', '$albumDueDate')";
                $result= mysqli_query($conn, $sqlInsert);

                if($result === TRUE){
                    $last_id = $conn->insert_id;
                    
                    echo "New record created successfully. Last inserted ID is: " . $last_id;
                }
                    $sqlInserttrcaks = "INSERT INTO tracks (tracksName, albumId, tracksDuration) VALUES ('$tracksName', $last_id, '$tracksDuration')";
                    $results= mysqli_query($conn, $sqlInserttrcaks);
                    if($results === true){
                        header("location: ../moderator.php?adding=completed");
                    }else{
                       header("location: ../moderator.php?adding=error");
                    }
                    
                
