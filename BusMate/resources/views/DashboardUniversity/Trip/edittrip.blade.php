@extends(' DashboardUniversity/layout/layout ')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Edit trip</title>
</head>

<body>
    <div class="container" id="container1" style="display: block;">
        <div class="title">Edit Trip</div>
        <form action='{{route('Add_Trip.update',$edittrip['trip_id'])}}' method="POST">
            @method('PUT')
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">trip number</span>
                    <input type="text" id="trip_number" placeholder="enter your trip number " name="trip_number" value="{{$edittrip->trip_number}}" required>
                    @error('trip_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">trip type</span>
                    <input type="text" id="trip_type" placeholder="enter type go or return or special " name="trip_type" value="{{$edittrip->trip_type}}" required>
                    @error('trip_type')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">start point</span>
                    <input type="text" id="start_point" placeholder="enter your start point " name="start_point" value="{{$edittrip->start_point}}" required>
                    @error('start_point')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">end point</span>
                    <input type="text" id="end_point" placeholder="enter your end point " name="end_point" value="{{$edittrip->end_point}}" required>
                    @error('end_point')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">trip day</span>
                    <input type="text" id="trip_day" placeholder="enter trip day" name="trip_day" value="{{$edittrip->trip_day}}" required>
                    @error('end_point')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">start time</span>
                    <input type="time" id="start_time" placeholder="enter start time" name="start_time" value="{{$edittrip->start_time}}" required>
                    @error('start_time')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Stops</span>
                    <input type="text" id="stops" placeholder="enter All stops " name="stops" value="{{$edittrip->stops}}" required>
                    @error('stops')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">semester</span>
                    <select name="semester_id" id="semester_id" required>
                        <option value="{{$edittrip->semester_id}}">{{$edittrip['semester_id']}}</option>
                    </select>
                    @error('semester_id')
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