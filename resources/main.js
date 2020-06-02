window.addEventListener('load', function () {

    let data_holder = document.getElementById('default_graph_config');

    let graph_values = data_holder.dataset['values'];
    let graph_labels = data_holder.dataset['labels'];
    let graph_label = data_holder.dataset['label'];
    let graph_line_color = data_holder.dataset['line_color'];
    let graph_point_color = data_holder.dataset['point_color'];
    let graph_line_display = data_holder.dataset['line_display'];

    let graph_config = getGraphConfig(
        graph_labels.split(','),
        graph_values.split(','),
        graph_label,
        graph_line_color,
        graph_point_color,
        graph_line_display
    );

    console.log(graph_config);

    //get canvas element and create graph
    let chart = generateGraph(graph_config, document.getElementById('graph_canvas'));
});