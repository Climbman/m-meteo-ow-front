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
        'login' => 'templates/login.php',
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
            "show_line" => 1,
            "name_lt" => 'Temperatūra'
        ],
        'press' => [
            "line_color" => 'blue',
            "point_color" => 'blue',
            "show_line" => 1,
            "name_lt" => 'Slėgis'
        ],
        'wind_dir' => [
            "line_color" => 'green',
            "point_color" => 'green',
            "show_line" => 0,
            "name_lt" => 'Vėjo kryptis'
        ],
        'wind_gust' => [
            "line_color" => 'cyan',
            "point_color" => 'cyan',
            "show_line" => 1,
            "name_lt" => 'Vėjo gūsiai'
        ]
    ];
    
    public static $defaults = [
        'parameter' => 'temp',
        'station' => 19
    ];
    
    public static $sql_data_key = 'f_date';
    
    public static function getMetParamNames(): array {
        return array_keys(self::$param_names);
    }
    
}
