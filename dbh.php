<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName ="boardsofcanada";
$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);


if ($dbName->connect_error) {
    echo "could not connect: " . $dbName->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
}

/*$sql="SELECT (whatever user searches) FROM albums";
$result = mysqli_query($conn,$sql);
 

 if ($result->num_rows > 0){
     while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
         echo $row['albumId'].' '.$row['albumName'].' '.$row['albumDueDate']. '<br>';
     }
 }else {
     echo "0 results";
 }*/
	 



?>