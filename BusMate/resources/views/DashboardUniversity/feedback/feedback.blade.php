@extends(' DashboardUniversity/layout/layout ')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Show feedback</title>
</head>

<body>
    <div class="container" id="container2">
        <div class="title">feedback</div>
        <form>
            <table id="users">
                <tr>
                    <th>title</th>
                    <th>contant</th>
                    <th>type</th>
                    <th>state</th>
                </tr>

                <tr>
                    <td>{{$feedback['title']}}</td>
                    <td>{{$feedback['contant']}}</td>
                    <td>{{$feedback['type']}}</td>
                    <td>{{$feedback['state']}}</td>
                </tr>

            </table>

    </div>
    </form>
    </div>
</body>

</html>
@endsection