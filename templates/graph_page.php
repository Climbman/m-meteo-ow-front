<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    exit;
}
//default to prevent ide complaints
$default_data['default'] = null;
$default_data_keys = ['labels', 'values', 'graph_label', 'line_color', 'point_color', 'line_display'];

foreach ($default_data_keys as $key) {
    if (!isset($default_data[$key])) {
        exit('Some data not set');
    }
}

?>
<!DOCTYPE HTML>
<html>
    <head>
    <script type="text/javascript" src="resources/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="resources/functions.js"></script>
    <script type="text/javascript" src="resources/main.js"></script>
    </head>
    <body>
        <div class="header"></div>
        <div class="graph-block">
            <div id="default_graph_data" style="display:none;" data-points="<?= $default_data['values'] ?>" data-labels="<?= $default_data['labels'] ?>"></div>
            <div id="default_graph_config" style="display:none;" data-label="<?= $default_data['graph_label'] ?>"></div>
            <div id="graph_holder">
                <canvas id="gra">
                    <p>A canvas</p>
                </canvas>
            </div>
        </div>
        <div class="footer"></div>
    </body>
</html>