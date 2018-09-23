
<!DOCTYPE html>
<html id="htmlGoods">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>My goods</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
		<body id="myGoods">
			<div id="contentContainer">
			<header>	
				
				<?php include('header.php'); ?>
			</header>

				<div id= "listofsongs">
					<?php
					// selecting all the data in fav table
					$sqlSelect = "SELECT * FROM Favorite JOIN tracks ON tracks.tracksName = Favorite.tracksName";
					$results= mysqli_query($conn, $sql);
					//display all the records
					$queryResult = mysqli_num_rows($result);


					if ($queryResults > 0){
						while ($row = mysqli_fetch_assoc($results)) {
						echo "	<ul>
									<li>
									".$row['tracksName']."
									</li>
								</ul>";
						}
					}else {
					echo "There is no tracks to show! Go to the browse page to find your favorite tracks!";
					}
					
					?>
				</div>

			</div>
		</body>
</html>