<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{asset('assets/css/login.css')}}'>
    <title>login</title>

</head>

<body>
    <div class="login">

        @if(session('error_login'))
        <strong> {{session('error_login')}}</strong>
        @endif


        <span class="borderline"></span>
        <form action='{{route('login.university')}}' method="post">
            @csrf
            <div class="log">
                <h2>sign in</h2>
                <input type="email" required="required" name="email">
                <span>email</span>
                <i></i>
                @error('email')
                <p style="color:red;">{{$message}}</p>
                @enderror
            </div>
            <div class="log">
                <input type="password" required="required" name="password">
                <span>password</span>
                <i></i>
                @error('password')
                <p style="color:red;">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="login">
            <a href='{{route('regester.university')}}'>Register</a>
        </form>
    </div>
</body>

</html>