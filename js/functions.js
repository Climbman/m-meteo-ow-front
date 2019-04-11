function resizeIframe(action) {
    var current_height = document.getElementById("graph_iframe").clientHeight; 
    var current_width = document.getElementById("graph_iframe").clientWidth;
    
    
    if (action == "zoom") {
		var new_height = current_height + 100;
		var new_width = current_width + 200;
	}
	
	else {
		var new_height = current_height - 100;
		var new_width = current_width - 200;
	}
	
	if (new_width < 600 || new_width > 1600)  {
		return 0;
	}
		
    
    document.getElementById("graph_iframe").style.height = new_height + "px";
    document.getElementById("graph_iframe").style.width = new_width + "px";
}
    
