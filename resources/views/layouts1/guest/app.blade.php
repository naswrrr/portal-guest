<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Portal Bina Desa - Kategori Berita</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    {{-- start css --}}
    @include('layouts1.guest.css')
    {{-- end css --}}
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    {{-- main content start --}}
    @yield('content')
    <!-- Content End -->


    {{-- start footer --}}
    @include('layouts1.guest.footer')

    {{-- end footer --}}

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
            class="fa fa-arrow-up"></i></a>

    {{-- start js --}}
    @include('layouts1.guest.js')
    {{-- end js --}}

    <script>
        // Temporary JS to hide spinner
        $(document).ready(function() {
            // Remove spinner if exists
            $('#spinner').remove();

            // Auto generate slug dari nama
            $('#nama').on('input', function() {
                const slug = $(this).val().toLowerCase()
                    .replace(/[^a-z0-9 -]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
                $('#slug').val(slug);
            });
        });
    </script>

</body>

</html>
