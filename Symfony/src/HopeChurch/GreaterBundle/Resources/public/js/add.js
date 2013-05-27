$('#btn-all-info').click(function(){

    // change the text
    if($('#all-info').hasClass('in')) {
	$('#btn-all-info-text').text("More");
    } else {
	$('#btn-all-info-text').text("Less");
    }

    // change the icon
    $('#btn-all-info-icon').toggleClass("icon-plus icon-minus");
});

// AJAX STUFF

$.ajaxSetup ({  
    cache: false // tell jquery not to cache the ajax data  
});  


