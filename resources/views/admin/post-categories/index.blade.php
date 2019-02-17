@extends('admin.layouts.master')

@section('admin_page')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    @include('admin.layouts.inputs.languages-dropdown')
                    @include('admin.post-categories.action-controls')
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <form id="bulk-action-frm" action="" method="post">
                        {{ csrf_field() }}
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <label class="custom-control custom-checkbox" for="check-all-id">
                                        <input id="check-all-id" type="checkbox" class="custom-control-input check-all-trigger"><span class="custom-control-label"></span>
                                    </label>
                                </th>
                                <th>ID</th>
                                <th>{{__('admin/post-categories.name')}}</th>
                                <th>{{__('global.image')}}</th>
                                <th>{{__('admin/post-categories.parent')}}</th>
                                <th>{{__('admin/global.display_status')}}</th>
                                <th>{{__('admin/global.created_at')}}</th>
                                <th>{{__('admin/global.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($data->items()))
                                @foreach($data->items() as $item)
                                    <tr>
                                        <td>
                                            <label class="custom-control custom-checkbox" for="check-all-{{$item->id}}">
                                                <input id="check-all-{{$item->id}}" type="checkbox" checked="" class="custom-control-input" name="checked_ids[]" value="{{$item->id}}"><span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <a href="{{ \App\Admin\PostCategory::editUrl($item->id) }}">{{ $item->name }}</a>
                                        </td>
                                        <td><img style="max-width: 100px; max-height: 100px"
                                                 src="{{ \App\Helpers\FileHelper::imageSrc($item->image) }}" alt="">
                                        </td>
                                        @if($parent = $item->parent)
                                            <td><a href="{{ \App\Admin\PostCategory::editUrl($item->parent->id) }}">{{ $item->parent->name }}</a></td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>{!! \App\Admin\PostCategory::displayStatusLabel($item->display_status) !!}</td>
                                        <td>{{ \App\Admin\PostCategory::dateTimeFormat($item->created_at) }}</td>
                                        <td>
                                            <a class="{{ config('settings.admin.button.edit.class') }}" href="{{ \App\Admin\PostCategory::editUrl($item->id) }}">{!! config('settings.admin.button.edit.icon') !!}</a>
                                            <a  class="{{ config('settings.admin.button.delete.class') }}" onclick="AdminActions.confirmDelete('{{ \App\Admin\PostCategory::deleteUrl($item->id) }}')">{!! config('settings.admin.button.delete.icon') !!}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">{{ __('global.no_data') }}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </form>
                    <nav>{{  $data->appends( request()->query() )->links() }}</nav>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    @include('admin.post-categories.search-form')
@endsection