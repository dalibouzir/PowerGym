@extends('dashboard')

@section('title', 'Power Gym - Calendar')

@section('content')

<div class="cal-modal-container">
  <div class="calendar-section">
    <h2>Power Gym Calendar</h2>
    <p>Stay updated with our latest events and activities. The calendar below showcases all our upcoming events.</p>
    <div id="calendar" class="transparent-calendar">
      <!-- Calendar will be rendered here -->
    </div>
  </div>
  <div class="events-section">
    <h3>Upcoming Events</h3>
    <p>Don't miss out on any of our exciting events. Check the list below for more details.</p>
    <div class="upcoming-events" style="height: 300px; overflow-y: scroll;">
    @foreach ($events as $event)
    @php
        $isPast = \Carbon\Carbon::parse($event->start_date)->isPast();
    @endphp
    <div class="upcoming-event {{ $isPast ? 'past-event' : '' }}">
        <div class="event-details">
            <div class="event-date">{{ \Carbon\Carbon::parse($event->start_date)->format('M d') }}</div>
            <div class="event-title">{{ $event->title }}</div>
        </div>
        <div class="card-actions">
            @if ($event->users->contains(Auth::id()))
                <form action="{{ route('calendar.unjoin', $event) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Unjoin</button>
                </form>
            @endif
        </div>
    </div>
@endforeach


    </div>
  </div>
</div>

