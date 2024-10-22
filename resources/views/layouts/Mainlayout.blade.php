<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
</head>

{{-- <body oncontextmenu="return false"> --}}
<body>
    @include('sweetalert::alert')
    <div class="wrapper">
    @include('layouts.sidebar')
        <div class="main p-3">
            <!-- <div class="row">
                <ul class="nav" style='justify-content: flex-end'>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Welcome
                            {{ Session::get('userLogin') }} to Tracking System </a>
                    </li>
                </ul>
            </div> -->
            <hr class="btn-secondary border-2 border-top border-secondary" />
            @yield('content')
        </div>
    </div>
</body>
@include('layouts.footer')
@yield('scripts')

<!-- <script>
    $(document).ready(function() {
        var user = "{{ Session::get('userLogin') }}";
        if (user == null || user == "") {
            window.location = "/logout";
        }
    });
</script> -->

</html>
