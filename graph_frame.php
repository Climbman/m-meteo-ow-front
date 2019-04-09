<?php

require_once 'resources/includes/config.php';
require_once 'resources/includes/classes.php';



$db = new FactWDB($_GET['station'], $_GET['parameter'], $_GET['start'], $_GET['end']);

$data = $db->getDB(true);


$labels = implode(',', $data[0]);
$values = implode(',', $data[1]);

?>

<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
        
<?php
echo '<div style="display:none;" id="values">' . $values . '</div>';
echo '<div style="display:none;" id="labels">' . $labels . '</div>';
?>

<div>
<canvas id="gra">
<p>A canvas</p>
</canvas>
</div>

<script>
 var labels;
 var values;
 
 labels = document.getElementById("labels").innerHTML;
 labels = labels.split(",");
 
 values = document.getElementById("values").innerHTML;
 values = values.split(",");
 
 
var ctx = document.getElementById('gra').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 255, 255)',
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
