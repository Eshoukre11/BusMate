<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset('assets/css/style_dash.css') }}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>dashboard </title>
</head>

<body>
    <div class="menu">
        <ul>

            <li>
                <a href="#" class="active">
                    <i class="fas fa-home "></i>
                    <p>dashboard</p>
                </a>
            </li>
            <li>
                <a href="adding.html">
                    <i class="fas fa-add "></i>

                    <a href='{{route('student.create')}}'>
                        <p> adding student</p>

                    </a>

                </a>
            </li>
            <li>
                <a href="add.html">
                    <i class="fas fa-add "></i>
                    <a href='{{route('unstaff.create')}}'>
                        <p>add university</p>
                    </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-train-subway"></i>
                    <p>adding transport lines</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-star"></i>
                    <p>subscription requests</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-note-sticky "></i>
                    <p>notifications</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-warning"></i>
                    <p>complaints</p>
                </a>
            </li>
            <li class="log-out">
                <a href="#">
                    <i class="fas fa-sign-out"></i>
                    <p>log out</p>
                </a>
            </li>
        </ul>
    </div>
    @yield('contant')



</body>

</html>