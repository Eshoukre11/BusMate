@extends(' DashboardCompany/layout/layout ')

@section('content2')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Add Bus</title>
</head>

<body>
    <div class="container" id="container1" style="display: block;">
        <div class="title">add bus</div>
        <form action="{{route('AddBuses.store')}}" method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">bus number</span>
                    <input type="text" id="bus_number" placeholder="enter bus_number " name="bus_number" required>
                    @error('bus_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">bus type</span>
                    <input type="text" id="bus_type" placeholder="enter large,medium,small " name="bus_type" required>
                    @error('bus_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">bus sign</span>
                    <input type="text" id="bus_sign" placeholder="enter bus_sign " name="bus_sign" required>
                    @error('bus_sign')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">capacity</span>
                    <input type="text" id="capacity" placeholder="enter capacity" name="capacity" required>
                    @error('capacity')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">company</span>
                    <select name="company_id" id="company_id" required>
                        <option value="{{$company['company_id']}}">{{$company['company_name']}}</option>
                    </select>
                    @error('company_id')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="button">
                <input type="submit" value="add">
            </div>
        </form>
    </div>
</body>

</html>
@endsection