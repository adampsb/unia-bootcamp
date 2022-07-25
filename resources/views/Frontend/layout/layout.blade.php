<!doctype html>
<html lang="en">
<head>
    @include('Frontend.layout.partials.head')
    @stack('head')
</head>
<body>
@include('Frontend.layout.partials.nav')
<main class="mb-1 margin-content">
    @yield('content')
</main>
@include('Frontend.layout.partials.footer')
@include('Frontend.layout.partials.scripts')
@stack('bottom')
</body>
</html>
