

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
                    include include('includes/header.php'); 
                  if($_SESSION['u_admin'] == 0) {
                       header("location: home.php?access=denied");
                    }
				 ?>
				</header>
                   
                    <div id="blackbox">
                        <h1>Welcome to the admin page</h1>
                        <h2>For now you can only upload photos to the gallery!Go try it!</h2>
                    </div>
			</div>
		</body>
</html>