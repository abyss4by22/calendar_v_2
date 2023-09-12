<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/admin.blade.php -->




<div class="container">
    <h2>Admin Page</h2>
    <form method="POST" action="{{ route("create_event.store") }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="event_start_date">Start Date</label>
            <input type="date" name="event_start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="event_start_time"> Start Time</label>
            <input type="time" name="event_start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="event_end_date">End Date</label>
            <input type="date" name="event_end_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="event_end_time"> End Time</label>
            <input type="time" name="event_end_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
</div>


</body>
</html>