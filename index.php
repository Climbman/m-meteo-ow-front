<?php

require_once 'includes/config.php';
require_once 'includes/classes.php';

$options = new Options;

$stn_data = $options->getStations();
$stations = $stn_data[0];
$names = $stn_data[1];
$stn_len = count($stations);

$start = date('Y-m-d');
$end = date('Y-m-d', (time() + 86400));

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/main.css">
<script type="text/javascript" src="js/functions.js"></script>
</head>
<body id="index_body">

<div id="main_holder">

	<div id="sidebar">
			
		<form id="param_select" action="graph_frame.php" method="get" target="graph_frame">
			
		<div>Stotis:</div>
		<select name="station">
		<?php for ($i = 0; $i < $stn_len; $i++) {echo '<option value="' . $stations[$i] . '"' . $default = ($stations[$i] == 19 ? ' selected ' : '') . '>' . $names[$i] . '</option>';}
		?>
		</select>

		<div>Elementas:</div>
		<select name="parameter">
		<?php foreach ($_params as $par => $name) {echo '<option value="' . $par . '">' . $name . '</option>';} ?>
		</select>

		<div>Pradžios data</div>
		<input type="date" name="start" value="<?php echo $start; ?>" required>

		<div>Pabaigos data</div>
		<input type="date" name="end" value="<?php echo $end; ?>" required>
		<div class="v_separator"></div>
		<input type="submit" value="Patvirtinti">
		</form>
		<div class="v_separator"></div>
		<div>
		<button onClick="resizeIframe('zoom');">Padidinti</button>
		<button onClick="resizeIframe('shrink');">Sumažinti</button>
		</div>
		
		<div class="v_separator"></div>
		
		<div>Pranešimai:</div>
		<div id="msg_box">
		<span id="msg_txt"></span>
		</div>

	</div>
	
	<iframe id="graph_iframe" name="graph_frame" scrolling="no" src="graph_frame.php?station=19&parameter=temp&start=<?php echo $start; ?>&end=<?php echo $end; ?>"></iframe>

</div>

<script>setIframeSize();</script>

</body>
</html>
