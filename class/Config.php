<?php
Class Config
{

    public static $dbconf = [
        'srv' => 'localhost',
        'db' => 'meteo',
        'port' => '3306',
        'usr' => 'webusr',
        'pass' => 'durele5'
    ];
    
    public static $page_links = [
        'login' => 'login.php',
        'graph' => 'templates/graph_page.php'
    ];
    
    public static $app_users = [
        'admin' => 'pass'
    ];
    
    public static $param_names = [
        'temp' => 'Temperatūra',
        'press' => 'Slėgis',
        'wind_dir' => 'Vėjo kryptis',
        'wind_gust' => 'Vėjo gūsiai'
    ];
    
    public static $graph_settings = [
        'temp' => [
            "line_color" => 'red',
            "point_color" => 'red',
            "show_line" => true
        ],
        'press' => [
            "line_color" => 'blue',
            "point_color" => 'blue',
            "show_line" => true
        ],
        'wind_dir' => [
            "line_color" => 'green',
            "point_color" => 'green',
            "show_line" => false
        ],
        'wind_gust' => [
            "line_color" => 'cyan',
            "point_color" => 'cyan',
            "show_line" => true
        ]
    ];
    
    public static $defaults = [
        'parameter' => 'temp',
        'station' => 19
    ];
    
    public static function getMetParamNames(): array {
        return array_keys(self::$param_names);
    }
    
}
