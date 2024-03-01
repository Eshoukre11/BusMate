@extends(' DashboardUniversity/layout/layout ')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Add Semester</title>

</head>

<body>


    <div class="container">
        <div class="title-info">

            <div class="hidden_items">
            </div>
        </div>
        <div class="title">Semsetor</div>
        <form action='{{route('Add_Semester.store')}}' method="POST">
            @csrf
            <div class="user-details">

                <div class="input-box">
                    <span class="details">Semester name</span>
                    <input type="text" id="semseter_name" placeholder="enter semseter name " name="semester_name" required>
                    @error('semester_name')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Semster code</span>
                    <input type="text" id="semester_code" placeholder="enter semster code " name="semester_code" required>
                    @error('semester_code')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">start_date</span>
                    <input type="date" id="start_date" placeholder="enter start_date " name="start_date" required>
                    @error('start_date')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">End date</span>
                    <input type="date" id="end_date" placeholder="enter end_date " name="end_date" required>
                    @error('end_date')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">

                    <span class="details">Year</span>
                    <select name="year_id" id="year_id" required>
                        <option value={{$year['year_id']}}>{{$year['year_date']}}</option>

                    </select>
                    @error('year_id')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

            </div>
            <div class="button">
                <input type="submit" value="add">
            </div>
        </form>


</body>

</html>
@endsection