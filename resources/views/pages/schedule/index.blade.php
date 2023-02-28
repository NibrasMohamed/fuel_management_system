@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection

@section('custom_js')
    <script src="{{ asset('js/calender.js') }}"></script>
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Schedule</h3>
                </div>

                {{-- <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Fuel Scheduling</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="sticky-top mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Workshops</h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- the events -->
                                                <div id="external-events">
                                                  @foreach ($workshops as $workshop)
                                                    <div class="external-event bg-{{ $workshop->priority }}" data-workshopId="{{$workshop->id}}">{{ $workshop->name }}</div>
                                                  @endforeach
                                                    <div class="checkbox">
                                                        <label for="drop-remove">
                                                            <input type="checkbox" id="drop-remove">
                                                            remove after drop
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Create Workshop</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                                    <ul class="fc-color-picker" id="color-chooser">
                                                        <li>
                                                            <a class="text-primary" href="#" data-val="primary">
                                                                <i class="fas fa-square"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="text-warning" href="#" data-val="warning">
                                                                <i class="fas fa-square"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="text-success" href="#" data-val="success">
                                                                <i class="fas fa-square"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="text-danger" href="#" data-val="danger">
                                                                <i class="fas fa-square"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="text-muted" href="#" data-val="muted">
                                                                <i class="fas fa-square"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /btn-group -->
                                                <div class="input-group">
                                                    <input
                                                        id="new-event"
                                                        type="text"
                                                        class="form-control"
                                                        placeholder="Event Title"
                                                    >
                                                    <div class="input-group-append">
                                                        <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                                                    </div>
                                                    <!-- /btn-group -->
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-9">
                                    <div class="card card-primary">
                                        <div class="card-body p-0">
                                            <!-- THE CALENDAR -->
                                            <div id="calendar"></div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var events = @json($events);
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function() {
                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()), // use the element's text as the event title
                        station_id: $(this).data('workshopid')
                    }
                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0 //  original position after the drag
                    })

                })
            }


            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
            -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function(eventEl) {
                    var sourceId = $(eventEl).data('workshopid');

                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                        allDay: true,
                        sourceId: sourceId,
                        station_id: sourceId,
                    };
                }
            });

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                themeSystem: 'bootstrap',
                //Random default events
                events: [],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(info) {
                    var station_id = $(info.draggedEl).data('workshopid');
                    var start_date = info.dateStr;
                    var end_date = info.dateStr;

                    var data = JSON.stringify({
                        station_id: station_id,
                        start: start_date,
                        end: end_date
                    });

                    $.ajax({
                        type: 'POST',
                        url: "/admin/sheduling/store-event",
                        data: data,
                        processData: false,
                        contentType: 'application/json',
                        success: function(response) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Event Created Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })

                        },
                        error: function(response) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'System Error',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    });

                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }

                },
                eventChange: function(changeInfo) {
                    var start_date = moment(changeInfo.event.start).format('YYYY-MM-DD')
                    var end_date = moment(changeInfo.event.end).format('YYYY-MM-DD')
                    var previos_start = moment(changeInfo.oldEvent.start).format('YYYY-MM-DD')
                    if (!changeInfo.oldEvent.end) {
                        var previos_end = moment(changeInfo.oldEvent.start).format('YYYY-MM-DD')
                    } else {
                        var previos_end = moment(changeInfo.oldEvent.end).format('YYYY-MM-DD')
                    }
                    var event_title = changeInfo.event.title
                    var station_id = changeInfo.event._def.extendedProps.station_id;


                    var data = JSON.stringify({
                        station_id: station_id,
                        start: start_date,
                        end: end_date,
                        prev_start: previos_start,
                        prev_end: previos_end
                    });

                    $.ajax({
                        type: 'POST',
                        url: "/admin/sheduling/store-event",
                        data: data,
                        processData: false,
                        contentType: 'application/json',
                        success: function(response) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Event Successfully updated',
                                showConfirmButton: false,
                                timer: 1500
                            })

                        },
                        error: function(response) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'System Error',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    });

                },
            });

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            var current_priority = "primary";
            // Color chooser button
            $('#color-chooser > li > a').click(function(e) {
                e.preventDefault()
                // Save color
                currColor = $(this).css('color')
                // Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color': currColor
                })

                current_priority = $(this).data('val');

            })
            $('#add-new-event').click(function(e) {
                e.preventDefault()
                // Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                // Create events


                // Add draggable funtionality

                var data = JSON.stringify({
                    event: val,
                    priority: current_priority
                });

                $.ajax({
                    type: 'POST',
                    url: "/admin/sheduling/store",
                    data: data,
                    processData: false,
                    contentType: 'application/json',
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Workshop Created Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        var event = $('<div />')
                        event.css({
                            'background-color': currColor,
                            'border-color': currColor,
                            'color': '#fff'
                        }).data("workshopid", response.data.id).addClass('external-event')
                        event.text(val)

                        $('#external-events').prepend(event)

                        ini_events(event)
                    },
                    error: function(response) {
                        var errors = response.responseJSON.errors;
                        var message = response.statusText;
                        printErrorMsg(errors);
                    }
                });

                // Remove event from text input
                $('#new-event').val('')
            })

            function add_events(events) {

                events.forEach(event => {
                    var color = '#00a65a';
                    switch (event.priority) {
                        case "primary":
                            color = '#0056b3';
                            break
                        case "success":
                            color = '#19692c';
                            break
                        case "warning":
                            color = '#ffc107';
                            break
                        case "muted":
                            color = '#808080';
                            break
                        case "danger":
                            color = '#dc3545';
                            break
                        default:
                            color = '#0056b3';
                            break;
                    }

                    var from = new Date(event.from + 'T00:00:00');
                    var to = new Date(event.to + 'T00:00:00');
                    calendar.addEvent({
                        title: event.name,
                        start: from,
                        end: to,
                        station_id: event.station_id,
                        allDay: true,
                        backgroundColor: color,
                        borderColor: color,
                    })
                });
            }

            // add_events(events);
        });
    </script>

    @section('custom_js')
        
    @endsection
@endsection
