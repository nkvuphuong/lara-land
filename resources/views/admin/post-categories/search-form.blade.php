<div class="modal fade" id="search-form-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="get" action="{{ \App\Admin\PostCategory::indexUrl() }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ __('global.search') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="parentInput">{{ __('admin/post-category.parent') }}</label>
                            <select class="form-control" name="parent_id" id="parentInput">
                                <option value="">{{ __('global.all') }}</option>
                                @include('admin.post-categories.parent-options')
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nameInput">{{ __('admin/post-category.name') }}</label>
                            <input type="text" class="form-control" id="nameInput" name="name" value="{{ request('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="displayStatusInput">{{ __('admin/global.display_status') }}</label>
                            <select class="form-control" name="display_status" id="displayStatusInput">
                                <option value="">{{ __('global.all') }}</option>
                                @include('admin.layouts.inputs.display-status-options')
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ __('global.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('global.search') }}</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->