<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/dashboard.css') }}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Company Dashboard </title>
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
                <a id="dashboard" href="{{route('dashboard-Company')}}" class="active">
                    <i class="fas fa-home "></i>
                    <p>dashboard</p>
                </a>
            </li>
            <li>
                <a id="add1" href="{{route('AddBuses.index')}}">
                    <i class="fas fa-train-subway"></i>
                    <p>Buses</p>
                </a>
            </li>
            <li>
                <a id="add3" href="{{route('AddDriver.index')}}">
                    <i class="fas fa-users"></i>
                    <p>Drivers</p>
                </a>
            </li>
            <li>
                <a id="add4" href="{{route('Mytrip.index')}}">
                    <i class="fas fa-star"></i>
                    <p>show trips</p>
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
    @yield('content2')
</body>

</html>