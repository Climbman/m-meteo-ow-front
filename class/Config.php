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
    
    public static function getMetParamNames(): array {
        return array_keys(self::$param_names);
    }
    
    public static function getGraphConfJson(string $param): ?string {
        if (!isset(self::$graph_settings[$param])) {
            return null;
        }
        return
        '{
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                    label: graph_label,
                    fill: false,
                    borderColor: "' . self::$graph_settings[$param]['line_color'] . '",
                    pointBackgroundColor: "' . self::$graph_settings[$param]['point_color'] . '",
                    pointBorderColor: "' . self::$graph_settings[$param]['point_color'] . '",
                    lineTension: 0,
                    borderWidth: 2,
                    pointRadius: 2,
                    showLine: ' . self::$graph_settings[$param]['show_line'] . ',
                    data: values
                }]
            },
            options: {}
        }';
    }
}
