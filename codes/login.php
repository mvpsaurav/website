<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="index.css" media="all" rel="Stylesheet" type="text/css" />
</head>
<body>
  <div class="stripe-vertical"></div>
  <div class="stripe-horizontal"></div>
    <main>
    <img id="logo" alt="logo" src="circle-cropped.png">
    <h1>Log In</h1>
        <form action = "login.inc.php" method = "post">
            <input class="user-input" type="username" name="user-name" placeholder="username">
            <input class="user-input" type="password" name="user-password" placeholder="password">
            <button type="submit" name = "submit">Log in</button>
        </form>
    </main>
</body>
</html>
