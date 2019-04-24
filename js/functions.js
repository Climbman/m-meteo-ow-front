function resizeIframe(action) {
    
    var win_height = document.documentElement.clientHeight;
    var win_width = document.documentElement.clientWidth - 160;
    
    var current_height = document.getElementById("graph_iframe").clientHeight; 
    var current_width = document.getElementById("graph_iframe").clientWidth;
    
    var wh_ratio = current_height / current_width;
    
    if (action == "zoom") {
        var new_height = current_height + (200 * wh_ratio);
        var new_width = current_width + 200;
    } else {
        var new_height = current_height - (200 * wh_ratio);
        var new_width = current_width - 200;
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
