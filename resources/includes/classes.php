<?php

class FactWDB {
    
    function __construct($stn_id, $param, $date1, $date2) {
        $this->stn = $stn_id;
        $this->param = $param;
        $this->start_date = $date1;
        $this->end_date = $date2;
        
        $this->dbserver = $GLOBALS['_dbserver'];
        $this->db = $GLOBALS['_db'];
        $this->user = $GLOBALS['_dbuser'];
        $this->pass = $GLOBALS['_dbpass'];
    }
    
    
    function getDB($switch) {
        
        $conn = new \mysqli($this->dbserver, $this->user, $this->pass, $this->db);
        
        $sql = '
        SELECT date_time, ' . $this->param . '
        FROM m_fact_weather
        WHERE station_id = '. $this->stn .'
        and (date_time between \'' . $this->start_date . '\' and \'' . $this->end_date . '\');';
        
        $result = $conn->query($sql);
        
        if (isset($switch) && $switch) { 
            $values = array();
            $labels = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $values[] = $row[$this->param];
                    $labels[] = $row['date_time'];
                }
            }
        }

        return array($labels, $values);
    }
}


class Options {
	
    function __construct() {
        
        $this->dbserver = $GLOBALS['_dbserver'];
        $this->db = $GLOBALS['_db'];
        $this->user = $GLOBALS['_dbuser'];
        $this->pass = $GLOBALS['_dbpass'];
    }
    
    function getStations() {
		
		$conn = new \mysqli($this->dbserver, $this->user, $this->pass, $this->db);
		
		$sql = '
		SELECT DISTINCT station_id, stn_name
		FROM m_fact_weather;';
		
		$result = $conn->query($sql);
		
		$stations = array();
		$names = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$stations[] = $row['station_id'];
				$names[] = $row['stn_name'];
			}
		}
		
		return array($stations, $names);
	}
}
		
?>
