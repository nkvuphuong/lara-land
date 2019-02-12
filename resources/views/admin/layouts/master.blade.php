<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}

    {{-- CSS --}}
    @include('admin.layouts.styles')
    {{-- End - CSS --}}

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
        <div class="container-fluid dashboard-content">
            @include('admin.layouts.page-header')
            @yield('admin_page')
        </div>
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