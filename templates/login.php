<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/main.css">
<script type="text/javascript">
    document.addEventListener('load', () => {
        document.body.addEventListener('keyup', event => {
            console.log(event.keyCode);
            if (event.keyCode === 13) {
                document.getElementById('login_form').submit();
            }
        });
    });
</script>
</head>
<body class="login-body" id="login_body">
<div class="login-form-holder transition03" id="login_form_holder">
<form class="login-form" id="login_form" action="index.php" method="post">
    <div class="heading1">Prisijungti</div>
    <input type="hidden" name="login" value="" readonly>
    <input class="login-txt-field transition03" type="text" name="user" placeholder="Vartotojas" required>
    <input class="login-txt-field transition03" type="password" name="pass" placeholder="Slaptažodis" required>
    <div class="login-button transition03" id="login_button" onclick="document.getElementById('login_form').submit();">Įeiti...</div>
    
</form>
</div>
</body>
</html>