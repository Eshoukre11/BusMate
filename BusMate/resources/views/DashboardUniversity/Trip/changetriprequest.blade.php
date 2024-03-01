@extends(' DashboardUniversity/layout/layout ')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>show ChangeTR</title>

</head>

<body>

    </div>
    <div class="container" id="container2">
        <div class="title">all ChangeTR</div>
        <form>
            <table id="users">
                <tr>
                    <th>subscriber</th>
                    <th>old trip number</th>
                    <th>new trip number</th>
                    <th>Delet</th>

                </tr>
                @foreach($changeTR as $changeTRs)
                <tr>
                    <td><a href="{{route('Subscriber.show',$changeTRs['subscriber_id'])}}">{{$changeTRs['subscriber_id']}}</a></td>
                    <td>{{$changeTRs['old_trip_number']}}</td>
                    <td>{{$changeTRs['new_trip_number']}}</td>
                    <td>
                        <form action='{{route('change_trip_request.destroy',$changeTRs['chtrequest_id'])}}' method="POST">
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