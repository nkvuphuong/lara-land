<!-- ============================================================== -->
<!-- Optional JavaScript -->

<!-- bootstap bundle js -->
<script src="{{ asset('/admin/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<!-- slimscroll js -->
<script src="{{ asset('/admin/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<!-- main js -->
<script src="{{ asset('admin/libs/js/main-js.js') }}/"></script>

@yield('admin_scripts')

<script src="{{ asset('/admin/js/main.js') }}"></script>

{{--Load script--}}
<script>
    AdminMain.checkAllToggle();
    AdminMain.ckEditorInit('{{ csrf_token() }}');
    // AdminMain.select2Init();
    AdminMain.dropdownInit();
    Lang.setLocale('{{ App::getLocale() }}');
//     $('[data-mask]').inputmask();
    {{--$('.datepicker').datepicker({--}}
        {{--format: '{{ config('settings.admin.date_mask') }}',--}}
    {{--});--}}
    // $('.gallery-item').matchHeight({
    //     target: $('.gallery-item .gallery-picture')
    // });
</script>