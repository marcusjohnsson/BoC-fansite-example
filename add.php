<?php
include('header.php');

//posting the selected track from the user
$postedResult= $_POST['tracks'];

//check if the selected track already exist in the fav table
$sqlCheck = "SELECT COUNT(*) FROM Favorite WHERE tracksId= $postedResult ";
$check = mysqli_query($conn,$sqlCheck);

if ($check >= 1)
    {
       
       echo "<script>alert('This track already exists in your favorite list!');</script>";
        exit();

        
    }

            //getting the tracks Name according the tracks Id
        $sqlFetch = "SELECT tracksId, tracksName FROM tracks Where tracksId = $postedResult";
        $result = $conn->query($sqlFetch);
        $queryResult = mysqli_num_rows($result);
        if($queryResult > 0){
            while($row=mysqli_fetch_assoc($result)){
            $trackId= $row['tracksId'];
            $tracksName = $row['tracksName'];
            }
        };

        //inserting the fav track into the fav table in db
        $sql= "INSERT INTO Favorite (tracksId, tracksName)  VALUES ($trackId, '$tracksName')";
        $conn->query($sql);


        header('Location: browse.php');
        die();
        


?> 