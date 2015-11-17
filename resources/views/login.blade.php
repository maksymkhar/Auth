<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        label {
            font-weight: bold;
        }

        a {
            font-weight: bold;
        }

        li {
            font-weight: bold;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">LOGIN</div>

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
            <button id="Login" type="submit" class="btn btn-default">Login</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>

        <label>Not have an account?</label>
        <a id="Register" href="{{ route('auth.register') }}">Register!</a>


    </div>
</div>
</body>
</html>