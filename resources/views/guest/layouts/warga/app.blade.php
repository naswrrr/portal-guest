<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Portal Bina Desa - Data Warga</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    {{-- start css --}}
    @include('guest.layouts.warga.css')
    {{-- end css --}}
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    {{-- start main content --}}
    @yield('content')
    <!-- Content End -->
    {{-- end main content --}}

    {{-- start footer --}}
    @include('guest.layouts.warga.footer')
    {{-- end footer --}}

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
            class="fa fa-arrow-up"></i></a>

    {{-- start js --}}
    @include('guest.layouts.warga.js')
    {{-- end js --}}

    <script>
        // Temporary JS to hide spinner
        $(document).ready(function() {
            // Remove spinner if exists
            $('#spinner').remove();

            // Validasi input NIK dan No KK hanya angka
            document.getElementById('nik')?.addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            document.getElementById('no_kk')?.addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>

</body>

</html>
