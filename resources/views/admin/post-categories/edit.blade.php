@extends('admin.layouts.master')

@section('admin.page')
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            @include('admin.layouts.errors')
            <div class="card">
                <form id="form-post-categories" role="form" method="post" action="{{ \App\Admin\PostCategory::updateUrl($postCategory->id)}}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{ $postCategory->id }}">
                    @include('admin.post-categories.form')
                    @include('admin.layouts.inputs.edit-form-actions')
                </form>
            </div>
        </div>
    </div>
@endsection