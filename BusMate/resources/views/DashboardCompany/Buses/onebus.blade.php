@extends(' DashboardCompany/layout/layout ')

@section('content2')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Bus</title>
</head>

<body>
    <div class="container" id="container2">
        <div class="title">Bus</div>
        <form>

            <table id="users">
                <tr>
                    <th>bus number</th>
                    <th>bu type</th>
                    <th>bus sign</th>
                    <th>capacity</th>
                    <th>company id</th>


                </tr>


                <tr>
                    <td>{{$bus['bus_number']}}</td>
                    <td>{{$bus['bus_type']}}</td>
                    <td>{{$bus['bus_sign']}}</td>
                    <td>{{$bus['capacity']}}</td>
                    <td><a href="{{route('Company.show',$bus['company_id'])}}">{{$bus['company_id']}}</a></td>


                </tr>

            </table>

        </form>
    </div>
</body>

</html>
@endsection