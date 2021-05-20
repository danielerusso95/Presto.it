<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presto.it</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">

    {{$style ?? ''}}
</head>
<body>
    <header class="head" >
        <x-_navbar />

            {{$slot}}
           
        <div style="height: 70vh;"></div>

    <x-_footer />

    </header>
    

    <script src="/js/app.js"></script>



    @stack('scripts')

</body>
</html>
