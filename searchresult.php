        
<!DOCTYPE html>
<html id="SearchResultHtml">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>searchresult page</title>
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
                    <div class="albumcontainerSearch">
                    <?php
                    //if we clicked the submit button
                    if(isset($_POST['submit'])) {

                        //to make sure the data user types is safe and that they try to do any injections into our database
                        $search = mysqli_real_escape_string($conn, $_POST['ArtistsName']);
                        $sql = "SELECT * FROM albums JOIN tracks ON albums.albumId = tracks.albumId WHERE albumName  LIKE '%$search%' OR albumDueDate LIKE '%$search%' OR tracksName LIKE '%$search%'";
                        $result= mysqli_query($conn, $sql);
                        $queryResult = mysqli_num_rows($result);

                        if( $queryResult > 0){
                            $lastAlbum = null;
                             $queryResult = mysqli_num_rows($result);
                                if ($row['albumName'] !== $lastAlbum){
                                    $lastAlbum = $row['albumName'];
									echo '<br>'."<div class='album'>".$row['albumName'].' '.$row['albumDueDate'].'</div>';
								}
								echo "<div class = 'tracks'>".$row['tracksName'].' '.$row['tracksDuration'].'<button type="button">+</button>'.'</div>'.'<br>';
                            }
                        }else {
                            echo "There are no results matching your search!";
                        }

                    }
                    
                    ?>
                    	
                    </div>
                </div>



            </div>
		</body>
</html>

