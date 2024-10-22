<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body>
    @include('sweetalert::alert')

    <div class="wrapper" style="display: flex;">
        @include('layouts.sidebar')

        <div class="main p-3" style="flex: 1; margin-left: 250px;">
            <div class="row">
                <ul class="nav" style='justify-content: flex-end'>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Welcome
                            to Truck Management </a>
                    </li>
                </ul>
            </div>
            <hr class="btn-secondary border-2 border-top border-secondary" />
            @yield('content')
        </div>
    </div>
</body>
@include('layouts.footer')
@yield('scripts')

</html>