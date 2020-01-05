<?php
class FactWDB
{
    
    
    protected $db;
    
    
    public $stations = [];
    public $station_names = [];

    function __construct(mysqli $conn) {
        
        $opt_qry = "
            SELECT DISTINCT
                station_id,
                stn_name
            FROM m_fact_weather;
        ";
        
        $this->db = $conn;
        
        $result = $this->db->query($opt_qry);
        
        if ($result->num_rows < 1) {
            throw new Exception('No result set');
        }
        
        while($row = $result->fetch_assoc()) {
            $this->stations[] = $row['station_id'];
            $this->station_names[] = $row['stn_name'];
        }
        
    }
    
    function getWeatherData(int $station_id, string $parameter, string $start_date, string $end_date) {
        
        $data_qry = "
            SELECT
                date_time,
                " . $parameter . "
            FROM m_fact_weather
            WHERE
                station_id = " . $station_id . "
                AND (date_time between '" . $start_date . "' and '" . $end_date . "'
            ;";
        
        //mysql prepare
        
    }
    
    
}