<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo '<html><head><script>window.location.href = "index.php";</script></head><body></body></html>';
}

session_write_close();
    
