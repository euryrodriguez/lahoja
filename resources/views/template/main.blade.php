<!DOCTYPE html>
<html>
<head>
    @include('template.partials.metadata')
</head>
<body>
@include('template.partials.header')
<section>
    <div class="container-fluid">
        <div class="row">
            @include('flash::message')
            @yield('mainContent')
        </div>
    </div>
</section>
@include('template.partials.modals')
@include('template.partials.footer')
<!-- JS -->
<script async src="{{ asset('js/app.js')}}"></script>
@yield('scriptsIndex')
</body>
</html>