<?php
include('includes/header.php');

//posting the selected track from the user
$postedResult= $_POST['tracks'];

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

//deleting the fav track from the fav table in db
 $sql= "DELETE FROM Favorite WHERE tracksId='$trackId'";
$conn->query($sql);

//updating reserved valu from tracks database
        
$sqlUpdate ="UPDATE tracks SET reserved = 0 WHERE tracksId = $postedResult ";
$query = $conn->query($sqlUpdate );


header('Location: mygoods.php');
?>


