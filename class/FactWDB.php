<?php
/**
 * Class for retrieving data from DB.
 * 
 * @author laurynas
 *
 */
class FactWDB
{
    /**
     * 
     * @var mysqli
     */
    protected $db = null;
    
    /**
     * 
     * @var array
     */
    public $stations = [];

    
    function __construct(mysqli $conn) {
        $this->db = $conn;
        $this->db->set_charset('utf8');
    }
    
    
    /**
     * Returns array of station numbers as keys and names as values.
     * 
     * 
     * @throws Exception
     * @return array
     */
    public function getStations(): ?array {
        
        if (!$this->db) {
            return null;
        }
        
        $stations = [];
        
        $result = $this->db->query('
            SELECT DISTINCT
                station_id,
                stn_name
            FROM m_fact_weather;
        ');
        
        if ($result->num_rows < 1) {
            throw new Exception('No result set');
        }
        
        while($row = $result->fetch_assoc()) {
            $stations[(int)$row['station_id']] = $row['stn_name'];
        }
        
        return $stations;
    }
    
    
    /**
     * 
     * @param int $station_id
     * @param string $start_date
     * @param string $end_date
     * 
     * @return array
     */
    public function getWeatherData(int $station_id, string $start_date, string $end_date): ?array {
        
        if (!$this->db) {
            return null;
        }
        
        $result_arr = [];
        
        $sql = $this->db->prepare('
            SELECT
                date_time as ' . Config::$sql_data_key . ',
                cond_code,
                cond_txt,
                temp,
                press,
                wind_dir,
                wind_gust
            FROM m_fact_weather
            WHERE
                station_id = ?
                AND date_time BETWEEN ? AND ?
                AND bad = 0;
        ');
        
        $sql->bind_param('iss', $station_id, $start_date, $end_date);
        $sql->execute();
        $res = $sql->get_result();
        
        while ($row = $res->fetch_assoc()) {
            $result_arr[] = $row;
        }
        
        return $result_arr;
    }
}