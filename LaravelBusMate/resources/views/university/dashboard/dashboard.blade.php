@extends('university/layout/layout')

@section('contant')



<div class="content">
    <div class="title-info">
        <p>dashboard</p>
        <i class="fas fa-chart-bar"></i>
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