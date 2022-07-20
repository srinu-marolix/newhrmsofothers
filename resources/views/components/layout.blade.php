@props(['title'])

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="img/HRMS-logos_transparent.ico" type="image/x-icon">
    <link href='fullcalendar/main.css' rel='stylesheet' />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src='fullcalendar/main.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>
    
    <title>HRMS - {{ $title }}</title>
</head>

<body class="bg-white">
    
    <x-header /> 
    <x-sidebar />
    <x-content>
        {{ $slot }}
        @if(session()->has('message'))
            <div class="text-rose-700">
                {{ session()->get('message') }}
            </div>
        @endif
    </x-content>

</body>
</html>