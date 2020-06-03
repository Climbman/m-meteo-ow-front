<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    exit;
}
//default to prevent ide complaints
$default_data['default'] = null;

?>
<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <script type="text/javascript" src="resources/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="resources/functions.js"></script>
    <script type="text/javascript" src="resources/main.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <div class="content-container">
            <div class="header">
                <form class="graph-form">

                </form>
            </div>
            <div class="graph-block">
                <div id="default_graph_config" class="graph-settings" data-values="<?= $default_data['values'] ?>" data-labels="<?= $default_data['labels'] ?>" data-label="<?= $default_data['graph_label'] ?>" data-line_color="<?= $default_data['line_color'] ?>" data-point_color="<?= $default_data['point_color'] ?>" data-line_display="<?= $default_data['line_display'] ?>"></div>
                <div id="graph_holder" class="graph-holder">
                    <canvas id="graph_canvas">
                        <p>A canvas</p>
                    </canvas>
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </body>
</html>