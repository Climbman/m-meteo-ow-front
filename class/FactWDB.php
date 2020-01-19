<?php
class FactWDB
{
    
    protected $db;
    
    public $stations = [];

    function __construct(mysqli $conn): void {
        
        $opt_qry = '
            SELECT DISTINCT
                station_id,
                stn_name
            FROM m_fact_weather;
            ';
        
        $this->db = $conn;
        
        $result = $this->db->query($opt_qry);
        
        if ($result->num_rows < 1) {
            throw new Exception('No result set');
        }
        
        while($row = $result->fetch_assoc()) {
            $this->stations[(int)$row['station_id']] = row['stn_name'];
        }
        
    }
    
    function getWeatherData(int $station_id, string $start_date, string $end_date): array {
        
        $data_qry = '
            SELECT
                date_time,
                cond_code,
                cond_txt,
                temp,
                press,
                wind_dir,
                wind_gust,
            FROM m_fact_weather
            WHERE
                station_id = ?
                AND date_time BETWEEN ? AND ?
                AND bad = 0;
            ';
        
        $result = [];
        
        $sql = $this->conn->prepare($data_qry);
        $sql->bind_param('iss', $station_id, $end_date);
        $sql->execute();
        
        while ($row = $sql->fetch_assoc()) {
            $result[] = $row;
        }
        
        return $result;
        
    }
    
    
}