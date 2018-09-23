
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

				<div class= "albumcontainer">
					<?php
					// selecting all the data in fav table
					$sqlSelect = "SELECT tracksId, tracksName FROM Favorite Order by tracksId";
					$results= mysqli_query($conn, $sqlSelect);

					//display all the records
					$queryResults = mysqli_num_rows($results);
					if ($queryResults > 0){
						while ($row = mysqli_fetch_assoc($results)) {
							$tracksId = $row['tracksId'];
						echo  "<div class='tracks'>".$row['tracksId']." ".$row['tracksName']."<form action='remove.php' method='post'><input type='hidden' name='tracks' value=' $tracksId'><button type='submit'>-</button></div></form><br>";
						}
					}else {
					echo "There is no tracks to show! Go to the browse page to find your favorite tracks!";
					}
					
					?>
				</div>

			</div>
		</body>
</html>