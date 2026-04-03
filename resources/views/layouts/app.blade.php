<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Notes App' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-50">

    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/livewire@3.x.x/dist/livewire.min.js" defer></script>
</body>
</html>