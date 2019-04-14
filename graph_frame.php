<?php

require_once 'resources/includes/config.php';
require_once 'resources/includes/classes.php';



$db = new FactWDB($_GET['station'], $_GET['parameter'], $_GET['start'], $_GET['end']);

$data = $db->getDB(true);


$labels = implode(',', $data[0]);
$values = implode(',', $data[1]);


if (count($data[0]) == count($data[0])) {
	$msg = 'Taškų ir etikečių skaičius sutampa: ';
	$msg .= '(' . count($data[1]) . '=' . count($data[0]) . ')';
}
else {
	$msg = 'Taškų ir etikečių skaičius nesutampa';
}
$msg .= '<br />'; 



?>
<html charset="UTF-8">
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
        
<?php
echo '<div class="graph_data">';
echo '<div id="values">' . $values . '</div>';
echo '<div id="labels">' . $labels . '</div>';
echo '<div id="graph_name">' . $_params[$_GET['parameter']] . '</div>';
echo '<div id="message">' . $msg . '</div>';
echo '</div>';
?>

<div id="graph_holder">
<canvas id="gra">
<p>A canvas</p>
</canvas>
</div>

<script>

var msg = document.getElementById("message").innerHTML;
parent.document.getElementById("msg_txt").innerHTML = msg;


var labels;
var values;

labels = document.getElementById("labels").innerHTML;
labels = labels.split(",");

values = document.getElementById("values").innerHTML;
values = values.split(",");

 
var ctx = document.getElementById('gra').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: document.getElementById("graph_name").innerHTML,
            fill: false,
            borderColor: 'rgb(255, 0, 255)',
            data: values
        }]
    },
    options: {}
});
</script>

</body>
	
</html>
