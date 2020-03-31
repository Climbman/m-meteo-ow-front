<?php
/*
 * 
 */

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});
session_start();

// login
if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['login'], $_POST['user'], $_POST['pass'])
    && isset(Config::$app_users[$_POST['user']])
    && Config::$app_users[$_POST['user']] === $_POST['pass']
) {
    $_SESSION['user'] = $_POST['user'];
}

if (!isset($_SESSION['user'])) {
    require_once Config::$page_links['login'];
    exit();
}

//render default

$db = new mysqli(
    Config::$dbconf['srv'],
    Config::$dbconf['usr'],
    Config::$dbconf['pass'],
    Config::$dbconf['db'],
    Config::$dbconf['port']
);

$data = new FactWDB($db);

$stations = $data->getStations();



exit();
?>