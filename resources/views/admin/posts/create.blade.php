@extends('admin.layouts.master')

@section('admin.page')
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
            @include('admin.layouts.errors')
            <div class="card">
                <form id="form-posts" role="form" method="post" action="{{ \App\Admin\Post::storeUrl() }}"
                      enctype="multipart/form-data">
                    @include('admin.posts.form')
                    @include('admin.layouts.inputs.create-form-actions')
                </form>
            </div>
        </div>
    </div>
@endsection