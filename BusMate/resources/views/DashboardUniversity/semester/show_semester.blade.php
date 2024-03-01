@extends(' DashboardUniversity/layout/layout ')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>show Semester</title>

</head>

<body>

    </div>
    <div class="container" id="container2">
        <div class="title">all Semestor</div>
        <form>
            <div class="button">
                <a href="{{route('Add_Semester.create')}}">Add Semester</a>
            </div>
            <table id="users">
                <tr>
                    <th>Semster name</th>
                    <th>Semseter code</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>edit</th>
                    <th>delet</th>

                </tr>
                @foreach($semesters as $semesters)
                <tr>
                    <td>{{$semesters['semester_name']}}</td>
                    <td>{{$semesters['semester_code']}}</td>
                    <td>{{$semesters['start_date']}}</td>
                    <td>{{$semesters['end_date']}}</td>


                    <td style="width: 75px"><a href="{{route('Add_Semester.edit',$semesters['semester_id'])}}" class="edit">edit</a>

                    </td>

                    <td>

                        <form action='{{route('Add_Semester.destroy',$semesters['semester_id'])}}' method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delet" style="background-color: red">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>


        </form>
    </div>
</body>

</html>
@endsection