<html>
	<head>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	</head>
	<body>


<?php

$server = 'localhost';
$db = 'meteo';
$user = 'webuser';
$pass = '';

//conf

$station_id = '19';
$date_from = '2018-12-01';
$date_to = '2019-05-01';

$elems = '*';



$conn = new \mysqli($server, $user, $pass, $db);

echo '<p>';
if ($conn->connect_error) {
	echo 'Error';
}

echo 'Yes<br />';

$sql = '
	SELECT ' . $elems . '
	FROM m_fact_weather
	WHERE station_id = '. $station_id .'
	and (date_time between \'' . $date_from . '\' and \'' . $date_to . '\');';
	
$result = $conn->query($sql);

$values = array();
$labels = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$values[] = $row['temp'];
		$labels[] = $row['date_time'];
        
    }
}

$values = implode(',', $values);
$labels = implode(',', $labels);

echo '</p>';

echo '<div style="display:none;" id="values">' . $values . '</div>';
echo '<div style="display:none;" id="labels">' . $labels . '</div>';


?>

<div style="height:95vw;width:95vw;">
<canvas id="gra">
<p>A canvas</p>
</canvas>
</div>

<script>
 var labels;
 var values;
 
 labels = document.getElementById("labels").innerHTML;
 labels = labels.split(",");
 console.log(labels);
 
 values = document.getElementById("values").innerHTML;
 values = values.split(",");
 console.log(values);
 
 
var ctx = document.getElementById('gra').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            //backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: values
        }]
    },

    // Configuration options go here
    options: {}
});
</script>

	</body>
	
</html>
