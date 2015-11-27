<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>


            .title {
                font-weight: 100;
                font-family: 'Lato';
                font-size: 36px;
            }
            .title small{
                font-weight: 100;
                font-family: 'Lato';
                font-size: 12px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">{{ Config::get('app.name') }} <small><span>{{ Config::get('app.version') }}</span></small> </div>
            </div>
        </div>
    </body>
</html>
