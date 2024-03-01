@extends(' DashboardCompany/layout/layout ')

@section('content2')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Drivers</title>
</head>

<body>
    <div class="container" id="container2">
        <div class="title">Drivers</div>
        <form>
            <div class="button">
                <a href="{{route('AddDriver.create')}}">Add user</a>
            </div>
            <table id="users">
                <tr>
                    <th>driver name</th>
                    <th>driver number</th>
                    <th>email</th>
                    <th>date employment</th>
                    <th>bus</th>
                    <th>Edit</th>
                    <th>Delet</th>

                </tr>
                @foreach($driver as $drivers)
                <tr>
                    <td>{{$drivers['driver_name']}}</td>
                    <td>{{$drivers['driver_number']}}</td>
                    <td>{{$drivers['email']}}</td>
                    <td>{{$drivers['date_of_employment']}}</td>
                    <td><a href="{{route('AddBuses.show',$drivers['bus_id'])}}">{{$drivers['bus_id']}}</a></td>

                    <td style="width: 150px"><a href="{{route('AddDriver.edit',$drivers['driver_id'])}}" class="edit">edit</a>
                    </td>
                    <td>
                        <form action="{{route('AddDriver.destroy',$drivers['driver_id'])}}" method="POST">
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