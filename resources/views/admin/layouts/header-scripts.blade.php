<script>
    let GlobalOptions = {
        'lfmUrlPrefix': '{{ config('lfm.url_prefix') }}'
    };
</script>

<!-- jquery 3.3.1 -->
<script src="{{ asset('/admin/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ mix('/admin/js/all.js') }}"></script>
<script src="{{ asset('admin/vendor/ckeditor/ckeditor.js') }}"></script>
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>--}}

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

<!-- Laravel messages JS lang -->
<script type="text/javascript" src="{{ asset('js/messages.js')}}"></script>