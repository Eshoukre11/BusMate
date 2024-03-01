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
        <form action='{{route('Add_Company_Contract.update',$edit_contract['contract_id'])}}' method="POST">
            @method('PUT')
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">contract number</span>
                    <input type="text" id="contract_number" placeholder="enter your contract_number " name="contract_number" value="{{$edit_contract->contract_number}}" required>
                    @error('contract_number')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">contract price</span>
                    <input type="text" id="contract_price" placeholder="enter your contract_price " name="contract_price" value="{{$edit_contract->contract_price}}" required>
                    @error('contract_price')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details"> start date</span>
                    <input type="date" id="start_date" placeholder="enter your start_date " name="start_date" value="{{$edit_contract->start_date}}" required>
                    @error('start_date')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="input-box">
                    <span class="details">End date</span>
                    <input type="date" id="end_date" placeholder="enter your end_date " name="end_date" value="{{$edit_contract->end_date}}" required>
                </div>

                <div class="input-box">
                    <span class="details">Year_id</span>
                    <select name="year_id" id="year_id" required>
                        <option value="{{$edit_contract->year_id}}">{{$edit_contract->year_id}}</option>

                    </select>
                </div>
                <div class="input-box">
                    <span class="details">company_id</span>
                    <select name="company_id" id="company_id" required>
                        <option value="{{$edit_contract->company_id}}">{{$edit_contract->company_id}}</option>

                    </select>
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