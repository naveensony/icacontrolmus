<!--Base fiddle for FullCalendar 2.1.1 with printing
test via http://jsfiddle.net/wijgerden/144txve1/show/light/

//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.js
//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.css
//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.js

//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css
-->



<!DOCTYPE html>
<html>
<head>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.css" />
<script src="{{asset('js/plugins/fullcalendar/fullcalendar.js')}}"></script>
<!--<script src="fullcalendar.js"></script>-->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css" />

<style>
body {
    margin-top: 40px;
    text-align: center;
    font-size: 13px;
    font-family:"Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
}
#calendar {
    width: 900px;
    margin: 0 auto;
}
.fc-vertweek-header {
    overflow: hidden;
    width: 100%;
}
.fc-vertweek-day {
    float: right;
    margin: 10px;
}

</style>
</head>
<body>
<button data-func="0" class="btn">Month</button>
<button data-func="1" class="btn">agendaWeek</button>
<button data-func="2" class="btn">agendaDay</button>
<button data-func="3" class="btn">basicWeek</button>
<button data-func="4" class="btn">basicDay</button>
<button data-func="5" class="btn">vertWeek</button>
<button data-func="6" class="btn">vertMonth</button>

<div id='calendar'></div>


<script>
$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,basicWeek,basicDay,vertWeek,vertMonth'
    },
    defaultDate: '2014-09-12',
    defaultView: 'vertWeek',
	dayRender: function( date, cell ) { 
    // Get the current view     
		var view = $('#meal_calendar').fullCalendar('getView');

		// Check if the view is the new vertWeek - 
		// in case you want to use different views you don't want to mess with all of them
		if (view.name == 'vertWeek') {
			// Hide the widget header - looks wierd otherwise
			$('.fc-widget-header').hide();

			// Remove the default day number with an empty space. Keeps the right height according to your font.
			$('.fc-day-number').html('<div class="fc-vertweek-day">&nbsp;</div>');

			// Create a new date string to put in place  
			var this_date = date.format('ddd, MMM Do');

			// Place the new date into the cell header. 
			cell.append('<div class="fc-vertweek-header"><div class="fc-vertweek-day">'+this_date+'</div></div>');
		}
	},
    editable: true,
    events: [{
        title: 'All Day Event',
        start: '2014-09-01'
    }, {
        title: 'Long Event',
        start: '2014-09-07',
        end: '2014-09-07'
    }, {
        id: 999,
        title: 'Repeating Event',
        start: '2014-09-09T16:00:00'
    }, {
        id: 999,
        title: 'Repeating Event',
        start: '2014-09-16T16:00:00'
    }, {
        title: 'Meeting',
        start: '2014-09-12T10:30:00',
        end: '2014-09-12T12:30:00'
    }, {
        title: 'Lunch',
        start: '2014-09-12T12:00:00'
    }, {
        title: 'Birthday Party',
        start: '2014-09-13T07:00:00'
    }, {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: '2014-09-28'
    }]
});

var btns = [
    function () { $('#calendar').fullCalendar('changeView', 'month'); },
    function () { $('#calendar').fullCalendar('changeView', 'agendaWeek'); },
    function () { $('#calendar').fullCalendar('changeView', 'agendaDay'); },
    function () { $('#calendar').fullCalendar('changeView', 'basicWeek'); },
    function () { $('#calendar').fullCalendar('changeView', 'basicDay'); },
    function () { $('#calendar').fullCalendar('changeView', 'vertWeek'); },
    function () { $('#calendar').fullCalendar('changeView', 'vertMonth'); },
];

$("[data-func]").on("click", function () {
    btns[parseInt($(this).attr("data-func"))]();
});
</script>

</body>
</html>