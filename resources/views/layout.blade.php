<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: #333;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .sidebar ul li {
            width: 100%;
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            background-color: #444;
            text-align: center;
        }

        .sidebar ul li a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 250px; /* Same width as the sidebar */
            padding: 20px;
            background-color: #f8f9fa;
            height: 100vh;
            overflow: auto;
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Category</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </nav>
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
