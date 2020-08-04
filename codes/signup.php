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
    <section class = "section-default">
    <h1>Sign Up</h1>
        <form action = "signup.inc.php" method = "post">
            <input class="user-input" type="username" name="user-name-signup" placeholder="username">
            <input class="user-input" type="email" name="user-email-signup" placeholder="e-mail">
            <input class="user-input" type="password" name="user-password-signup" placeholder="password">
            <button type="submit" name = "submit">Sign Up</button>
        </form>
    </section>
    </main>
</body>
</html>
