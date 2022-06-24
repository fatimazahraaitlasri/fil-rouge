<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet"
          type="text/css"/>
    <script src="//unpkg.com/alpinejs" defer></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? "Casar"}}</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navigation.css">
    @stack('styles')
</head>
<body>
@if(currentRoute() != "/")
    @component("layouts.navigation")
    @endcomponent
@endif
{{$slot}}
@stack('scripts')
</body>
</html>