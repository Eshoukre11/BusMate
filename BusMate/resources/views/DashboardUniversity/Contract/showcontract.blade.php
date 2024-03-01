@extends(' DashboardUniversity/layout/layout ')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Document</title>
</head>

<body>
    <div class="container" id="container2">
        <div class="title">all companies</div>
        <form>
            <div class="button">
                <a href="{{route('Add_Company_Contract.create')}}">Add Contract</a>
            </div>
            <table id="users">
                <tr>
                    <th>contract_number</th>
                    <th>company id</th>
                    <th>contract_price</th>
                    <th>start_date</th>
                    <th>end_date</th>
                    <th>Edit</th>
                    <th>Delet</th>

                </tr>
                @foreach($contracts as $contract)
                <tr>
                    <td>{{$contract['contract_number']}}</td>
                    <td><a href='{{route('Add_Company_Contract.show',$contract['company_id'])}}'>{{$contract['company_id']}}</a></td>
                    <td>{{$contract['contract_price']}}</td>
                    <td>{{$contract['start_date']}}</td>
                    <td>{{$contract['start_date']}}</td>
                    <td style="width: 75px"><a href="{{route('Add_Company_Contract.edit',$contract['contract_id'])}}" class="edit">edit</a>
                    </td>
                    <td>

                        <form action='{{route('Add_Company_Contract.destroy',$contract['contract_id'])}}' method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delet" style="background-color: red">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

    </div>
    </form>
    </div>
</body>

</html>
@endsection