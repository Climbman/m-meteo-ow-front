<?php
Class View
{
    /**
     * Meteorological paramers name array
     * 
     * @var string[]
     */
    protected $parameter_names = null;
    
    /**
     * Meteoroligical station (location) names array
     * 
     * @var string[]
     */
    protected $stations = null;
    
    /**
     * Graph data array holding config and values
     * 
     * $graph_data array keys => values:
     *      labels          string[]    graph's x-axis labels - dates
     *      values          string[]    graph's y-axis values
     *      graph_label     string      graph label - name
     *      line_color      string
     *      point_color     string
     *      line_display    bool        switch for graph line+points/points display
     * 
     * @var array
     */
    protected $graph_data = null;
    
    
    /**
     * Location of template to render
     * 
     * @var string
     */
    protected $template_location = null;
    
    /**
     * default $graph_data array keys for checks
     * 
     * @var array
     */
    protected $graph_data_keys = ['labels', 'values', 'graph_label', 'line_color', 'point_color', 'line_display'];
    
    
    
    /**
     * Constructor.
     */
    public function __construct() {

    }
    
    /**
     * Renders login page.
     */
    public function renderLoginPage(): void {
        require_once(Config::$page_links['login']);
    }
    
    
    /**
     * Method for rendering default template.
     * 
     * Performs basic checks to provide default template with non-empty values.
     * 
     * @param array $graph_settings
     * @param string $default_parameter
     * @param array $stations
     * @param array $graph_data
     * @param string $template_location
     * @return bool
     */
    public function renderMainView(array $graph_settings, string $default_parameter, array $stations, array $graph_data, string $template_location): bool {
            
        if (empty($graph_settings)
            || empty($stations)
            || empty($template_location)
        ) {
            return false;
        }
        
        $labels = [];
        $values = [];
        foreach ($graph_data as $row) {
            $labels[] = $row[Config::$sql_data_key];
            $values[] = $row[$default_parameter];
        }
        
        $parameter_names = [];
        foreach($graph_settings as $param => $param_settings) {
            $parameter_names[$param] = $param_settings['name_lt'];
        }
        
        $parameter_options = '';
        foreach ($parameter_names as $key => $name) {
            $parameter_options .= '<option value=' . $key . '>' . $name . '</option>';
        }
        
        $station_options = '';
        foreach ($stations as $key => $name) {
            $station_options.= '<option value=' . $key . '>' . $name . '</option>';
        }
        
        //Parameters for template
        $default_data = [
            'labels' => implode(',', $labels),
            'values' => implode(',', $values),
            'line_color' => $graph_settings[$default_parameter]['line_color'],
            'point_color' => $graph_settings[$default_parameter]['point_color'],
            'line_display' => $graph_settings[$default_parameter]['show_line'],
            'graph_label' => $graph_settings[$default_parameter]['name_lt']
        ];
        
        require_once($template_location);
        
        return true;
    }
    
    public function printDataJson($graph_data): void {
        echo json_encode($graph_data);
    }
}