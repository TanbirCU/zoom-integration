<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Project Layout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        header {
            background-color: #004085;
            color: white;
        }
        footer {
            background-color: #f8f9fa;
            color: #555;
            padding: 20px 0;
        }
        .footer-links a {
            color: #555;
            text-decoration: none;
            margin-right: 15px;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Header with Menu -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <a class="navbar-brand" href="#">Laravel Inte</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Meet_Integration</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Payments</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Section -->
    <main class="container my-5">
       @yield('content')
      
    </main>

    <!-- Footer -->
    <footer>
        <div class="container d-flex justify-content-between align-items-center flex-column flex-md-row text-center text-md-start">
            <p class="mb-2 mb-md-0">&copy; 2025 asdf. All rights reserved.</p>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms</a>
                <a href="#">Support</a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
