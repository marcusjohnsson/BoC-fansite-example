<?php
            
             include 'dbh.php';
             session_start();

                if($_SESSION['u_admin']== 0) {
                    header("location: ../index.php?access=denied");
                    exit();
                }
                if(isset($_POST['editalbums'])){

                    $albumId=$_POST['editalbums'];
                    $sql="SELECT * FROM albums JOIN tracks ON albums.albumId = tracks.albumId WHERE albums.albumId=$albumId";
                    $results = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_num_rows($results);

                    if($resultcheck > 0){
                        $lastAlbum = null;
                        $counter=0;
                        while($row=mysqli_fetch_assoc($results)){
                            $albumName= $row['albumName'];
                            $albumDueDate = $row['albumDueDate'];
                            $tracksId=$row['tracksId'];
                            $tracksName = $row['tracksName'];
                            $tracksDuration = $row['tracksDuration'];
                            $counter++;
                           
                            if ($row['albumName'] !== $lastAlbum){
                                $lastAlbum = $row['albumName'];
                                echo"<form style='line-height: 35px;' action='updatealbums.php' method='post'>
                                <label>Album Name</label>
                                <input type='text' name='albumname' value='$lastAlbum'>
                                <input type='hidden' name='albumId' value='$albumId'>
                                <label>Album Due Date</label>
                                <input type='date' name='albumDueDate' value='$albumDueDate'><br>";
                        }
                       echo " <label>Tracks Name</label>
                            <input type='text' name='tracksName[]' value='$tracksName'>
                            <input type='text' name='tracksId[]' value='$tracksId'>
                            <label>Tracks Duration</label>
                            <input type='time' name='tracksDuration[]' value='$tracksDuration' step='2'><br>";
                        }  
                       echo" <button type='submit' name='updatealbums'>Update</button>
                            </form>";                         
                     }
                }