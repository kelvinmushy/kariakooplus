<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $meta_title ?? 'KariakooStore')</title>
    <meta name="description" content="@yield('meta_description', $meta_description ?? 'Shop quality products at KariakooStore - the best online marketplace in Tanzania.')">
    <meta name="keywords" content="@yield('meta_keywords', $meta_keywords ?? 'kariakoo, tanzania shopping, electronics, computers, buy online, laptops')">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.0/classic/ckeditor.js"></script>
    @livewireStyles

    @yield('top')
    <style>
        nav.navbar {
            z-index: 1030;
            height: 70px;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        @include('layouts.frontend.nav')
        @include('layouts.frontend.hero_section')
        @yield('content')
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    @yield('bot')
</body>

</html>
