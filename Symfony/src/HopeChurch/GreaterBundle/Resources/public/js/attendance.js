// GLOBAL CONFIG
// the id of the sunday event
var SUNDAY_ID = 1;
// the roles that we break out
var roles = [
//    {
//	"name": "Staff",
//	"title": "Staff"
//    },
//    {
//	"name": "Elder",
//	"title": "Elders"
//    },
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

var origOverallAttendance = 0;

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
	var tab = d3.select("#attendance-tabs")
	    .insert("li", "#total-tab")
	    .classed("active", (i==0))
	    .append("a")
	    .attr("href", "#" + r.name)
	    .attr("data-toggle", "tab")
	    .text(r.title);

	var content = d3.select("#attendance-content")
	    .insert("div", "#total-tab-content") // tab pane
	    .classed("tab-pane", true)
	    .classed("active", (i == 0))
	    .attr("id", r.name)
	    .append("div") //row div
	    .classed("row", true)
	    .classed("top-padding", true)
	    .append("div") // col div
	    .classed("col-md-12", true);

	// now that we've inserted the role tabs, show the total tab
	$("#total-tab").css("visibility", "visible");

	//content.append("h4")
	//    .text(r.title);

	var table = content.append("table")
	    .attr("id", r.name+"-table")
	    .classed("table table-bordered table-hover", true);

	table.append("thead")
	    .attr("id", r.name+"-head")
	    .append("tr")
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

var getSQLDate = function() {
    var currentDate = $(".datepicker").datepicker('getDate');
    //var currentDate = new Date(d.getTime() + (d.getTimezoneOffset()*60000));
    return sqlDateFormat(currentDate);
}

function updateOverallAttendance() {
    var url = overallAttendanceUrl + "/" + SUNDAY_ID + "/" + getSQLDate();

    d3.json(url,
	    function(error, json) {
		if(error) return console.warn(error);

		var attendees = (json && json.attendeeCount) ?
		    json.attendeeCount : 0;

		// simply set the value
		$("#total-cnt").val(attendees);
		// and cache for later
		origOverallAttendance = attendees;
	    });
}

var updateDataForDate = function() {
    //enable the loading notice
    loading();

    //kick off an update of the overall attendance
    updateOverallAttendance();

    var dateUrl = attendanceUrl + "/" + SUNDAY_ID + "/all/"
	+ getSQLDate();

    d3.json(dateUrl,
	function(error, json) {
	    if (error) return console.warn(error);

	    // update the data

	    // reset the attendance
	    d3.keys(all_attendees).forEach(function(id) {
		all_attendees[id].attended = false;
		all_attendees[id].rm_attendance = false;
		all_attendees[id].add_attendance = false;
	    });

	    // now set the new attendance
	    // this MAY get slow if we are dealing with LOTS of attendees
	    json.forEach(function(e) {
		all_attendees[e.p_id].attended = true;

		// rm and add attendance fields will be false until a row is
		// clicked
	    });

	    roles.forEach(function(role) {
		updateTable(role);
	    });

	    loadingDone();
	});
}

var updateTable = function(role) {
    //loading();
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
	    var now_attended = !d3.select(this).classed("success");

	    // update the coloring of the row
	    d3.select(this)
		.classed("success", now_attended);

	    var person = all_attendees[d.p_id];
	    // update the person info (for sending back to the server)
	    // we check the current state against the original state, and if it
	    // differs, then we set the appropriate field
	    if(now_attended != person.attended)
	    {
		if(now_attended)
		    {
			person.add_attendance = true;
			person.rm_attendance = false;
		    }
		else
		    {
			person.add_attendance = false;
			person.rm_attendance = true;
		    }
	    }
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
    //loadingDone();
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

$('#reset-btn').on('click', function(e){
    updateDataForDate();
    $("#total-cnt").val(null); //TODO replace this with an update from DB
    return false;
});

var $tabs = $('.nav-tabs li');
$('#prev-btn').on('click', function() {
    $tabs.filter('.active').prev('li').find('a[data-toggle="tab"]').tab('show');
});
$('#next-btn').on('click', function() {
    $tabs.filter('.active').next('li').find('a[data-toggle="tab"]').tab('show');
});

$("#total-btn-down").on('click', function() {
    var val = parseFloat($("#total-cnt").val());
    val = (val && val > 0) ? val-1 : 0;
    $("#total-cnt").val(val);
});
$("#total-btn-up").on('click', function() {
    var val = parseFloat($("#total-cnt").val());
    val = (val && val > 0) ? val+1 : 1;
    $("#total-cnt").val(val);
});

// update the attendance for the current date
$('#update-btn').on('click', function(e) {
    loading("Saving...");

    var waiting = 0;

    var newOverallAttendance = $("#total-cnt").val();
    if(newOverallAttendance != origOverallAttendance) {
	waiting += 1;

	$.post(overallUpdateUrl,
	       {
		   event: SUNDAY_ID,
		   date: getSQLDate(),
		   count: newOverallAttendance
	       },
	       function(data) {
		   waiting -= 1;

		   if(!waiting) {
		       updateDataForDate();
		   }
	       }, "json");
    }

    // construct two arrays:
    //  - one with those that are NOW attending
    //  - one with those that are now NOT attending
    var attended_ids = [];
    var not_attended_ids = [];
    d3.values(all_attendees).forEach(function(p) {
	if(p.add_attendance)
	{
	    attended_ids.push(p.p_id);
	}
	if(p.rm_attendance)
	{
	    not_attended_ids.push(p.p_id);
	}
    });

    // short circuit if nothing was changed
    if(attended_ids.length == 0 && not_attended_ids.length == 0) return;
    waiting += 1;
    var updateUrl = attendanceUpdateUrl + "/" + SUNDAY_ID + "/" + getSQLDate();

    $.post(updateUrl,
	   {add_attendees: attended_ids, rm_attendees: not_attended_ids},
	   function (data) {
	       if(!data ||
		  data[1] != attended_ids.length ||
		  data[0] != not_attended_ids.length)
		   {
		       // failed!
		       // TODO add a nice error banner like on the add person
		       // page
		       alert("Failed to update attendance");
		   }

	       waiting -= 1;

	       if(!waiting) {
		   // we are done, reload from db and reset the button
		   updateDataForDate();
	       }
	   }, "json");

    return false;
});

// get the list of people that might be attending.
// this is only done once per page load

var bootstrapAttendees = function(role_idx) {

    // update tables as we get data, fakes the user into thinking that the load
    // really isn't taking all that long.
    if(role_idx > 0) updateTable(roles[role_idx-1]);

    // all the data is downloaded
    if(role_idx == roles.length) {
	updateDataForDate();
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
