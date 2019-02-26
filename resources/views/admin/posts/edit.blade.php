@extends('admin.layouts.master')

@section('admin.body')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                @include('admin.layouts.errors')
                <!-- general form elements -->
                <div class="box box-primary">
                    {{--<div class="box-header with-border">
                        <h3 class="box-title"></h3>
                    </div>--}}
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form id="form-posts" role="form" method="post" action="{{ \App\Admin\Post::updateUrl($post->id)}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        @include('admin.posts.form')
                        <!-- /.box-body -->

                        <div class="box-footer">
                            @include('admin.layouts.inputs.edit-form-actions')
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection