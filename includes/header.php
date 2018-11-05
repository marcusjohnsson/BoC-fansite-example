    
	<?php 
	session_start();
	include ('includes/config.php');
	include ('includes/dbh.php');
	?>

    <nav id="topnav">
						<ul>
							<li>
								<a class="<?php echo ($currentPage == 'index.php' || $currentPage == '') ? 'active' : NULL ?>" href="index.php">Home</a>
							</li>
							<li>
                            <a class="<?php echo ($currentPage == 'mygoods.php') ? 'active' : NULL ?>" href="mygoods.php">My music</a>
							</li>
							<li>
                                 <a class="<?php echo ($currentPage == 'about.php') ? 'active' : NULL ?>" href="about.php">About us</a>
							</li>
							<li>
                                <a class="<?php echo ($currentPage == 'browse.php') ? 'active' : NULL ?>" href="browse.php">Browse</a>
							</li>
							<li>
                                <a class="<?php echo ($currentPage == 'gallery.php') ? 'active' : NULL ?>" href="gallery.php">gallery</a>
							</li>
							<li>
								<a class="<?php echo ($currentPage == 'contact.php') ? 'active' : NULL ?>"  href="contact.php">Contact us</a>
							</li>
						</ul>    
					<?php 
					if (isset($_SESSION['u_uid'])){
					echo '<div id="holder"><h5>'.$_SESSION['u_uid'].' '.'</h5>';
					if(($_SESSION['u_admin'] == 1)){
						echo'<a href="admin.php" class="red">Admin</a>';
						
					};
					if(($_SESSION['u_admin'] == 2)){
						echo'<a href="moderator.php" class="red">Moderator</a>';
					};
					echo'<form action="includes/logout.php" method="POST">
					<button type ="submit" name ="logout">Log out</button></form></div> ' ;
						
					}else{
						echo '<div id="holderdiv">
						<form action="loginpage.php" method="POST">
					<button type ="submit" name = "login">Login</button></form>
					<form action="signup.php" method="POST">
					<button type ="submit" name ="signup">SignUp</button></form></div>';
					}
					
					?>
					</nav>

    
   
