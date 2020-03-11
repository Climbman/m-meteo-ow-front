function resizeIframe(action) {
    
    var win_height = document.documentElement.clientHeight;
    var win_width = document.documentElement.clientWidth - 160;
    
    var current_height = document.getElementById("graph_iframe").clientHeight; 
    var current_width = document.getElementById("graph_iframe").clientWidth;
    
    var wh_ratio = current_height / current_width;
    
    var new_height;
    var new_width;
    
    
    if (action == "zoom") {
        new_height = current_height + (200 * wh_ratio);
        new_width = current_width + 200;
    } else {
        new_height = current_height - (200 * wh_ratio);
        new_width = current_width - 200;
    }
    
    new_height = Math.floor(new_height);
    
    if (new_width < 500) {
        return 0;
    } else if (new_width > win_width) {
        new_width = win_width;
        new_height = win_height;
    }

    document.getElementById("graph_iframe").style.height = new_height + "px";
    document.getElementById("graph_iframe").style.width = new_width + "px";
}

function setIframeSize() {
    var win_height = document.documentElement.clientHeight;
    var win_width = document.documentElement.clientWidth;
    
    var frame_height = win_height;
    var frame_width = win_width - 160;
    
    document.getElementById("graph_iframe").style.height = frame_height + "px";
    document.getElementById("graph_iframe").style.width = frame_width + "px";
}

/**
 * Returns graph config objects
 * @param labels {array}
 * @param values {array}
 * @param graph_label {string}
 * @param line_color {string}
 * @param point_color {string}
 * @param line_display {boolean}
 * @returns graph_config {object}
 */
function getGraphConfig(labels, values, graph_label, line_color, point_color, line_display) {
    let graph_config = {
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
    }
    return graph_config;
}

/**
 * Generates graph on given canvas element
 * @param graph_config {object}
 * @param canvas {object}
 * @returns {void}
 */
function generateGraph(graph_config, canvas) {
    
}
