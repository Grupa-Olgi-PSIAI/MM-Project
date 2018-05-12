<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="../public/dist/css/login_styles.min.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="login_page">
    <p class="logo">M&M</p>
    <p class="small">Mini-Management Manager</p>
    <form id="form_login" class="login-form" action="/login/login" method="post">
        <p><input type="email" id="email" name="email" placeholder="Email"/></p>
        <p><input type="password" id="password" name="password" placeholder="Hasło"/></p>
        <?php if (isset($error) && $error == true) echo '<p class="error"> Błędny login i/lub hasło! </p>' ?>
        <p><input id="login" type="submit" name="login-button" value="Zaloguj"></p>
    </form>
</div>
</body>
</html>
