@extends('admin.layouts.master')

@section('admin.body')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                @include('admin.layouts.errors')
                <!-- general form elements -->
                <div class="box box-primary">
                    {{--<div class="box-header with-border">
                        <h3 class="box-title"></h3>
                    </div>--}}
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form id="form-post-categories" role="form" method="post" action="{{ \App\Admin\PostCategory::storeUrl() }}" enctype="multipart/form-data">
                        @include('admin.post-categories.form')
                        <!-- /.box-body -->

                        <div class="box-footer">
                            @include('admin.layouts.inputs.create-form-actions')
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