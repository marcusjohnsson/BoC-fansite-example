<?php
            
             include('dbh.php');
             session_start();

                if($_SESSION['u_admin']== 0) {
                    header("location: index.php?access=denied");
                    exit();
                }

                if(isset($_POST['updatealbums'])){
                   
                    $albumId=$_POST['albumId'];
                    $albumName= $_POST['albumname'];
                    $albumDueDate = $_POST['albumDueDate'];
                     $tracksName = $_POST['tracksName']; //array
                     $tracksDuration = $_POST['tracksDuration'];
                     $tracksId=$_POST['tracksId'];
                     
                    //   echo "<pre>";
                    //   var_dump($_POST);
                    //   echo "</pre>";
                    $maxtracksName = count($_POST['tracksName']);
                    for ($i = 0;$i < $maxtracksName;$i++){
                        echo $tracksName[$i];
                        echo $tracksDuration[$i];
                        echo $tracksId[$i];

                        $SqlUpdatetracks = "UPDATE tracks SET 
                        tracksName = '$tracksName[$i]',
                        tracksDuration = '$tracksDuration[$i]'
                        WHERE
                        tracksId = $tracksId[$i]";
                        $results = mysqli_query($conn, $SqlUpdatetracks); 
                        if ($results === TRUE){
                            header("location: ../moderator.php?update=completed");
                        }else {
                            echo "fail";
                        }

            }
                        // foreach ( $_POST['tracksName'] as $track ){
                        //     echo $track . " <br>";
                        // }
                        //     foreach($_POST['tracksDuration'] as $tracksDu){
                        //         echo $tracksDu . " <br>";
                        //     }
                        //         foreach($_POST['tracksId'] as $trackId){
                        //             echo $trackId . " <br>";
    
                        //         }
                              
                                // $SqlUpdatetracks = "UPDATE tracks SET 
                                // tracksName = '$track',
                                // tracksDuration = '$tracksDu'
                                // WHERE
                                // tracksId = $trackId";
                                // $results = mysqli_query($conn, $SqlUpdatetracks); 
                                // // if($results === TRUE){
                                // //   header("location: ../moderator.php?update=completed");
                                // //    exit();
                            

                        
                        //echo $track . " <br>";
                       
                    
                

                 //insert into album
                 $SqlUpdateAlbums = "UPDATE albums SET 
                 albumName = '$albumName',
                 albumDueDate = '$albumDueDate'
                 WHERE albumId = $albumId";
                 $result = mysqli_query($conn, $SqlUpdateAlbums);    
                

            //     //insert into Tracks 
            //     $SqlUpdatetracks = "UPDATE tracks SET 
            //     tracksName = '$tracksName',
            //     tracksDuration = '$tracksDuration'
            //     WHERE
            //     tracksId = $tracksId";
            //     $results = mysqli_query($conn, $SqlUpdatetracks); 
            //     // if($results === TRUE){
            //     //     header("location: ../moderator.php?update=completed");
            //    // exit();
            //     // }else {
            //     //     echo"error";
            //     // }
                
                
               }