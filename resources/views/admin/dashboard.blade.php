<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])
    <title>calendar_v_2</title>
</head>

<body class=" p-2 ">
    <h1>admin</h1>
    <a href="{{route("create_event.index")}}">create event</a>
    <a href="{{route("calendar.index")}}">calendar</a>
</body>

</html>