<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg" type="image/x-icon') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
<script src="https://kit.fontawesome.com/37284525fc.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
 <div id="app">
    @include('admin.layout.sidebar')
    <div id="main" class='layout-navbar'>
    @include('admin.layout.header')
        <div id="main-content">
            <div class="page-heading">
                <h3>{{ $mainHeading }}</h3>
            </div>
            <div class="page-content">
                @yield('content-section')
            </div>
        </div>
    @include('admin.layout.footer')
    </div>
 </div>
    <script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tinymce/plugins/code/plugin.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script>
        @if (session('success'))
        document.addEventListener('DOMContentLoaded', (event) => {
                    Swal.fire({
                        icon: "success",
                        title: "{{ session('success') }}"
                    });
                });

        @elseif (session('error'))
            document.addEventListener('DOMContentLoaded', (event) => {
                    Swal.fire({
                        icon: "error",
                        title: "{{ session('error') }}"
                    });
                });
        @elseif (session('warning'))
            document.addEventListener('DOMContentLoaded', (event) => {
                    Swal.fire({
                        icon: "warning",
                        title: "{{ session('warning') }}"
                    });
                });
        @endif

        tinymce.init({ selector: '#default' });
        tinymce.init({ selector: '#dark', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code', plugins: 'code' });
    </script>


</body>

</html>
