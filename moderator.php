<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>admin page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />

	</head>

		<body id="moderator">
			<div id="contentContainer">
				<header>	
					<?php
				 include('includes/header.php'); 
					if($_SESSION['u_admin'] == 0) {
						header("location: index.php?access=denied");
                        }
					?>
                 </header>
                 <?php
                    echo'<div id="mod-list">';
                   echo'<form style="margin:15px auto; width:42%" action="includes/addalbums.php" method="post">
                   <label> Album Name</label>
                    <input type="text" name="albumname" placeholder="Album Name">
                    <label> Album Due Date</label>
                    <input type="date" name="albumdate"><br>

                    <label> Tracks Name</label>
                    <input type="text" name="tracksname">
                    <label> Tracks Duration</label>
                    <input type="time" name="tracksduration" step="2">
                    <button type="submit" name="adding" style="border-radius:1%;">add</button>
                    </form>';

                ?>
								<div class="albumcontainer">
					<?php 
							$sql= "SELECT *
							FROM albums 
							JOIN tracks 
							ON albums.albumId = tracks.albumId 
							ORDER BY albums.albumName";

							$results = mysqli_query($conn,$sql);
							$queryResults = mysqli_num_rows($results);

							if ($queryResults > 0) {
								$lastAlbum = null;
								while ($row = mysqli_fetch_assoc($results)) {
									
									if ($row['albumName'] !== $lastAlbum){
										$lastAlbum = $row['albumName'];
                                        echo '<br>'."<div class='album'>".$row['albumName'].' '.$row['albumDueDate'].
                                        '<form class="tableform" action="includes/editalbums.php" method="post">
                                        <input type="hidden" name="editalbums" value="'.$row['albumId'].'">
                                        <button type="submit">edit</button></form>
                                        
                                        <form class="tableform" action="includes/deletealbums.php" method="post">
                                        <input type="hidden" name="deleteAlbums" value="'.$row['albumId'].'">
                                        <button type="submit" >delete</button></form></div>';
									}
                                        echo "<div class='tracks'>".$row['tracksId']." ".$row['tracksName']." ".$row['tracksDuration']."
                                        </div>
                                        <br>";				

									}
								};
							

					?>
				</div>	


                   
                    
			</div>
		</body>
</html>