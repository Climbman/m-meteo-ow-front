<?php
Class Config {

    public static $dbconf = [
        'srv' => '127.0.0.1',
        'db' => 'meteo',
        'port' => '29902',
        'usr' => 'webuser',
        'pass' => 'durele5'
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
            "show_line" => '1'
        ],
        'press' => [
            "line_color" => 'blue',
            "point_color" => 'blue',
            "show_line" => '1'
        ],
        'wind_dir' => [
            "line_color" => 'green',
            "point_color" => 'green',
            "show_line" => '0'
        ],
        'wind_gust' => [
            "line_color" => 'cyan',
            "point_color" => 'cyan',
            "show_line" => '1'
        ]
    ];
}
