<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @php
    $post_date = \Carbon\Carbon::now();
    @endphp
    {{--dd($post_date)--}}
    <p>
    {{ $post_date->dayName }} - {{ $post_date->isoFormat("LL") }} - {{$post_date->diffForHumans()}}
    </p>

    {{__(finish)}}

</body>
</html>
