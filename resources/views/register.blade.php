<!DOCTYPE html>
<html xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <title>Register</title>

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
        <div class="title">REGISTER</div>
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

        <div class="panel panel-primary">

            <div class="panel-heading">Be a member!</div>

            <div class="panel-body">
                <form method="post" action={{ route('register.postRegister') }}>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                    <div class="form-group">
                        <label for="name">User name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>



                        <input type="email" class="form-control" id="email" name="email"
                               placeholder=@{{placeholder}}
                                       value="{{old('email')}}"
                               v-on:blur="checkEmailExists()"
                               required>

                        <!--div v-show="exists">Email already exists!!</div-->






                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <!--input type="number" class="form-control" name="is_admin"-->

                    <button id="Login" type="submit" class="btn btn-primary">Register</button>
                    <button type="reset" class="btn btn-default">Reset</button>

                </form>
            </div>

            <div class="panel-footer">

                <label>Already have an account?</label>
                <a id="Login" href="{{ route('auth.getLogin') }}">Login</a>

            </div>
        </div>






    </div>
</div>

<!--script src="{{asset('js/all.js')}}"></script-->
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>