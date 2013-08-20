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

$('#btn-reset').click(function(){

    $("#form-person").trigger('reset');

});

// some hackiness to enforce our roles
// MUST MAKE THIS BETTER
$('#person_roles input[type="checkbox"]').each(function() {

    $(this).change(function() {

	// what is this?
	var id = $(this).attr('id');

	if($(this).is(':checked')) {

	    // actual roles
	    if(id == "person_roles_1" ||
	       id == "person_roles_2" ||
	       id == "person_roles_3") {
		// these roles only make sense for adults to have
		// check "Adult" (person_roles_4)
		$('#person_roles_4').prop('checked', true);
		$('#person_roles_4').change();
	    } else if(id == "person_roles_4") { // adult
		// make sure the other two are unchecked
		$('#person_roles_5').prop('checked', false);
		$('#person_roles_6').prop('checked', false);
	    } else if(id == "person_roles_5") { //child
		$('#person_roles_1').prop('checked', false);
		$('#person_roles_2').prop('checked', false);
		$('#person_roles_3').prop('checked', false);
		$('#person_roles_4').prop('checked', false);
		$('#person_roles_6').prop('checked', false);
	    } else if(id == "person_roles_6") { //infant
		$('#person_roles_1').prop('checked', false);
		$('#person_roles_2').prop('checked', false);
		$('#person_roles_3').prop('checked', false);
		$('#person_roles_4').prop('checked', false);
		$('#person_roles_5').prop('checked', false);
	    } else {
		console.warn("Unknown Role " + id);
	    }

	} else {
	    if(id == "person_roles_4") {
		// uncheck the first three
		$('#person_roles_1').prop('checked', false);
		$('#person_roles_2').prop('checked', false);
		$('#person_roles_3').prop('checked', false);
	    }

	    if(!$('#person_roles_4').is(':checked') &&
	       !$('#person_roles_5').is(':checked') &&
	       !$('#person_roles_6').is(':checked')) {
		alert("One of 'Adult', 'Child', or 'Infant' must be selected");
	    }
	}


	// if we have checked "Leader", "Staff", or "Member",
	// then check "Adult", and uncheck "Child" and "Infant"
	// if "Adult" is checked, uncheck "Child" and "Infant"
	// if "Child" or "Infant" is checked, uncheck all others

    });

});
