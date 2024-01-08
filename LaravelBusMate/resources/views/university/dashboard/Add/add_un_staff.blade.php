<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_un_staff.css') }}'>
    <title>regester</title>
</head>

<body>
    <div class="container">
        <div class="title">registration</div>
        <form action='{{route('unstaff.index')}}' method="post">
            @csrf
            <div class="user-details">
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
                <div class="input-box">
                    <span class="details">phone number</span>
                    <input type="text" id="phone" placeholder="enter your number " required name="phone_number" value="{{old('phone_number')}}">
                    @error('phone_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">colleg</span>
                    <input type="text" id="colleg" placeholder="enter your colleg" required required name="colleg" value="{{old('colleg')}}">
                    @error('colleg')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="button">
                <input type="submit" value="register">
            </div>
        </form>
    </div>
</body>

</html>