{{-- Include FullCalendar's CSS and JS from CDN --}}
<link href='https://unpkg.com/fullcalendar@5.9.0/main.min.css' rel='stylesheet' />
<script src='https://unpkg.com/fullcalendar@5.9.0/main.min.js'></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
body {
  background-color: #1e1e2f; /* Dark background color */
  color: #ffffff; /* Default text color */
}
.upcoming-event {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: rgba(255, 0, 0, 0.6); /* Red background for events */
    color: #fff;
    padding: 10px;
    margin-bottom: 10px;
    border-left: 5px solid #007bff; /* Blue border */
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.upcoming-event:hover {
    background-color: rgba(255, 0, 0, 0.8); /* Darker red on hover */
}

.event-details {
    flex: 1;
}

.card-actions {
    margin-left: 10px; /* Adjust as needed */
}
.btn {
    padding: 8px 16px;
    font-size: 14px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-danger {
    background-color: #dc3545;
    color: #fff;
}

.btn-danger:hover {
    background-color: #c82333;
}
.cal-modal-container {
  display: flex;
  flex-direction: row; /* Ensures a horizontal layout */
  align-items: stretch; /* Makes children stretch to fill the container's height */
  justify-content: space-between; /* Adjusts spacing between items */
  gap: 20px; /* Provides space between flex items */
  padding: 20px;
  height: calc(100vh - 80px); /* Adjust height to fill viewport minus some space for padding */
}

.calendar-section, .events-section {
  background-color: rgba(52, 58, 64, 0.9); /* Dark background */
  color: #fff;
  border-radius: 15px;
  padding: 20px;
  overflow: auto;
  height: 100%; /* Set height to 100% to fill the container */
}

.calendar-section {
  flex: 7; /* Takes up 70% of the space */
}

.events-section {
  flex: 3; /* Takes up 30% of the space */
}

#calendar {
  width: 100%;
  height: 100%; /* Fill the height of the calendar section */
}

h2 {
  font-size: 48px;
  font-weight: 900;
  color: #007bff; /* Blue color for headings */
  text-shadow: 2px 2px #ff0000; /* Red shadow for headings */
  margin-bottom: 20px;
}

p {
  font-size: 18px;
  line-height: 1.6;
  color: #f8f9fa; /* Light gray color for paragraphs */
  margin-bottom: 20px;
}

.events-section h3 {
  font-size: 37px;
  font-weight: 900;
  color: #dc3545; /* Red color for event section heading */
  margin: 0 0 1rem;
}

.upcoming-events {
  margin-top: 20px;
}

.upcoming-event {
  background-color: rgba(255, 0, 0, 0.6); /* Red background for events */
  color: #fff;
  padding: 10px;
  margin-bottom: 10px;
  border-left: 5px solid #007bff; /* Blue border */
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.upcoming-event:hover {
  background-color: rgba(255, 0, 0, 0.8); /* Darker red on hover */
}

.event-date {
  font-weight: bold;
  font-size: 20px;
  color: #00ff00; /* Green color for event dates */
}

.event-title {
  font-size: 18px;
  color: #ffffff; /* White color for event titles */
}

.event-description {
  font-size: 14px;
  color: #cccccc; /* Light gray color for event descriptions */
}

/* Additional calendar styling */
.fc-toolbar-title {
  color: #00ff00; /* Green color for the calendar title */
}

.fc-daygrid-day {
  background-color: rgba(255, 255, 255, 0.1); /* Semi-transparent cells */
  border-color: #00ff00; /* Green borders for cells */
  color: #ffffff; /* White color for cell numbers */
}

.fc-daygrid-day.fc-day-today {
  background-color: rgba(0, 123, 255, 0.5); /* Blue for today */
  position: relative;
}

.fc-day-today::after {
  content: 'Today';
  position: absolute;
  top: 5px;
  right: 5px;
  background-color: #ff0000; /* Red background for "Today" label */
  color: #ffffff; /* White text for "Today" label */
  padding: 2px 5px;
  border-radius: 5px;
  font-size: 12px;
}

.fc-event-title {
  color: #ffffff; /* Ensure text is white for better visibility */
}

.fc-event {
  background-color: #dc3545; /* Red background for events */
  border: none;
}

.fc-event .event-icon {
  margin-right: 5px; /* Space between icon and text */
}

.past-event {
  text-decoration: line-through; /* Crosses out the event title */
  opacity: 0.6; /* Optionally, make past events less prominent */
  color: #888888; /* Gray color for past events */
}

/* Responsive adjustments */
@media (min-width: 576px) {
  .cal-modal-container {
    flex-direction: row;
  }

  .calendar-section, .events-section {
    flex: 1;
    margin: 0 10px;
  }
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: @json($formattedEvents), // This works directly in a Blade template
        eventContent: function(arg) {
            let isPast = new Date(arg.event.start) < new Date();
            let title = document.createElement('div');
            title.classList.add('fc-event-title');
            if(isPast) {
                title.classList.add('past-event'); // Add this class for past events
            }
            title.innerHTML = arg.event.title;
            let description = document.createElement('div');
            description.classList.add('fc-event-description');
            description.innerHTML = arg.event.extendedProps.description || '';
            return { domNodes: [title, description] };
        },
    });
    calendar.render();
});

// Helper function to check if a date is today
function isToday(date) {
    var today = new Date();
    today.setHours(0,0,0,0);
    date.setHours(0,0,0,0);
    return date.getTime() === today.getTime();
}

// Generate events
var eventDates = {};
let day1 = formatDate(new Date(new Date().setMonth(new Date().getMonth() + 1)));
eventDates[day1] = [
  'Event 1, Location',
  'Event 2, Location 2'
];
let day2 = formatDate(new Date(new Date().setDate(new Date().getDate() + 40)));
eventDates[day2] = [
  'Event 2, Location 3',
];

// Set maxDates
var maxDate = {
  1: new Date(new Date().setMonth(new Date().getMonth() + 11)),
  2: new Date(new Date().setMonth(new Date().getMonth() + 10)),
  3: new Date(new Date().setMonth(new Date().getMonth() + 9))
};

var flatpickr = $('#calendar .placeholder').flatpickr({
  inline: true,
  minDate: 'today',
  maxDate: maxDate[3],
  showMonths: 1,
  enable: Object.keys(eventDates),
  disableMobile: "true",
  onChange: function(date, str, inst) {
    var contents = '';
    if(date.length) {
        for(i=0; i < eventDates[str].length; i++) {
        contents += '<div class="event"><div class="date">' + flatpickr.formatDate(date[0], 'l J F') + '</div><div class="location">' + eventDates[str][i] + '</div></div>';
      }
    }
    $('#calendar .calendar-events').html(contents);
  },
  locale: {
    weekdays: {
      shorthand: ["S", "M", "T", "W", "T", "F", "S"],
      longhand: [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
      ]
    }
  }
});

eventCalendarResize($(window));
$(window).on('resize', function() {
  eventCalendarResize($(this));
});

function eventCalendarResize($el) {
  var width = $el.width();
  if(flatpickr.selectedDates.length) {
    flatpickr.clear();
  }
  if(width >= 992 && flatpickr.config.showMonths !== 3) {
    flatpickr.set('showMonths', 3);
    flatpickr.set('maxDate', maxDate[3]);
  }
  if(width < 992 && width >= 768 && flatpickr.config.showMonths !== 2) {
    flatpickr.set('showMonths', 2);
    flatpickr.set('maxDate', maxDate[2]);
  }
  if(width < 768 && flatpickr.config.showMonths !== 1) {
    flatpickr.set('showMonths', 1);
    flatpickr.set('maxDate', maxDate[1]);
    $('.flatpickr-calendar').css('width', '');
  }
}

function formatDate(date) {
    let d = date.getDate();
    let m = date.getMonth() + 1; //Month from 0 to 11
    let y = date.getFullYear();
    return '' + y + '-' + (m<=9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
}

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        eventContent: function(arg) {
            let isPast = new Date(arg.event.start) < new Date();
            let title = document.createElement('div');
            title.classList.add('fc-event-title');
            if(isPast) {
                title.classList.add('past-event'); // Add this class for past events
            }
            title.innerHTML = arg.event.title;
            return { domNodes: [title] };
        },
        events: @json($formattedEvents),
    });
    calendar.render();
});

</script>

@endsection
