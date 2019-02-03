<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- CSS --}}
    @include('admin.layouts.styles')
    {{-- End - CSS --}}

    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    @include('admin.layouts.navbar')
    <!-- ============================================================== -->
    @include('admin.layouts.left-sidebar')
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        @yield('page')
        @include('admin.layouts.footer')
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->

{{-- Scripts --}}
@include('admin.layouts.scripts')
{{-- End - Scripts --}}

</body>

</html>