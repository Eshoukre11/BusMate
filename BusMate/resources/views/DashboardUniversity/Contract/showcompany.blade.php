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

                    <th>company name</th>
                    <th>'address'</th>
                    <th>comunication_email</th>
                    <th>phone_number</th>
                    <th>company_website</th>
                    <th>Edit</th>


                </tr>

                <tr>
                    <td>{{$company['company_name']}}</td>
                    <td>{{$company['company_address']}}</td>
                    <td>{{$company['comunication_email']}}</td>
                    <td>{{$company['phone_number']}}</td>
                    <td>{{$company['company_website']}}</td>
                    <td style="width: 75px"><a href="{{route('Company.edit',$company['company_id'])}}" class="edit">edit</a>
                    </td>

                </tr>

            </table>

    </div>
    </form>
    </div>
</body>

</html>
@endsection