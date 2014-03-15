$('#btn-all-info').click(function(){

    // change the text
    if($('#all-info').hasClass('in')) {
	$('#btn-all-info-text').text("More");
    } else {
	$('#btn-all-info-text').text("Less");
    }

    // change the icon
    $('#btn-all-info-icon').toggleClass("glyphicon-plus glyphicon-minus");
});

$('#btn-reset').click(function(){

    $("#form-person").trigger('reset');

});

$('#person_roles').chosen();
