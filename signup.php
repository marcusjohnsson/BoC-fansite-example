<?php

session_start();
include ('includes/dbh.php');
?>

<html id="htmlLogin">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>sign up</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
    <body id="loginbody">
        <div id="login">
            <form action="includes/signingup.php" method="POST"> 
                <input type="text" name="first" placeholder="Firstname"><br>
                <input type="text" name="last" placeholder="Lastname"><br>
                <input type="text" name="email" placeholder="E-mail"><br>
                <input type="text" name="uid" placeholder="Username"><br> 
                <input type="text" name="pwd" placeholder="Password"><br>
                <button type="submit" name="submit">Sign up</button>
            </form>
                <p>already a member? Then <a href="index.php">Log in</a></p>
                

        </div>
    </body>
</html>