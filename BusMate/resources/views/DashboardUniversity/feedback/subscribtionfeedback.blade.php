@extends(' DashboardUniversity/layout/layout ')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>All Feedback</title>
</head>

<body>
    <div class="container" id="container2">
        <div class="title">All feedback</div>
        <form>

            <table id="users">
                <tr>
                    <th>sender</th>
                    <th>feedback</th>


                </tr>

                @foreach($subscriberfeedback as $subscriberfeedbacks)
                <tr>
                    <td><a href="{{route('Subscriber.show',$subscriberfeedbacks['subscriber_id'])}}">{{$subscriberfeedbacks['subscriber_id']}}</a></td>
                    <td><a href="{{route('subscriberfeedback.show',$subscriberfeedbacks['feedback_id'])}}">{{$subscriberfeedbacks['feedback_id']}}</a></td>

                </tr>
                @endforeach
                @foreach($drivfeedback as $drivfeedbacks)
                <tr>
                    <td><a href="">{{$drivfeedbacks['driver_id']}}</a></td>
                    <td><a href="{{route('subscriberfeedback.show',$drivfeedbacks['feedback_id'])}}">{{$drivfeedbacks['feedback_id']}}</a></td>

                </tr>
                @endforeach
            </table>

        </form>
    </div>
</body>

</html>
@endsection