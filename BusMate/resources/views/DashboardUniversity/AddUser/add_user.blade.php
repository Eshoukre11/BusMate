@extends(' DashboardUniversity/layout/layout ')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Add User</title>
</head>

<body>
    <div class="container" id="container1" style="display: block;">
        <div class="title">user</div>
        <form action="{{route('UniversityUserAdd.store')}}" method="POST">
            @csrf
            <div class="user-details">

                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" id="user_name" placeholder="enter username" name="user_name" required>
                    @error('user_name')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">password</span>
                    <input type="text" id="password" placeholder="enter your password " name="password" required>
                    @error('password')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">email</span>
                    <input type="text" id="email" placeholder="enter your email " name="email" required>
                    @error('password')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">phone number</span>
                    <input type="text" id="phone_number" placeholder="enter your phone_number " name="phone_number" required>
                    @error('phone_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="your-job" style="margin-top: 20px;">
                    <input type="radio" class="job" name="role" value="admin" id="dot-1">
                    <input type="radio" class="job" name="role" value="user_university" id="dot-2">
                    <input type="radio" class="job" name="role" value="user_company" id="dot-3">

                    <span class="job-title title">role</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="job">admin</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot tow"></span>
                            <span class="job">employ</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="job">company</span>
                        </label>
                        @error('role')
                        <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="add">
            </div>
        </form>
    </div>
</body>

</html>
@endsection