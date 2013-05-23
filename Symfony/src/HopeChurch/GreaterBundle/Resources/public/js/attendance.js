// set the update button to it's loading state
$("#update-btn").button('loading');

var today = moment().startOf('day');
var lastSunday = moment().startOf('day').day(0);

$('.datepicker')
    .datepicker({
	format: 'D d M yyyy',
	daysOfWeekDisabled: [1,2,3,4,5,6],
	todayBtn: true,
	todayHighlight: true,
	autoclose: true
    });

$('.datepicker').datepicker('setDate', lastSunday.toDate());
$('.datepicker').datepicker('update');

d3.json(attendanceUrl, 
	function(error, json) {
	    if (error) return console.warn(error);
	    
	    var sqlDateFormat = d3.time.format("%Y-%m-%d");
	    var dateFormat = d3.time.format("%d %b %Y");

	    json.forEach(function (e) {
		e.dd = dateFormat(sqlDateFormat.parse(e.a_latest));
	    });

	    var column_names = ["Name", "Last Visit", "# Visits"];

	    d3.select("#attendance-head")
		.append("tr")
		.selectAll("th")
		.data(column_names)
		.enter()
		.append("th")
		.text(function(col) {return col;});

	    var rows = d3.select("#attendance-body")
		.selectAll("tr")
		.data(json)
		.enter()
		.append("tr");

	    var cols = rows.selectAll("td")
		.data(function(row) {
		    return [row.nameFirst + " " + row.nameLast, row.dd, row.a_cnt];
		})
		.enter()
		.append("td")
		.text(function(d) {return d});

	    // event handlers that need the data to be loaded

	    $("#attendance-body tr").on("click", function (e) {
		var d3_this = d3.select(this);
		d3_this.classed("success", function(e) {
		    return !d3_this.classed("success");
		});
	    });


	    // tell the update button that we are done loading
	    $("#update-btn").button('reset');
	}

       ); //end json reading
