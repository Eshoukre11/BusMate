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
    <div class="container" id="container1" style="display: block;">
        <div class="title">Company</div>
        <form action='{{route('Add_Company_Contract.store')}}' method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">company name</span>
                    <input type="text" id="company_name" placeholder="enter company name " name="company_name" required>
                    @error('company_name')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">company address</span>
                    <input type="text" id="company_address" placeholder="enter company_address " name="company_address" required>
                    @error('company_address')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">communication email</span>
                    <input type="email" id="comunication_email" placeholder="enter comunication_email " name="comunication_email" required>
                    @error('comunication_email')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">phone number</span>
                    <input type="text" id="phone_number" placeholder="enter your phone_number " name="phone_number" required>
                    @error('phone_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">company website</span>
                    <input type="text" id="company_website" placeholder="enter your company_website " name="company_website">
                    @error('company_website')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">contract number</span>
                    <input type="text" id="contract_number" placeholder="enter your contract_number " name="contract_number" required>
                    @error('contract_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">contract price</span>
                    <input type="text" id="contract_price" placeholder="enter your contract_price " name="contract_price" required>
                    @error('contract_price')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details"> start date</span>
                    <input type="date" id="start_date" placeholder="enter your start_date " name="start_date" required>
                    @error('start_date')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="input-box">
                    <span class="details">End date</span>
                    <input type="date" id="end_date" placeholder="enter your end_date " name="end_date" required>
                </div>
                <div class="input-box">
                    <span class="details">Year</span>
                    <select name="year_id" id="year_id" required>
                        <option value={{$year['year_id']}}>{{$year['year_date']}}</option>

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