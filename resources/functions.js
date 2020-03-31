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
 * @returns chart {object}
 */
function generateGraph(graph_config, canvas) {
    let ctx = canvas.getContext('2d');
    let chart = new Chart(ctx, graph_config);
    return chart;
}
