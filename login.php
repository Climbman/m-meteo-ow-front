<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body id="login_body">
<div id="login_form_holder">
<form id="login_form" action="control.php" method="post">
    <h1>Prisijungti</h1>
    <input type="hidden" name="login" value="">
    <input class="login_txt_field" type="text" name="user" placeholder="Vartotojas" required>
    <input class="login_txt_field" type="password" name="pass" placeholder="Slaptažodis" required>
    <button id="login_button" type="submit" value="Patvirtinti"></button>
</form>
</div>
</body>
</html>