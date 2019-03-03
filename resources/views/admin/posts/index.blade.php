@extends('admin.layouts.master')

@section('admin.page')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @include('admin.layouts.inputs.languages-dropdown')
                        @include('admin.posts.action-controls')
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form id="bulk-action-frm" action="" method="post">
                            {{ csrf_field() }}
                            <table class="table table-hover">
                                <tr>
                                    <th>
                                        <label for="check-all-id">
                                            <input type="checkbox" class="flat-green check-all-trigger" id="check-all-id">
                                        </label>
                                    </th>
                                    <th>ID</th>
                                    <th>{{__('admin/posts.name')}}</th>
                                    <th>{{__('global.image')}}</th>
                                    <th>{{__('admin/global.display_status')}}</th>
                                    <th>{{__('admin/global.created_at')}}</th>
                                    <th>{{__('admin/global.actions')}}</th>
                                </tr>
                                @if(count($data->items()))
                                    @foreach($data->items() as $item)
                                        <tr>
                                            <td>
                                                <label for="check-all-{{$item->id}}">
                                                    <input type="checkbox" class="flat-green check-all-target" id="check-all-{{$item->id}}" name="checked_ids[]" value="{{$item->id}}">
                                                </label>
                                            </td>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <a href="{{ \App\Admin\Post::editUrl($item->id) }}">{{ $item->name }}</a>
                                            </td>
                                            <td><img style="max-width: 100px; max-height: 100px"
                                                     src="{{ \App\Helpers\FileHelper::imageSrc($item->image) }}" alt="">
                                            </td>
                                            <td>{!! \App\Admin\Post::displayStatusLabel($item->display_status) !!}</td>
                                            <td>{{ \App\Admin\Post::dateTimeFormat($item->created_at) }}</td>
                                            <td>
                                                <a class="{{ config('settings.admin.button.edit.class') }}" href="{{ \App\Admin\Post::editUrl($item->id) }}">{!! config('settings.admin.button.edit.icon') !!}</a>
                                                {{--<a  class="{{ config('settings.admin.button.delete.class') }}" href="{{ \App\Admin\Post::deleteUrl($item->id) }}">{!! config('settings.admin.button.delete.icon') !!}</a>--}}
                                                <a class="{{ config('settings.admin.button.delete.class') }}"  onclick="AdminActions.confirmDelete('{{ \App\Admin\Post::deleteUrl($item) }}')">{!! config('settings.admin.button.delete.icon') !!}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">{{ __('global.no_data') }}</td>
                                    </tr>
                                @endif
                            </table>
                        </form>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{  $data->appends( request()->query() )->links() }}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

    @include('admin.posts.search-form')

@endsection