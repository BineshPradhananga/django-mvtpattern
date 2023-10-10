<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .login-container input[type="submit"] {
            background-color: #007BFF;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .login-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .register {
            background-color: #f11919;
            color: #ffffff;
            padding: 10px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .register:hover {
            background-color: #cf2c2c;
        }
    </style>
</head>
<body>
    <div class="login-container">
        @if(Session::has('success'))
            <p class="success" style="color: aqua">{{ Session::get('success') }}</p>
        @endif
        {{-- {{dd(Session::all())}} --}}
        @if(Session::has('error'))
            <p class="danger" style="color: red">{{ Session::get('error') }}</p>
        @endif
        <h2>Login</h2>
        <form method="POST">
            @csrf

            <input type="text" name="email" placeholder="Email" required>
            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}

            <input type="password" name="password" placeholder="Password" required>
            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}

            <input type="submit" value="Login">
        </form>
        <div class="clearfix"></div>
        <div>
            Not registered yet? <a href="/user/register" class="register">Register</a>
        </div>
    </div>
</body>
</html>
