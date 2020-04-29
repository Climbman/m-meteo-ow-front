<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" type="text/css" href="css/main.css?<?= time();?>">
<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', () => {
        document.body.addEventListener('keyup', event => {
            if (event.keyCode === 13) {
                document.getElementById('login_form').submit();
            }
        });
    });
</script>
</head>
<body class="login-body" id="login_body">
<div class="login-form-holder" id="login_form_holder">
<form class="login-form transition03" id="login_form" action="index.php" method="post">
    <div class="heading1"><code>m-f-w</code></div>
    <input type="hidden" name="login" value="" readonly>
    <input class="login-txt-field transition03" type="text" name="user" autofocus autocomplete="off" placeholder="User" required>
    <input class="login-txt-field transition03" type="password" name="pass" placeholder="Password" required>
    <div class="login-button transition03" id="login_button" onclick="document.getElementById('login_form').submit();">login</div>
    
</form>
</div>
</body>
</html>