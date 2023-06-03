<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
</head>

<body class="min-h-screen">

    <header>
        @include('parts.header')
    </header>

    <main>
        @yield('main')
    </main>

    <footer class="px-4 py-8 text-gray-400">
        @include('parts.footer')
    </footer>

</body>

</html>
