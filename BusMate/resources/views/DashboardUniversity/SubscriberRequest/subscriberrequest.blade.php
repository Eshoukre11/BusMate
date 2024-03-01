@extends(' DashboardUniversity/layout/layout ')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href='{{ asset('assets/css/subscription.css') }}'>
    <title>table</title>
    <link rel="stylesheet" href='{{ asset('assets/css/title.css') }}'>
</head>

<body>
    <div class="all-users">
        <h2 class="title">subscription-request</h2>
        <table id="users">
            <tr>
                <th>subscriber type</th>
                <th>full name</th>
                <th>college</th>
                <th>college number</th>
                <th>Add</th>
                <th>Delet</th>
            </tr>
            @foreach($request as $requests)
            <tr>
                <td>{{$requests['subscriber_type']}}</td>
                <td>{{$requests['full_name']}}</td>
                <td>{{$requests['college']}}</td>
                <td>{{$requests['college_number']}}</td>
                <td style="width: 100px">
                    <a href="{{route('SubscribtionRequest.show',$requests['srequest_id'])}}" class="edit">Add</a>
                </td>
                <td>
                    <form action="{{route('SubscribtionRequest.destroy',$requests['srequest_id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delet" style="background-color: red">
                    </form>
                </td>


                </td>

            </tr>
        </table>
        @endforeach
    </div>
</body>

</html>
@endsection