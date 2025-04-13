<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App Name')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.0/classic/ckeditor.js"></script>
    @livewireStyles


    <!-- Custom Top Section (If Any) -->
    @yield('top')
    <style>
        nav.navbar {
            z-index: 1030;
            height: 70px;
            /* or your navbar height */
        }
    </style>
</head>

<body>
    <!-- Main container to hold everything -->
    <div class="container-fluid p-0">

        <!-- Navbar -->
        @include('layouts.frontend.nav')

        <!-- Hero Section -->
        @include('layouts.frontend.hero_section')

        <!-- Content Section -->
        @yield('content')

    </div>
    @livewireScripts
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery for DataTables -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">


    <!-- Custom Bottom Section (If Any) -->
    @yield('bot')
</body>

</html>