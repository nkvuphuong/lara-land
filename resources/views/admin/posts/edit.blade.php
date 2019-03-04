@extends('admin.layouts.master')

@section('admin.page')
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
            @include('admin.layouts.errors')
            <div class="card">
                <form id="form-posts" role="form" method="post" action="{{ \App\Admin\Post::updateUrl($post->id) }}"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    @include('admin.posts.form')
                    @include('admin.layouts.inputs.edit-form-actions')
                </form>
            </div>
        </div>
    </div>
@endsection