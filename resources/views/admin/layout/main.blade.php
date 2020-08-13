@include('admin.layout.head')

<div id="wrapper">
    @include('admin.layout.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.layout.navbar')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
