@extends(' DashboardUniversity/layout/layout ')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/add_user.css') }}'>
    <title>edit company</title>
</head>

<body>
    <div class="container" id="container1" style="display: block;">
        <div class="title">Company</div>
        <form action='{{route('Company.update',$edit_company['company_id'])}}' method="POST">
            @method('PUT')
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">company number</span>
                    <input type="text" id="company_name" placeholder="enter your company_name " name="company_name" value="{{$edit_company->company_name}}" required>
                    @error('company_name')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details"> company_address</span>
                    <input type="text" id="company_address" placeholder="enter your contract_price " name="company_address" value="{{$edit_company->company_address}}" required>
                    @error('company_address')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details"> comunication_email</span>
                    <input type="text" id="comunication_email" placeholder="enter your comunication_email " name="comunication_email" value="{{$edit_company->comunication_email}}" required>
                    @error('comunication_email')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="input-box">
                    <span class="details">phone_number</span>
                    <input type="text" id="phone_number" placeholder="enter your phone_number " name="phone_number" value="{{$edit_company->phone_number}}" required>
                    @error('phone_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details"> company_website</span>
                    <input type="text" id="company_website" placeholder="enter your company_website " name="company_website" value="{{$edit_company->company_website}}" required>
                    @error('company_website')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

            </div>
            <div class="button">
                <input type="submit" value="save">
            </div>
        </form>
    </div>
</body>

</html>
@endsection