@extends(' DashboardUniversity/layout/layout ')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Show Company</title>
</head>

<body>
    <div class="container" id="container2">
        <div class="title">all companies</div>
        <form>
            <table id="users">
                <tr>
                    <th>subscriber type</th>
                    <th>full name</th>
                    <th>college</th>
                    <th>subscriber state</th>


                </tr>

                <tr>
                    <td>{{$subscriberinfo['subscriber_type']}}</td>
                    <td>{{$subscriberinfo['full_name']}}</td>
                    <td>{{$subscriberinfo['college']}}</td>
                    <td>{{$subscriberinfo['subscriber_state']}}</td>
                </tr>

            </table>

    </div>
    </form>
    </div>
</body>

</html>
@endsection