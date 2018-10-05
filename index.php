
<?php

include ('includes/dbh.php');
?>

<html id="htmlLogin">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>log in</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
    <body id="loginbody">
        <div id="login">
            <form action="includes/logingin.php" method="post">
                <input type="text" name="userid" placeholder="username/e-mail"><br>
                <input type="password" name="pwd" placeholder="password"><br>
                <button type="submit" name="submit">Log in</button>
            </form>
                <p>Not a member yet? <a href="signup.php">Sign up</a></p>
                

        </div>
    </body>
</html>