@extends(' DashboardCompany/layout/layout ')

@section('content2')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Buses</title>
</head>

<body>
    <div class="container" id="container2">
        <div class="title">Buses</div>
        <form>
            <div class="button">
                <a href="{{route('AddBuses.create')}}">Add</a>
            </div>
            <table id="users">
                <tr>
                    <th>bus number</th>
                    <th>bu type</th>
                    <th>bus sign</th>
                    <th>capacity</th>
                    <th>company id</th>
                    <th>Edit</th>
                    <th>Delet</th>

                </tr>

                @foreach($buses as $bus)
                <tr>
                    <td>{{$bus['bus_number']}}</td>
                    <td>{{$bus['bus_type']}}</td>
                    <td>{{$bus['bus_sign']}}</td>
                    <td>{{$bus['capacity']}}</td>
                    <td><a href="{{route('Company.show',$bus['company_id'])}}">{{$bus['company_id']}}</a></td>

                    <td style="width: 150px"><a href="{{route('AddBuses.edit',$bus['bus_id'])}}" class="edit">edit</a>
                    </td>
                    <td>
                        <form action="{{route('AddBuses.destroy',$bus['bus_id'])}}" method="POST">
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