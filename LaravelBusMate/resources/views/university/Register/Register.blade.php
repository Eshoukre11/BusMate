<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=' {{ asset('assets/css/add_student.css')}}'>
    <title>regester</title>
</head>

<body>
    <div class="container">
        @if(session('erore_register'))
        <strong> {{session('erore_register')}}</strong>
        @endif
        <div class="title">Register </div>
        <form action='{{route('Register.university')}}' method="post">
            @csrf

            <div class="user-details">
                <div class="input-box">
                    <span class="details"> universities_name</span>
                    <input type="text" id="universities_name" placeholder="enter your name " required name="universities_name" value="{{old('universities_name')}}">
                    @error('universities_name')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Registeration_Key</span>
                    <input type="text" id="Registeration_Key" placeholder="enter your colleg number " required name="Registeration_Key">
                    @error('Registeration_Key')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">name</span>
                    <input type="text" id="name" placeholder="enter your name " required name="name" value="{{old('name')}}">
                    @error('name')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">email</span>
                    <input type="text" id="email" placeholder="enter your email " required name="email" value="{{old('email')}}">
                    @error('email')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="input-box">
                    <span class="details">password</span>
                    <input type="password" id="password" placeholder="enter your password " required name="password" value="{{old('password')}}">
                    @error('password')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>


                <div class="button">
                    <input type="submit" value="register">
                </div>
        </form>
    </div>
</body>

</html>