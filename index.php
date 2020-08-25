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
    
    $controller = new Control(
        new FactWDB($db),
        new View()
    );
    
    $controller->generateResponse();
