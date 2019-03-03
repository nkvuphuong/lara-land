<script>
    var GlobalOptions = {
        'lfmUrlPrefix': '{{ config('lfm.url_prefix') }}'
    };
</script>

<!-- jquery 3.3.1 -->
<script src="{{ mix('/admin/js/all.js') }}"></script>
<script src="{{ asset('admin/vendor/ckeditor/ckeditor.js') }}"></script>