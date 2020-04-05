<?php
/**
 * Main controller.
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
$db->set_charset('utf8');

$data = new FactWDB($db);

$stations = $data->getStations();

$start_date = date('Y-m-d');
$end_date = date('Y-m-d', (time() + 86400));

$graph_data = $data->getWeatherData(Config::$defaults['station'], $start_date, $end_date);

var_dump($stations);
var_dump($graph_data);

exit();
?>