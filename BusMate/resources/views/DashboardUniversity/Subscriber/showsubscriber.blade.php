@extends(' DashboardUniversity/layout/layout ')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>subscriber</title>
</head>

<body>
    <div class="container" id="container2">
        <div class="title">all subscriber</div>
        <form>
            <div class="button">
                <a href="{{route('Subscriber.create')}}">Add Subscriber</a>
            </div>
            <table id="users">
                <tr>
                    <th>subscriber type</th>
                    <th>full name</th>
                    <th>college</th>
                    <th>subscriber state</th>
                    <th>semester id</th>
                    <th>Edit</th>
                    <th>Delet</th>

                </tr>
                
                @foreach($subscriber as $subscribers)
                <tr>
                    <td>{{$subscribers['subscriber_type']}}</td>
                    <td>{{$subscribers['full_name']}}</td>
                    <td>{{$subscribers['college']}}</td>
                    <td>{{$subscribers['subscriber_state']}}</td>
                    <td><a href="{{route('Add_Semester.show',$subscribers['semester_id'])}}">{{$subscribers['semester_id']}}</a></td>

                    <td style="width: 150px"><a href="{{route('Subscriber.edit',$subscribers['subscriber_id'])}}" class="edit">edit</a>
                    </td>
                    <td>
                        <form action="{{route('Subscriber.destroy',$subscribers['subscriber_id'])}}" method="POST">
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