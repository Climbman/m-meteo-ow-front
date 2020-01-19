<?php
require_once 'resources/config.php';
require_once 'class/FactWDB.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
session_write_close();

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    exit('Bad request method.');    
}

if (isset($_GET['station'])) {
    $conn = new mysqli();
    $db = new FactWDB($conn)
}
?>