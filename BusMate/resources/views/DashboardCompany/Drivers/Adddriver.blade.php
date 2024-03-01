@extends(' DashboardCompany/layout/layout ')

@section('content2')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>Add Driver</title>
</head>

<body>
    <div class="container" id="container1" style="display: block;">
        <div class="title">Add Driver</div>
        <form action="{{route('AddDriver.store')}}" method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">driver name</span>
                    <input type="text" id="driver_name" placeholder="enter driver_name" name="driver_name" required>
                    @error('driver_name')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">address</span>
                    <input type="text" id="driver_address" placeholder="enter driver_address" name="driver_address" required>
                    @error('driver_address')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">driver_number</span>
                    <input type="text" id="driver_number" placeholder="enter driver_number " name="driver_number" required>
                    @error('driver_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">email</span>
                    <input type="email" id="email" placeholder="enter driver email " name="email" required>
                    @error('email')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">password</span>
                    <input type="password" id="password" placeholder="enter password" name="password" required>
                    @error('password')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">licens number</span>
                    <input type="text" id="license_number" placeholder="enter license_number" name="license_number" required>
                    @error('license_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">date of empolyment</span>
                    <input type="date" id="date_of_employment" placeholder="enter date_of_employment" name="date_of_employment" required>
                    @error('date_of_employment')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">bus</span>
                    <select name="bus_id" id="bus_id" required>
                        @foreach($buses as $bus)
                        <option value="{{$bus['bus_id']}}">{{$bus['bus_number']}}</option>

                        @endforeach
                    </select>
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