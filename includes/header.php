    
	<?php 
	session_start();
	include ('includes/config.php');
	include ('includes/dbh.php');
	?>

    <nav id="topnav">
						<ul>
							<li>
								<a class="<?php echo ($currentPage == 'home.php' || $currentPage == '') ? 'active' : NULL ?>" href="home.php">Home</a>
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
								<a class="<?php echo ($currentPage == 'contact.php') ? 'active' : NULL ?>"  href="contact.php">Contact us</a>
							</li>
						</ul>    

					
					</nav>

    
   
