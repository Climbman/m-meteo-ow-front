<?php
require_once 'includes/config.php';

session_start();

function input_validation($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    if (empty($_POST)) {
        exit('Empty POST');
    }

    if (!isset($_POST['user']) || !isset($_POST['pass'])) {
        exit('Incomplete login data');
    }

    $user = input_validation($_POST['user']);
    $pass = input_validation($_POST['pass']);

    if (isset($_USERS[$user])) {
        if ($_USERS[$user] == $pass) {
            $_SESSION['user'] = $user;
            echo '<html><head><script>window.location.href = "main.php";</script></head></html>';
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body style="background-color: DarkSalmon;">
<div style="margin: auto; width: 600px; height: 600px; border: 4px solid RebeccaPurple;">
<form action="" method="post">
    <div style="margin: auto;">
    <input type="text" name="user" placeholder="Vartotojas" required>
    </div>
    <div style="margin: auto;">
    <input type="password" name="pass" placeholder="Slaptažodis" required>
    </div>
    <div style="margin: auto;">
    <input type="submit" value="Patvirtinti">
    </div>
</form>
</div>
</body>
</html>

