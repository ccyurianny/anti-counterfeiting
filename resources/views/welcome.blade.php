<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #020202;
            color: #636b6f;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-weight: bold;
            font-size: 64px;
            color: #ffffff;

        }

        .text {
            color: #fff60c;
            font-weight: normal;
            text-align: justify;

        }

        .text1 {
            text-align: left;
        }

        .messagNot {
            font-size: 40px;
            color: #cc4b1a;
        }

        .messag {
            font-size: 40px;
            color: #fff60c;
        }

        p{
            color: #ffffff;
            font-weight: bold;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .textbox {
        }
    </style>
    <script>
        $(document).on('ready', function () {
            $("#resp").hide();
            $("#respNot").hide();


            var url = "/cities";
            $.ajax({
                type: "GET",
                url: url,
                data: $("#form").serialize(),
                success: function (data) {
                    $.each(data.cities, function (key, value) {
                        $("#cit").append("<option value=" + value.id + ">" + value.name + "</option>");
                    });
                }
            });

            $('#btn-check').click(function () {
                var url = "/counterfeiting";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form").serialize(),
                    success: function (data) {
                        if (data.message) {
                            $('#respNot').hide();
                            $('#resp').hide();

                            $('#resp').html(data.message);
                            $('#resp').show();
                            //   $('#resp').delay(4000).hide(600);
                        }
                        if (data.messageNot) {
                            $('#respNot').hide();
                            $('#resp').hide();

                            $('#respNot').html(data.messageNot);
                            $('#respNot').show();
                         //   $('#respNot').delay(4000).hide(600);
                        }
                    }
                });

                $('#code').val('');

            });
            $('#code').keypress(function (e) {
                if (e.which == 13) {
                    return false;
                }
            });

        });
    </script>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif

    <div class="content">
        <div class="row">
            <p class="title">Anti-counterfeiting</p>
            <div class="messag" id="resp"></div>
            <div class="messagNot" id="respNot"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3">

                <form id="form">
                    <div aria-label="...">
                        <p class="text1">City:</p>
                        <select class="form-control" name="city_id" id="cit" size="1">
                            <option value="">Select a city</option>
                        </select>
                        <br>
                    </div>
                    <p>Please Input your product ID:</p>
                    <div>
                        <input type="text" class="textbox" name="code" id="code" placeholder="Product ID">
                        <button type="button" id="btn-check">Check</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <img class="responsive" src="images/scratch.jpg">
                <p class="text">Please scratch off the silver coating and enter your security code for check the product
                    is the original from Tesiyi</p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
</body>
</html>
