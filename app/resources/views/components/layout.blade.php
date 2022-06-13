<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'home' }}</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://rawcdn.githack.com/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet"
          type="text/css"/>
    @php
        $stylesheets = ["layout", "navigation"];
    @endphp
    @foreach($stylesheets as $stylesheet)
        <link rel="stylesheet" href="css/{{$stylesheet}}.css">
    @endforeach
    @stack('styles')
</head>

<body>

{{ $slot }}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
@stack('scripts')

</body>
</html>
