<?php
require_once 'includes/session.php';
require_once 'includes/config.php';
require_once 'includes/classes.php';



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

$param = $_GET['parameter'];
$param_name = $_params[$_GET['parameter']];



?>
<html charset="UTF-8">
<head>
<script type="text/javascript" src="resources/js/Chart.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
        
<?php
echo '<div class="graph_data">';
echo '<div id="values">' . $values . '</div>';
echo '<div id="labels">' . $labels . '</div>';
echo '<div id="graph_name">' . $param_name . '</div>';
echo '<div id="message">' . $msg . '</div>';
echo '<div id="line_color">' . $_graph_settings[$param]['line_color'] . '</div>';
echo '<div id="point_color">' . $_graph_settings[$param]['point_color'] . '</div>';
echo '<div id="show_line">' . $_graph_settings[$param]['show_line'] . '</div>';
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

var graph_label = document.getElementById("graph_name").innerHTML;
var line_color = document.getElementById("line_color").innerHTML;
var point_color = document.getElementById("point_color").innerHTML;
var line_display = document.getElementById("show_line").innerHTML == '0' ? false : true;
 
var ctx = document.getElementById('gra').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: graph_label,
            fill: false,
            borderColor: line_color,
            pointBackgroundColor: point_color,
            pointBorderColor: point_color,
            lineTension: 0,
            borderWidth: 2,
            pointRadius: 2,
            showLine: line_display,
            data: values
        }]
    },
    options: {}
});
</script>

</body>
    
</html>
