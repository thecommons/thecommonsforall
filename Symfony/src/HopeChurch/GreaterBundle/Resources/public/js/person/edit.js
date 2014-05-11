$('#hopechurch_greaterbundle_person_roles').select2();

var firstRun = true;

// update mentor list based on current dstage
$('#hopechurch_greaterbundle_person_discipleshipStage').change( function() {

    var pm = d3.select('#hopechurch_greaterbundle_person_mentor');
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