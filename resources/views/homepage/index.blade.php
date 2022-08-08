<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nama DaeraH Indonesia</title>
</head>
<body>

    <div class="ui top attached tabular menu">
        <a class="item active" data-tab="first">Home</a>
        <a class="item" data-tab="second">Biografi</a>
        <a class="item" data-tab="third">Login</a>
    </div>

    <div class="ui bottom attached tab segment active" data-tab="first">
        {{-- @include('#') --}}
    </div>

    <div class="ui bottom attached tab segment" data-tab="second">
        {{-- @include('#') --}}
    </div>

    <div class="ui bottom attached tab segment" data-tab="third">
        {{-- @include('#') --}}
    </div>
        <script>
            $('.menu .item')
                .tab()
            ;
    </script>
</body>
</html>




