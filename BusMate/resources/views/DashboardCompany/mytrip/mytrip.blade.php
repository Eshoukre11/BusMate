@extends(' DashboardCompany/layout/layout ')
@section('content2')

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
           
            <table id="users">
                <tr>
                    <th>trip_number</th>
                    <th>trip_type</th>
                    <th>start_point</th>
                    <th>end_point</th>
                    <th>trip_day</th>
                    <th>start_time</th>
                    <th>stops</th>

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

                </tr>
                @endforeach
            </table>

        </form>
    </div>
</body>

</html>
@endsection