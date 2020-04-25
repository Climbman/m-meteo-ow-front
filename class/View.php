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
        require_once Config::$page_links['login'];
    }
    
    
    /**
     * Method for rendering default template.
     * 
     * Performs basic checks to provide default template with non-empty values.
     * 
     * @param array $parameter_names
     * @param string $default_parameter
     * @param array $stations
     * @param array $graph_data
     * @param string $template_location
     * @return bool
     */
    public function renderMainView(array $parameter_names, string $default_parameter, array $stations, array $graph_data, string $template_location): bool {
        
        $this->parameter_names = $parameter_names;
        $this->stations = $stations;
        $this->graph_data = $graph_data;
        $this->template_location = $template_location;
        
        foreach ($this->default_data_keys as $key) {
            if (!isset($this->graph_data[$key])) {
                return false;
            }
        }
            
        if (empty($this->parameter_names)
            || empty($this->stations)
            || empty($this->template_location)
        ) {
            return false;
        }
        
        
        //Parameters for template
        $default_parameter = $this->default_parameter;
        $default_data = $this->graph_data;
        
        $parameter_options = '';
        foreach ($this->parameter_names as $key => $name) {
            $parameter_options .= '<option value=' . $key . '>' . $name . '</option>';
        }
        
        $station_options = '';
        foreach ($this->stations as $key => $name) {
            $station_options.= '<option value=' . $key . '>' . $name . '</option>';
        }
        
        require_once $this->template_location;
        
        return true;
    }
    
    public function printDataJson($graph_data): void {
        echo json_encode($graph_data);
    }
}