var loading = function(text) {
    $('#update-btn').button('loading');

    if(!text)
	text = "Loading...";

    $('#update-btn').data('loading-text', text).button('loading');
}

var loadingDone = function() {
    $("#update-btn").button('reset');
}

var updateDataForDate = function() {
    //enable the loading notice
    loading();

    // the bootstrap-datepicker really sucks
    var d = $(".datepicker").data('datepicker').date;
    var currentDate = new Date(d.getTime() + (d.getTimezoneOffset()*60000));

    var dateUrl = attendanceUrl + "/1/" + sqlDateFormat(currentDate);

    d3.json(dateUrl, 
	function(error, json) {
	    if (error) return console.warn(error);

	    // update the data

	    // reset the attendance
		d3.keys(data).forEach(function(e) {	
		    data[e].attended = false;
		});

	    // now set the new attendance
	    // this MAY get slow if we are dealing with LOTS of attendees
	    json.forEach(function(e) {		
		data[e.p_id].attended = true;
	    });

	    updateTable();
	});
}

var updateTable = function() {

    d3.select("#attendance-head tr")
	.selectAll("th")
	.data(column_names)
	.enter()
	.append("th")
	.text(function(col) {return col;});

    var rows = d3.select("#attendance-body")
	.selectAll("tr")
	.data(d3.values(data), function(d) {return d.p_id})

    // update selection
	.classed("success", function(d) {
	    return d.attended;
	})

    // enter selection
	.enter()
	.append("tr")
	.classed("success", function(d) {
	    return d.attended;
	})
	.on("click", function(d) {
	    d3.select(this)
		.classed("success", 
			 !d3.select(this).classed("success")
			);
	});

    var cols = rows.selectAll("td")
	.data(function(row) {
	    return [row.nameFirst + " " + row.nameLast, 
		    row.a_latest_format, row.a_cnt];
	})
	.enter()
	.append("td")
	.text(function(d) {return d});

    // tell the update button that we are done loading
    loadingDone();
};

// start doing things!!

// set the update button to it's loading state
loading();

// some global data:
var column_names = ["Name", "Last Visit", "# Visits"];
var data = {}; //the merged dataset

// some date formatters for d3
var sqlDateFormat = d3.time.format("%Y-%m-%d");
var dateFormat = d3.time.format("%d %b %Y");

// calculate today, and the the most recent sunday
var today = moment().startOf('day');
var lastSunday = moment().startOf('day').day(0);

// initialize the date picker control

$('.datepicker')
    .datepicker({
	format: 'D d M yyyy',
	daysOfWeekDisabled: [1,2,3,4,5,6],
	todayBtn: true,
	todayHighlight: true,
	autoclose: true
    });

$('.datepicker').datepicker('setDate', lastSunday.toDate());
$('.datepicker').datepicker('setEndDate', today.toDate());
$('.datepicker').datepicker('update');

$('.datepicker').datepicker()
    .on('changeDate', function(e){
	updateDataForDate();
    });

// make the reset button actually reset
$('#reset-btn').on('click', function(e){
    updateDataForDate();
    return false;
});

// update the attendance for the current date
$('#update-btn').on('click', function(e) {
    loading("Saving...");

    // TODO
    // send a date, and a list of p.id's
    // the server will need to create attendances for all those people
    // and also remove attendances for all others

    // we are done, reset the button
    loadingDone();
    return false;
});

// get the list of people that might be attending.
// this is only done once per page load
d3.json(attendanceUrl, 
	function(error, json) {
	    if (error) return console.warn(error);
	    
	    json.forEach(function (e) {
		e.a_latest_format = e.a_latest ? 
		    dateFormat(sqlDateFormat.parse(e.a_latest)) :
		    'Never Visited';
		data[e.p_id] = e;
	    });

	    // get the attendees for the current date
	    updateDataForDate();

	}); //end json reading
