@extends(' DashboardUniversity/layout/layout ')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>All Trips</title>
</head>

<body>
    <div class="container" id="container2">
        <div class="title">all trips</div>
        <form>
            <div class="button">
                <a href="{{route('Add_Trip.create')}}">Add trip</a>
            </div>
            <table id="users">
                <tr>
                    <th>trip_number</th>
                    <th>trip_type</th>
                    <th>start_point</th>
                    <th>end_point</th>
                    <th>trip_day</th>
                    <th>start_time</th>
                    <th>stops</th>
                    <th>semester id</th>
                    <th>Edit</th>
                    <th>Delet</th>

                </tr>
                @foreach($trip as $trips)
                <tr>
                    <td>{{$trips['trip_number']}}</td>
                    <td>{{$trips['trip_type']}}</td>
                    <td>{{$trips['start_point']}}</td>
                    <td>{{$trips['end_point']}}</td>
                    <td>{{$trips['trip_day']}}</td>
                    <td>{{$trips['start_time']}}</td>
                    <td>{{$trips['stops']}}</td>
                    <td>{{$trips['semester_id']}}</td>
                    <td style="width: 150px"><a href="{{route('Add_Trip.edit',$trips['trip_id'])}}" class="edit">edit</a>
                    </td>
                    <td>
                        <form action="{{route('Add_Trip.destroy',$trips['trip_id'])}}" method="POST">
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