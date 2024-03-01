@extends(' DashboardUniversity/layout/layout ')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Edit Suscriber</title>
</head>

<body>
    <div class="container" id="container1">
        <div class="title">Edit Subscriber</div>
        <form action='{{route('Subscriber.update',$edit_subscriber['subscriber_id'])}}' method="POST">
            @method('PUT')
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Subscriber type</span>
                    <input type="text" id="subscriber_type" placeholder="enter your student or staff" name="subscriber_type" value="{{$edit_subscriber->subscriber_type}}" required>
                    @error('subscriber_type')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">full name</span>
                    <input type="text" id="full_name" placeholder="enter your  fullname " name="full_name" value="{{$edit_subscriber->full_name}}" required>
                    @error('full_name')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">college</span>
                    <input type="text" id="college" placeholder="enter your college " name="college" value="{{$edit_subscriber->college}}" required>
                    @error('college')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">college number</span>
                    <input type="text" id="college_number" placeholder="enter your college_number " name="college_number" value="{{$edit_subscriber->college_number}}" required>
                    @error('college_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">phone</span>
                    <input type="text" id="phone" placeholder="enter your phone_number " name="phone" value="{{$edit_subscriber->phone}}" required>
                    @error('phone_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">email</span>
                    <input type="datetime" id="email" placeholder="enter your email" name="email" value="{{$edit_subscriber->email}}" required>
                    @error('email')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">subscriber state</span>
                    <input type="text" id="subscriber_state" placeholder="enter your active or inactive" name="subscriber_state" value="{{$edit_subscriber->subscriber_state}}" required>
                    @error('subscriber_state')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">password</span>
                    <input type="password" id="password" placeholder="enter your password" name="password" value="{{$edit_subscriber->password}}" required>
                    @error('password')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="input-box">

                    <span class="details">semester</span>
                    <select name="semester_id" id="semester_id" required>
                        <option value={{$edit_subscriber['semester_id']}}>{{$edit_subscriber['semester_id']}}</option>

                    </select>
                    @error('semester_id')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="button">
                <input type="submit" value="edit">
            </div>
        </form>
    </div>
</body>

</html>
@endsection