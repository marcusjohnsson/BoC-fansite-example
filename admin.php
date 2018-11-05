

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
							
						$sql="SELECT * FROM users where admin = 0 OR admin =2";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if($resultCheck > 0) {
							echo'<table>
									<tr>
										<th>First name</th>
										<th>Last name</th>
										<th>email adress</th>
										<th>User Name</th>
										<th>Type of User</th>
									</tr>
								</table>';
							while($row = mysqli_fetch_assoc($result)){
								echo'
								<form class="tableform" action="includes/editusers.php" method="post">
									<input type="hidden" name="editusers" value="'.$row['user_id'].'">
									<button type="submit">edit</button></form>
									
									<form class="tableform" action="includes/deleteusers.php" method="post">
									<input type="hidden" name="deleteusers" value="'.$row['user_id'].'">
									<button type="submit">delete</button></form>
							<table>
								<tr>
										<td>'.$row['user_first'].'</td>
										<td>'.$row['user_last'].'</td>
										<td>'.$row['user_email'].'</td>
										<td>'.$row['user_uid'].'</td>
										<td>'.$row['admin'].'</td>
									</tr>
							</table>
							
							';
						}

					}
				 ?>

				

                   
                    
			</div>
		</body>
</html>