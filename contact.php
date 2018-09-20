
<!DOCTYPE html>
<html id="bgThree">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Home page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
		<body id="Contact">
			<div id="contentContainer">
			<header>	
				<?php include('header.php');?>
			</header>

				<div class="container" style= "height:500px">
					<form action="action_page.php">

						<label for="fname">First Name</label>
						<input type="text" id="fname" name="firstname" placeholder="Your name..">

						<label for="lname">Last Name</label>
						<input type="text" id="lname" name="lastname" placeholder="Your last name..">

						<label id="labelContact" for="country">Country</label>
						<select id="country" name="country">
  							<option value="australia">Australia</option>
  							<option value="canada">Canada</option>
  							<option value="usa">USA</option>
						</select>

						<label for="subject">Subject</label>
						<textarea id="subject" name="subject" placeholder="Write something.." style="height:66px"></textarea>
						<input   type="submit" name="contactSubmit" value="Submit" id="contactSubmit">

					</form>

				</div>

			</div>
		</body>
</html>