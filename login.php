<?php
require_once 'resources/config.php';

session_start();

function input_validation($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    if (!isset($_POST['user']) || !isset($_POST['pass'])) {
        exit('Incomplete login data');
    }

    $user = input_validation($_POST['user']);
    $pass = input_validation($_POST['pass']);

    if (isset($_USERS[$user])) {
        if ($_USERS[$user] == $pass) {
            $_SESSION['user'] = $user;
            echo '<html><head><script>window.location.href="main.php";</script></head></html>';
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body id="login_body">
<div id="login_form_holder">
<form id="login_form" action="" method="post">
    <h1>Prisijungti</h1>
    <input class="login_txt_field" type="text" name="user" placeholder="Vartotojas" required>
    <input class="login_txt_field" type="password" name="pass" placeholder="Slaptažodis" required>
    <input id="login_button" type="submit" value="Patvirtinti">
</form>
</div>
</body>
</html>