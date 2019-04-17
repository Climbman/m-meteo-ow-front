<?php

$_dbserver = 'localhost';
$_db = 'meteo';
$_dbuser = 'webuser';
$_dbpass = '';

$_USERS = array('admin' => '');

$_params = array('temp' => 'Temperatūra', 'press' => 'Slėgis', 'wind_dir' => 'Vėjo kryptis', 'wind_gust' => 'Vėjo gūsiai');

$_graph_settings = array(
    'temp' => array(
        "line_color" => 'red',
        "point_color" => 'red',
        "show_line" => '1'
        ),
    'press' => array(
        "line_color" => 'blue',
        "point_color" => 'blue',
        "show_line" => '1'
        ),
    'wind_dir' => array(
        "line_color" => 'green',
        "point_color" => 'green',
        "show_line" => '0'
        ),
    'wind_gust' => array(
        "line_color" => 'cyan',
        "point_color" => 'cyan',
        "show_line" => '1'
        )
);
    

?>
