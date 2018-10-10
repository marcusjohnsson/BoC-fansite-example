<!DOCTYPE html>
<html id="htmlhome">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>gallery page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />

	</head>

		<body id="gallery">
			<div id="contentContainer">
				<header>	
				
				<?php include('includes/header.php'); 
                  
				 ?>
                </header>
              
                    <?php


                         
                                if($_SESSION['u_admin'] == 1){
                                    echo '  <div id="divupload">
                        
                                            <form action="upload.php" method="post" enctype="multipart/form-data"><br>
                                                <input type="text" name="filename" placeholder="file name..."><br>
                                                <input type="text" name="filetitle" placeholder="image title..."><br>
                                                <input type="text" name="filedesc" placeholder="image description..."><br>
                                                <input type="file" name="file"><br>
                                                <button type="submit" name="submit">Upload</button>
                                            </form>
                                          </div>' ;
                                    
                                        echo '<div id="galleryContainer">';
                                    $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)){
                                        echo "SQL fail";
                                    }else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                       
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo ' 
                                                            <a href="#">
                                                            <div class= "image" style="background-image: url(imgs/uploads/'.$row["imgFullNameGallery"].');"></div>
                                                            <h3>'.$row["titleGallery"].'</h3>
                                                            <p>'.$row["descGallery"].'</p>
                                                            </a>';}
                                        }
                                       
                                        echo '</div>';
                                }elseif ($_SESSION['u_admin'] == 0){
                                
                                    echo '<div id="galleryContainer">';
                                    $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)){
                                        echo "SQL fail";
                                    }else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                       
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo ' 
                                                            <a href="#">
                                                            <div class= "image" style="background-image: url(imgs/uploads/'.$row["imgFullNameGallery"].');"></div>
                                                            <h3>'.$row["titleGallery"].'</h3>
                                                            <p>'.$row["descGallery"].'</p>
                                                            </a>';}
                                        }
                                       
                                        echo '</div>';
                                    }

                                   
                               
                            
                    ?>
				<div id="blackbox">
					
				</div>
			</div>
		</body>
</html>