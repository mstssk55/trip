<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @yield('head')
    <body>

        <div id="app">
            
            @yield('header')
            <main class="">
                @yield('content')
            </main>
        </div>
        @yield('footer')
    </body>
</html>
