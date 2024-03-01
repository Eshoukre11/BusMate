@extends(' DashboardUniversity/layout/layout ')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Show User</title>
</head>

<body>
    <div class="container" id="container2">
        <div class="title">all users</div>
        <form>
            <div class="button">
                <a href="{{route('UniversityUserAdd.create')}}">Add User</a>
            </div>
            <table id="users">
                <tr>
                    <th>name</th>
                    <th>email</th>
                    <th>phone number</th>
                    <th>role</th>
                    <th>Edit</th>
                    <th>Delet</th>

                </tr>
                @foreach($user as $user)
                <tr>
                    <td> {{$user ['user_name']}} </td>
                    <td>{{$user ['email']}}</td>
                    <td>{{$user ['phone_number']}}</td>
                    <td>{{$user ['role']}}</td>
                    <td style="width: 75px"><a href="{{route('UniversityUserAdd.edit',$user['duser_id'])}}" class="edit">edit</a>
                    </td>

                    <td>
                        <form action='{{route('UniversityUserAdd.destroy',$user['duser_id'])}}' method="POST">
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