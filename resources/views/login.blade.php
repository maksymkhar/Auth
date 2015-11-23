<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    <link href="{{'css/app.css'}}" rel="stylesheet" type="text/css">
    <link href="{{'css/all.css'}}" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: bold;
            font-family: 'Montserrat', sans-serif;
        }

        .container {
            text-align: center;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 70px;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="jumbotron">
        <div class="title">LOGIN</div>
    </div>

    <div class="content">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('login_error'))
            <div class="alert alert-danger">
                <ul>
                    {{ Session::get('login_error') }}
                </ul>
            </div>
        @endif

        <div class="panel panel-primary">

            <div class="panel-heading">Use your email account!</div>

            <div class="panel-body">
                <form method="post" action={{ route('auth.postLogin') }}>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.com" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button id="Login" type="submit" class="btn btn-primary">Login</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>

            <div class="panel-footer">
                <label>Not have an account?</label>
                <a id="Register" href="{{ route('auth.register') }}">Register!</a>
            </div>

        </div>






    </div>
</div>
</body>
</html>