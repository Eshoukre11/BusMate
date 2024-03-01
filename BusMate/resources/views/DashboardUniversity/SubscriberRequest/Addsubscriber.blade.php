@extends(' DashboardUniversity/layout/layout ')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Add subscriber</title>
</head>

<body>
    <div class="container" id="container1">
        <div class="title">Add subscriber</div>
        <form action='{{route('SubscribtionRequest.store')}}' method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Subscriber type</span>
                    <input type="text" id="subscriber_type" placeholder="enter your student or staff " name="subscriber_type" value="{{$request->subscriber_type}}" required>
                    @error('subscriber_type')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">full name</span>
                    <input type="text" id="full_name" placeholder="enter your  fullname " name="full_name" value="{{$request->full_name}}" required>
                    @error('full_name')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">college</span>
                    <input type="text" id="college" placeholder="enter your college " name="college" value="{{$request->college}}" required>
                    @error('college')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">college number</span>
                    <input type="text" id="college_number" placeholder="enter your college_number " name="college_number" value="{{$request->college_number}}" required>
                    @error('college_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">phone</span>
                    <input type="text" id="phone" placeholder="enter your phone_number " name="phone" value="{{$request->phone}}" required>
                    @error('phone_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">email</span>
                    <input type="datetime" id="email" placeholder="enter your email" name="email" value="{{$request->email}}" required>
                    @error('email')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">password</span>
                    <input type="password" id="password" placeholder="enter your password" name="password" value="{{$request->password}}" required>
                    @error('password')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">password</span>
                    <input type="text" id="semester_id" placeholder="enter your semester_id" name="semester_id" value="{{$request->semester_id}}" required>
                    @error('password')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
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