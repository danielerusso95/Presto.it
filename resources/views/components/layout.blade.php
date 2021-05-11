<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presto.it</title>
    <link rel="stylesheet" href="/css/app.css">
    {{$style ?? ''}}
</head>
<body>

    <x-_navbar />

    {{$slot}}
    <div style="height: 20vh"></div>
    <x-_footer />

    <script src="/js/app.js"></script>


    @stack('scripts')

</body>
</html>
