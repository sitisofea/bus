<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="../../css/app.css" rel="stylesheet" />
    <title>Maraliner</title>
    @yield('styles')
</head>

<body>
        

    <header class="navbar">
        <a href="/">
            <img src="{{ url('../../img/logoM.png') }}" width="150" height=auto alt="logo">
        </a>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer><small>&copy; 2023</small></footer>

</body>

</html>
