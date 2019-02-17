@extends('admin.layouts.master')

@section('admin.page')
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        @include('admin.layouts.errors')
            <div class="card">
                <form id="form-post-categories" role="form" method="post" action="{{ \App\Admin\PostCategory::storeUrl() }}" enctype="multipart/form-data">
                @include('admin.post-categories.form')
                @include('admin.layouts.inputs.create-form-actions')
                </form>
            </div>
        </div>
    </div>
@endsection