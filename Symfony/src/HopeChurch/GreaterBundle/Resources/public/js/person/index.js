// enable tablesorter

$(function() {

    $.extend($.tablesorter.themes.bootstrap, {
	// these classes are added to the table. To see other table classes available,
	// look here: http://twitter.github.com/bootstrap/base-css.html#tables
	table      : 'table',
	caption    : '',
	header     : '',
	footerRow  : '',
	footerCells: '',
	icons      : '',
	sortNone   : 'glyphicon glyphicon-sort',
	sortAsc    : 'glyphicon glyphicon-sort-by-alphabet',
	sortDesc   : 'glyphicon glyphicon-sort-by-alphabet-alt',
	active     : '', // applied when column is sorted
	hover      : '', // use custom css here - bootstrap class may not override it
	filterRow  : '', // filter row class
	even       : '', // odd row zebra striping
	odd        : ''  // even row zebra striping
    });

    // call the tablesorter plugin and apply the uitheme widget
    $("#people-table").tablesorter({
	sortList: [[1,0]], // default sort column, 0=asc, 1=desc
	theme : "bootstrap",
	headerTemplate : '{content} {icon}',
	widgets : ["uitheme"]
    })

});
