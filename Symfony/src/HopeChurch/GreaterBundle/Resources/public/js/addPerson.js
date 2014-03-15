
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

$('#person_roles').select2();

var firstRun = true;

// update mentor list based on current dstage
$('#person_discipleshipStage').change( function() {

    var pm = d3.select('#person_mentor');
    pm.attr("disabled", "disabled");

    if(firstRun){
	pm.selectAll('option').remove();
	firstRun = false;
    }

    pm.insert('option', ':first-child')
	.attr("value", null)
	.attr("selected", "selected")
	.text("Loading...");

    d3.json(mentorsByDStageUrl + "/" + $(this).val(), function(error, json) {
	if(error) return console.warn(error);

	pm.select('option').remove();
	pm.attr("disabled", null);

	json.unshift({id: 0, nameFirst: "-- Select", nameLast: "Mentor --"});

	var options = pm.selectAll('option')
	    .data(json, function(d) {return d.id})
	    .attr("value", function(d) { return d.id })
	    .attr("selected", function(d,i) { return (i==0) ? "selected" : null})
	    .text(function(d) {return d.nameFirst + " " + d.nameLast});

	options.enter()
	    .append('option')
	    .attr("value", function(d) {return d.id})
	    .text(function(d) {return d.nameFirst + " " + d.nameLast});

	options.exit().remove();


    });
});
