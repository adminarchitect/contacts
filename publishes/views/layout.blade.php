<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 300;
            font-family: 'Lato';
        }

        .contacts__container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
            width: 100%;
        }

        .contacts__content {
            text-align: center;
            display: inline-block;
            width: 90%;
        }

        .contacts__title {
            font-size: 56px;
            font-weight: 100;
        }

        .contacts__map-container {
            position: relative;
        }

        #contacts__map {
            height: 500px;
        }

        .contacts__full_map {
            width: 100%;
        }

        .contacts__departments {
            width: 30%;
            position: absolute;
            top: 20px;
            left: 20px;
            background: white;
            border-radius: 10px;
        }

        .two-rows > div {
            float: left;
            width: 300px;
        }
    </style>

    @yield('contacts.initJS')

    <script async defer src="https://maps.googleapis.com/maps/api/js?&key={{ config('contacts.map.key', '') }}&callback=contacts__initMap"></script>
</head>
<body>
<div class="contacts__container">
    <div class="contacts__content">
        @yield('contacts.content')
    </div>
</div>
</body>
</html>
