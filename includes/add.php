<?php
include ('includes/dbh.php');

//posting the selected track from the user
$postedResult= $_POST['tracks'];


        //updating the tracks table
        $sqlUpdate ="UPDATE tracks SET reserved = 1 WHERE tracksId = $postedResult ";
        $query = $conn->query($sqlUpdate );

        //getting the tracks Name according the tracks Id
        $sqlFetch = "SELECT tracksId, tracksName, reserved FROM tracks Where tracksId = $postedResult";

        $result = $conn->query($sqlFetch );
        $queryResult = mysqli_num_rows($result);
        if($queryResult > 0){
            while($row=mysqli_fetch_assoc($result)){
            $trackId= $row['tracksId'];
            $tracksName = $row['tracksName'];
            $reserved =$row['reserved'];
        
            }
        };


        //inserting the fav track into the fav table in db
        $sql= "INSERT INTO Favorite (tracksId, tracksName, reserved) VALUES ($trackId, '$tracksName','$reserved')";
        $conn->query($sql);


        header('Location: browse.php');
        die();
        


?> 