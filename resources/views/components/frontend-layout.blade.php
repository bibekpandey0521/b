<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="/frontend/css/style.css">
</head>
<body>
    <header>
        <x-frontend-navbar/>
    </header>

    <main>
      {{$slot}}
    </main>


    <footer>

    </footer>

</body>
</html>
