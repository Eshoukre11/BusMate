@extends(' DashboardUniversity/layout/layout ')

@section('content')

<div class="content">
    <div class="title-info">

        <div class="hidden_items">
            <a class="navbar_items" href="{{route('UniversityUserAdd.index')}}" style="opacity: 0;" name="navbar"> User</a>
            <a class="navbar_items" href="{{route('Add_Semester.index')}}" style="opacity: 0;" name="navbar"> Semester</a>
            <a class="navbar_items" href="{{route('Add_Company_Contract.index')}}" style="opacity: 0;" name="navbar">Contract</a>
            <a class="navbar_items" href="{{route('Company.index')}}" style="opacity: 0;" name="navbar"> company</a>
        </div>
        <i class="fas fa-chart-bar" style="cursor: pointer;" onclick="show_hide()"></i>
    </div>
    <div class="data-info">
        <div class="box">
            <i class="fas fa-users"></i>
            <div class="data">
                <p>Subscribers</p>
                <span>100</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-users"></i>
            <div class="data">
                <p>Number of students today</p>
                <span>30</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-note-sticky"></i>
            <div class="data">
                <p>notifications</p>
                <span>15</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-warning"></i>
            <div class="data">
                <p>Feadback</p>
                <span>100</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-star"></i>
            <div class="data">
                <p>Subscription requests</p>
                <span>15</span>
            </div>
        </div>
    </div>
    @endsection
</div>