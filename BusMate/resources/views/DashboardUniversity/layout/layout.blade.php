<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/dashboard.css') }}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>University Dashboard </title>
    <script>
        function show_hide() {
            const elements = document.getElementsByName('navbar');
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].style.opacity == '1') {
                    elements[i].style.opacity = '0'
                } else {
                    elements[i].style.opacity = '1'
                }
            }
        }
    </script>

</head>

<body>
    <div class="menu">
        <ul>

            <li>
                <a id="dashboard" href="{{route('dashboard-university')}}" class="active">
                    <i class="fas fa-home "></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a id="add1" href="{{route('Subscriber.index')}}">
                    <i class="fas fa-add "></i>
                    <p>subscriber</p>
                </a>
            </li>


            <li>
                <a id="add3" href="{{route('Add_Trip.index')}}">
                    <i class="fas fa-train-subway"></i>
                    <p>Trip</p>
                </a>
            </li>
            <li>
                <a id="add4" href="{{route('SubscribtionRequest.index')}}">
                    <i class="fas fa-star"></i>
                    <p>subscription requests</p>
                </a>
            </li>
            <li>
                <a id="add4" href="{{route('change_trip_request.index')}}">
                    <i class="fas fa-star"></i>
                    <p>Change Trip Request</p>
                </a>
            </li>
            <li>
                <a id="add5" href="#">
                    <i class="fas fa-note-sticky "></i>
                    <p>notifications</p>
                </a>
            </li>
            <li>
                <a id="add6" href="{{route('subscriberfeedback.index')}}">
                    <i class="fas fa-warning"></i>
                    <p>feedback</p>
                </a>
            </li>
            <li class="log-out">
                <form action="">
                    <button type="submit">
                        <i class="fas fa-sign-out"></i>
                        <p>log out</p>
                    </button>
                </form>
            </li>
        </ul>
    </div>

    @yield('content')
</body>

</html>