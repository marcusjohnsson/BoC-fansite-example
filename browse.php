

<!DOCTYPE html>
<html id="browseHtml">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Browse page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
		<body id="browse">
			<div id="contentContainer">	
			<header>	
				<?php include('header.php');?>
				
			</header>
			<div id="formBox">
					<form  action ="searchresult.php" method="POST" >
					<label for="Albums">Find your fav</label>
					
							<input type="text" id="Aname" name="ArtistsName" placeholder="search for the artisit...">
							<input type="submit" name="submit" >


					</form>
                 </div>
		
			
			<div class="lists">
				<div class="albumcontainer">
				<?php 
						$sql= "SELECT  albumName, albumDueDate, tracksName, tracksDuration FROM albums JOIN tracks ON albums.albumId = tracks.albumId ORDER BY albums.albumName";
                        $results = mysqli_query($conn,$sql);
						$queryResults = mysqli_num_rows($results);

						if ($queryResults > 0) {
							$lastAlbum = null;
							while ($row = mysqli_fetch_assoc($results)) {
								if ($row['albumName'] !== $lastAlbum){
                                    $lastAlbum = $row['albumName'];
									echo "<div class='album'>".$row['albumName'].'<input id ="seeMe" type="submit"  name="submit">'.'</div>';
								}
								echo "<div class = 'tracks'>".$row['tracksName'].'</div>'.'<br>';
								
							}
						}
					?>

				</div>
				
			</div>



			</div>
		</body>
</html>