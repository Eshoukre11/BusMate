@extends(' DashboardUniversity/layout/layout ')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Edit</title>
</head>

<body>
    <div class="container" id="container1" style="display: block;">
        <div class="title">Semsetor</div>
        <form action='{{route('Add_Semester.update',$editsemester['semester_id'])}}' method="POST">
            @method('PUT')
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Semester name</span>
                    <input type="text" id="semester_name" placeholder="enter semseter name " name="semester_name" value="{{$editsemester->semester_name}}" required>
                    @error('semester_name')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Semstor code</span>
                    <input type="text" id="semester_code" placeholder="enter semstor code " name="semester_code" value="{{$editsemester->semester_code}}" required>
                    @error('semester_code')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">start date</span>
                    <input type="date" id="start_date" placeholder="enter start_date " name="start_date" value="{{$editsemester->start_date}}" required>
                    @error('start_date')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">End date</span>
                    <input type="date" id="end_date" placeholder="enter your number " name="end_date" value="{{$editsemester->end_date}}" required>
                    @error('end_date')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

            </div>
            <div class="button">
                <input type="submit" value="save">
            </div>
        </form>
    </div>
</body>

</html>
@endsection