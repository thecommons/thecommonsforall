// GLOBAL CONFIG
// the id of the sunday event
var SUNDAY_ID = 1;
// the roles that we break out
var roles = [
    {
	"name": "Staff",
	"title": "Staff"
    },
    {
	"name": "Leader",
	"title": "Leaders"
    },
    {
	"name": "Adult",
	"title": "Adults"
    },
    {
	"name": "Child",
	"title": "Children"
    },
    {
	"name": "Infant",
	"title": "Infants"
    },
    {
	"name": "all",
	"title": "Others"
    }
];

// the column names for the tables
var columns = [
    {
	"title": "Name",
	"width": "40%"
    },
    {
	"title": "Last Visit",
	"width": "40%"
    },
    {
	"title": "# Visits",
	"width": "20%"
    }
];

 //the merged dataset
var data = {};
var all_attendees = {};

var loading = function(text) {
    $('#update-btn').button('loading');

    if(!text)
	text = "Loading...";

    $('#update-btn').data('loading-text', text).button('loading');
}

var loadingDone = function() {
    $("#update-btn").button('reset');
}

var createTables = function() {
    roles.forEach(function(r, i) {
	var span = d3.select("#attendance-tables")
	    .append("div")
	    .classed("row", true)
	    .append("div")
	    .classed("span12", true);
	span.append("h4")
	    .text(r.title);

	var table = span.append("table")
	    .attr("id", r.name+"-table")
	    .classed("table table-bordered tabled-striped table-hover", true);

	table.append("thead")
	    .attr("id", r.name+"-head")
	    .selectAll("th")
	    .data(columns)
	    .enter()
	    .append("th")
	    .style("width", function(col) {return col.width})
	    .text(function(col) {return col.title});

	table.append("tbody")
	    .attr("id", r.name+"-body");
    });
}

var updateDataForDate = function() {
    //enable the loading notice
    loading();

    // the bootstrap-datepicker really sucks
    var d = $(".datepicker").data('datepicker').date;
    var currentDate = new Date(d.getTime() + (d.getTimezoneOffset()*60000));

    var dateUrl = attendanceUrl + "/" + SUNDAY_ID + "/all/"
	+ sqlDateFormat(currentDate);

    d3.json(dateUrl,
	function(error, json) {
	    if (error) return console.warn(error);

	    // update the data

	    // reset the attendance
	    d3.keys(all_attendees).forEach(function(id) {
		all_attendees[id].attended = false;
	    });

	    // now set the new attendance
	    // this MAY get slow if we are dealing with LOTS of attendees
	    json.forEach(function(e) {
		all_attendees[e.p_id].attended = true;
	    });

	    roles.forEach(function(role) {
		updateTable(role);
	    });
	});
}

var updateTable = function(role) {

    var rows = d3.select("#"+role.name+"-body")
	.selectAll("tr")
	.data(d3.values(data[role.name]), function(d) {return d.p_id})

    // update selection
	.classed("success", function(d) {
	    return all_attendees[d.p_id].attended;
	})

    // enter selection
	.enter()
	.append("tr")
	.classed("success", function(d) {
	    return all_attendees[d.p_id].attended;
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

// create the tables
createTables();

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

var bootstrapAttendees = function(role_idx) {

    // update tables as we get data, fakes the user into thinking that the load
    // really isn't taking all that long.
    updateDataForDate();

    // all the data is downloaded
    if(role_idx == roles.length) {
	return;
    }

    var role = roles[role_idx].name;

    var roleAttendanceUrl = attendanceUrl + "/" + SUNDAY_ID + "/" + role;

    data[role] = {};

    d3.json(roleAttendanceUrl,
	    function(error, json) {
		if (error) return console.warn(error);

		json.forEach(function (e) {
		    e.a_latest_format = e.a_latest ?
			dateFormat(sqlDateFormat.parse(e.a_latest)) :
			'Never Visited';
		    if(!all_attendees[e.p_id]) {
			all_attendees[e.p_id] = e;
			data[role][e.p_id] = e;
		    }
		});

		// get the next role
		bootstrapAttendees(role_idx+1);

	    }); //end json reading
}

// start the fetches for the attendee data
bootstrapAttendees(0);
