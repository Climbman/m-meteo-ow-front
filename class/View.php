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
     * 
     * @param string $parameter
     * @param array $stations
     * @param array $graph_data
     */
    public function __construct(array $parameter_names, string $default_parameter, array $stations, array $graph_data, string $template_location) {
        $this->parameter_names = $parameter_names;
        $this->stations = $stations;
        $this->graph_data = $graph_data;
        $this->template_location = $template_location;
    }
    
    /**
     * Method for rendering default template.
     * 
     * Performs basic checks to provide default template with non-empty values.
     * 
     * @return bool
     */
    public function renderMainView(): bool {
        
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
        $parameter_names = $this->parameter_names;
        $default_parameter = $this->default_parameter;
        $default_stations = $this->stations;
        $default_data = $this->graph_data;
        $this->template_location;
        
        require_once $this->template_location;
        
        return true;
        
            
    }
}