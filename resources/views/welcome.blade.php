<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Organization</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <style>
        /* Additional custom styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .navbar-brand {
            font-size: 1.5rem;
            color: #fff;
        }

        .navbar-nav .nav-link {
            font-size: 1.1rem;
            color: #fff;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ee662a;
        }

        .hero-section {
            background-color: #ee662a;
            padding-top: 100px;
            padding-bottom: 100px;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #333;
        }

        .hero-section p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 30px;
        }

        .dashboard-button {
            background-color: #166f3c;
            color: #fff;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .dashboard-button:hover {
            background-color: #0b351d;
            font-weight: lighter;
        }
    </style>
</head>
<body>
<header class="container-fluid">
<header style="background-color: white; color: white;" class="container py-4">
    <div class="row align-items-center">
        <div class="col-lg-4 offset-lg-4 d-flex justify-content-center">
        <img src="{{ asset('images/logo.png') }}" alt="Application Logo" class="w-32 h-19 sm:w-40 sm:h-10 lg:w-48 lg:h-12" />

        </div>

        <nav class="col-lg-4 d-flex justify-content-end">
            <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>-->
            <div class="collapse navbar-collapse" id="navbarNav">
    <ul style="list-style-type: none; padding: 0; display: flex; align-items: center; justify-content: center; text-align: center; width: 100%;">
        <li style="display: inline; margin-right: 10px;"><a href="/dashboard" style="color: green; text-decoration: none; font-weight:bold;">Home</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="/login" style="color: green; text-decoration: none; font-weight:bold;">Login</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="/register" style="color: green; text-decoration: none; font-weight:bold;">Signup</a></li>
    </ul>
</div>

        </nav>
    </div>
</header>
<div class="col-3">
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="btn-close btn-outline-danger position-absolute top-0 end-0 mt-1 me-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
<div class="container-fluid hero-section">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6">
            <h1>Welcome to REREC Contract $ Licence Tracking Plartform</h1>
            <p>We are delighted to have you here. Our mission is to [briefly state your mission]. Explore our services and find ou
        </div>
        <a href="{{ route('dashboard') }}" class="dashboard-button text-gray-900 hover:text-gray-600">General Dashboard</a>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
