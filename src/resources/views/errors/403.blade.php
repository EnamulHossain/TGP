<!DOCTYPE html>
<html>
    <head>
        <title>Error 403</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #566369;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                margin-top: -100px;
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 30px;
                font-weight: bold;
            }

            .subtitle {
                font-size: 44px;
                margin-bottom: 30px;
                font-weight: bold;
            }

            .text {
                font-size: 20px;
                margin-bottom: 40px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <!-- <div>
                    <img src="{{asset('/images/logo.png')}}"/>
                </div> -->
                <div class="title">Error 403</div>
                <div class="subtitle">{{ $message }}</div>
            </div>
        </div>
    </body>
</html>
