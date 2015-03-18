/**
 * Created by alistair on 3/17/15.
 */

var current_series_id = '206youaskedforit';

var months = [
    'Jan',
    'Feb',
    'Mar',
    'Apr',
    'May',
    'Jun',
    'Jul',
    'Aug',
    'Sep',
    'Oct',
    'Nov',
    'Dec'
    ];

$(function () {

    $.getJSON("/sermons/json", function(data) {
        data.series.forEach(function(series) {
            if(series.id == current_series_id) {
                console.log(series);

                $('#sermon-series-title').html(series.title);

                series.sermons.forEach(function(sermon) {

                    var date = new Date(0);
                    date.setUTCSeconds(sermon.time);

                    $('#sermon-browser').append(
                    '<div class="sermon">' +
                        '<div class="sermon-left">' +
                        '<div class="cal-icon">' +
                        '<strong>' + months[date.getMonth()] + '</strong>' +
                        '<span>' + date.getDate() + '</span>' +
                        '</div>' +
                        '</div>' +
                        '<div class="sermon-info">' +
                        '<div class="row">' +
                        '<div class="title">' +
                        '<p>' +
                        sermon.title +
                        ' <i class="icon-youtube-play" href="'+ sermon.audio + '"></i>' +
                        '</p>' +
                        '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="description">' +
                        sermon.desc +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                    );
                });
            }
        });
    });

});