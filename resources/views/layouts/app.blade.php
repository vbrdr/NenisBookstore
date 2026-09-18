<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>@yield('title', "Neni's Bookstore")</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #faf7f8;
            color: #103b36;

            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 0;
            flex: 1;
        }

        footer {
            margin-top: 50px;
            padding: 20px;
            text-align: center;
            background-color: #103b36;
            color: #d8c2cd;
            font-size: 14px;
        }
    </style>
</head>

<body>

    @include('partials.nav')

    <main class="main-content">
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Neni's Bookstore | Group 1
        </p>
    </footer>

</body>
</html>