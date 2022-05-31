<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.assets.style')
    @yield('stylization')
</head>
<body>
    @yield('content')
    @include('layouts.assets.script')
    @yield('scripts')
</body>
</html>

