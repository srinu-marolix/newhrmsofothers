@aware(['title', 'type', 'role', 'linksCsv'])

<!DOCTYPE html>
@if ($type === 'auth')
<html lang="en" class="h-full">
@else
<html lang="en">
@endif
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="img/HRMS-icon.ico" type="image/x-icon">
    <link href='fullcalendar/main.css' rel='stylesheet' />

    @push('scripts')
        <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
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
    @endpush
    
    <title>HRMS - {{ $title }}</title>
</head>

@if ($type === 'auth')
<body class="bg-white h-full">
@else
<body class="bg-white">
@endif
    @if($type === 'dashboard')    
        <x-layout.header :role="$role"/> 
        <x-layout.sidebar :linksCsv="$linksCsv"/>
        <x-layout.content :type="$type" :linksCsv="$linksCsv">
            {{ $slot }}
            <x-alert.message />
        </x-layout.content>
    @else
        <div class="relative min-h-full">
            <x-layout.content :type="$type">
                {{ $slot }}
                {{-- <x-alert.message /> --}}
            </x-layout.content>
            <x-layout.footer />
        </div>
    @endif
</body>
</html>