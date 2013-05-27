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

// populate the leader select box using d3
d3.json(leadersUrl, function(error, json) {
    if (error) return console.warn(error); 

    // TODO sort these leaders based on how many people have them set as their 
    // leader...

    // AK comments this out because doctrine seems to give us sorted results...
    // sort the leaders based on their full names
    //json.sort(function(a,b) {
    //	return a.nameFull.localeCompare(b.nameFull);
    //});

    // add a default leader which is none (maybe this should be jon?)
    json.unshift({'nameFull': "-- None --"});

    // remove the "Loading..." message
    d3.select("#select-leader")
	.selectAll("option")
	.remove();
    
    d3.select("#select-leader")
	.selectAll("option")
	.data(json)
    // update selection

    // enter selection
	.enter()
	.append("option")
	.attr("value", function(d) {return d.id})
	.text(function(d) {return d.nameFull});

}); //end leader json reading

