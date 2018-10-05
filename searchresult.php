        
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
                <?php include('includes/header.php');?>
                
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
                        $results = mysqli_query($conn,$sql);
                        $queryResults = mysqli_num_rows($results);
                    

                        if ($queryResults > 0) {
                            $lastAlbum = null;
                            while ($row = mysqli_fetch_assoc($results)) {
                                    
                                if ($row['albumName'] !== $lastAlbum){
                                    $lastAlbum = $row['albumName'];
                                    echo '<br>'."<div class='album'>".$row['albumName'].' '.$row['albumDueDate'].'</div>';
                                }
                                $tracksId = $row['tracksId'];
                                $tracksName = $row['tracksName'];
                                $reserved = $row['reserved'];
                                
                                if ($reserved == 1){
                                    echo "<div class='tracks'>".$row['tracksName']." ".$row['tracksDuration']."<p>already added</p></div><br>";		

                                }else if ($reserved == 0){
                                    echo "<div class='tracks'>".$row['tracksName']." ".$row['tracksDuration'].$row['tracks.reserved']."<form action='add.php' method='post'>
                                    <input type='hidden' name='tracks' value=' $tracksId'>
                                    <button type='submit'>+</button></div></form><br>";		

                                }                            };
                        }else {
                            echo "There is no results matching your search!";
                        }


                    }
                    
                    ?>
                    	
                    </div>
                </div>



            </div>
		</body>
</html>

