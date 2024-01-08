<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href='{{ asset('assets/css/show_student.css') }}'>
    <title>table</title>
</head>

<body>
    <div class="all-users">
        <h2>all student </h2>
        <table id="users">
            <tr>
                <th>name</th>
                <th>colleg number</th>
                <th>email</th>
                <th>phone number</th>
                <th>colleg</th>
                <th>sub_status</th>
                <th></th>

            </tr>
            <tr>
                @foreach($student as $student)
                <td>{{$student['name']}}</td>
                <td>{{$student['college_number']}}</td>
                <td>{{$student['email']}}</td>
                <td>{{$student['phone_number']}}</td>
                <td>{{$student['college']}}</td>
                <td>{{$student['sub_status']}}</td>
                <td>
                    <!-- <span class="edit"><a href='{{route('student.edit',$student->student_id)}}'>edit</a></span> -->
                    <!-- <span class="delete">delete</span> -->
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="table.js"></script>
</body>

</html>