<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</head>

<body>



    <!-- Modal -->
    <div class="modal fade" id="EventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Event title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="deleteEvent">Delete</button>
                </div>
            </div>
        </div>
    </div>




    <div id="calendar" class="w-75 ">


    </div>

    <script>
        $(document).ready(function() {
            var selectedEvent;
            // Delete event
            $("#deleteEvent").click(function() {
                // if an event is selected
                if (selectedEvent) {
                    // get the id
                    var id = selectedEvent.id;
                    // ajax request to the route we defined in web.php
                    $.ajax({
                        url: "/calendar/event/delete/" + id,
                        // PUT because we modify a value. Not delete it
                        type: "DELETE",
                        dataType: "json",
                        success: function(response) {
                            // Refresh the page after the modification
                            location.reload();
                        },
                        error: function(error) {
                            console.log(error);
                        },
                    });
                    // Hide the modal
                    $("#eventDetailModal").modal("hide");
                }
            });
            // CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var events = {!! json_encode($evenements) !!};
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: events,
                selectable: true,
                selectHelper: true,
                eventClick: function(event) {
                    selectedEvent = event;
                    console.log(event);
                    // Open Bootstrap modal
                    $('#EventModal').modal('show');
                    // Set modal content dynamically
                    $('#EventModal .modal-title').text(event.title);
                    $('#EventModal .modal-body').html('<p>'+event.description+'</p>' +
                        '<p>Start: ' + moment(event.start).format('YYYY-MM-DD HH:mm') + '</p>' +
                        '<p>End: ' + moment(event.end).format('YYYY-MM-DD HH:mm') + '</p>');
                }
            });
        });
        </script>
























</body>

</html>
