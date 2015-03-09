var SUNDAY_ID = 1;

function buildAttendanceChart(data) {
    var commonData = [];
    var visitorData = [];

    d3.entries(data).forEach(function(e) {
        var date = e.key;
        var overall = e.value.overallAttendeeCount ?
            +e.value.overallAttendeeCount : 0;
        var attendee = e.value.attendeeCount ?
            +e.value.attendeeCount : 0;

        var visitors = overall - attendee;
        if(overall < attendee) {
            // this means someone recorded the overall wrong
            visitors = 0;
        }

        commonData.push([Date.parse(date), attendee]);
        visitorData.push([Date.parse(date), visitors]);
    });

    $('#attendance-chart').highcharts({
        credits: false,
        chart: {
            zoomType: 'x',
            type: 'area'
        },
        title: {
            text: 'Weekly Attendance',
            x: -20 //center
        },
        subtitle: {
            text: null,
            x: -20
        },
        xAxis: {
            type: 'datetime',
            title: {
                text: 'DATE'
            },
            maxPadding: null,
            minPadding: null,
            startOnTick: false,
            minTickInterval: 3600 * 24 * 30 * 1000,//time in milliseconds
            minRange: 3600 * 24 * 30 * 1000,
            ordinal: false //this sets the fixed time formats
        },
        yAxis: {
            title: {
                text: '# People'
            },
            minorTickInterval: null
        },
        tooltip: {
            formatter: function () {
                return  Highcharts.dateFormat('%d %b %Y',
                    new Date(this.x)) + '<br/>'
                    + '<b>' + this.series.name + ':</b> ' + this.y;
            }
        },
        legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom',
            borderWidth: 0
        },
        plotOptions: {
            area: {
                stacking: 'normal'
            }
        },
        series: [
            {
                type: 'area',
                name: 'Visitors',
                color: '#FFAD00',
                data: visitorData
            },
            {
                type: 'area',
                name: 'Commoners',
                color: '#e22620',
                data: commonData
            }
        ]
    });
}

$(function () {
    var url = overallAttendanceUrl + "/" + SUNDAY_ID;

    d3.json(url,
        function(error, json) {
            if (error) return console.warn(error);

            buildAttendanceChart(json);
        });
});