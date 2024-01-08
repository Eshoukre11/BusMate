<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href='{{ asset('assets/css/show_un_staff.css') }}'>
    <title>table</title>
</head>

<body>
    <div class="all-users">
        <h2>all unstaff</h2>
        <table id="users">
            <tr>
                <th>name</th>
                <th>email</th>
                <th>phone number</th>
                <th>colleg</th>
                <th></th>


            </tr>
            @foreach($unstaff as $unstaff)

            <tr>
                <td>{{$unstaff['name']}}</td>
                <td>{{$unstaff['email']}}</td>
                <td>{{$unstaff['phone_number']}}</td>
                <td>{{$unstaff['college']}}</td>
                <td>{{$unstaff['sub_status']}}</td>
                <!-- <td><span class="edit">edit</span>
                    <span class="delete">delete</span>
                </td> -->
            </tr>
            @endforeach
        </table>
    </div>
    <script src="table.js"></script>
</body>

</html>