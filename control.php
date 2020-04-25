<?php
/**
 * Main controller.
 * 
 */

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});
session_start();

$db = new mysqli(
    Config::$dbconf['srv'],
    Config::$dbconf['usr'],
    Config::$dbconf['pass'],
    Config::$dbconf['db'],
    Config::$dbconf['port']
);

$data = new FactWDB($db);
$view = new View();

$control = new Control($data, $view);

$control->checkLogin();

$control->generateResponse();
?>