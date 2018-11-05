<!DOCTYPE html>
<html id="htmladmin">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>admin page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />

	</head>

		<body id="admin">
			<div id="contentContainer">
				<header>	
					<?php
				 include('includes/header.php'); 
					if($_SESSION['u_admin'] == 0 || $_SESSION['u_admin'] == 2) {
						header("location: home.php?access=denied");
						}
					?>
				 </header>
					<?php
							
						
				 ?>

				

                   
                    
			</div>
		</body>
</html>