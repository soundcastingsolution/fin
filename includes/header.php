<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>My Finance Tracker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <style>
        /* Fixed Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #343a40; /* Dark background */
        }

        /* Center the menu items */
        .navbar-nav {
           
            justify-content: center;
            width: 100%;
        }

        /* Styling for links */
        .navbar-nav .nav-item {
            margin: 0 15px; /* Even spacing between menu items */
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: bold;
        }

        /* Logo/Brand name */
        .navbar-brand {
            color: white !important;
            font-weight: bold;
            margin-left: auto; /* Push the logo to the left */
        }

        /* Body padding */
        body {
            padding-top: 70px; /* Prevent content overlap */
        }

        /* Small screen adjustments */
        @media (max-width: 768px) {
            .navbar-nav {
                flex-wrap: nowrap;
                overflow-x: auto; /* Allow horizontal scrolling on small screens */
            }
        }
    </style>
</head>
<body>

<!-- Fixed Centered Navigation Bar -->
<nav class="navbar navbar-dark">
    
    <a class="navbar-brand" href="person.php">Person</a>
    <a class="navbar-brand" href="asset.php">Asset</a>
    <a class="navbar-brand" href="fund_transfer.php">Transfer</a>
    <a class="navbar-brand" href="additional.php">Additional</a>
</nav>
<div class="container py-4">