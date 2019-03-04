<div class="modal fade" id="search-form-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="get" action="{{ \App\Admin\PostCategory::indexUrl() }}">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('global.search') }}</h5>
                    <a class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nameInput">{{ __('admin/posts.name') }}</label>
                            <input type="text" class="form-control" id="nameInput" name="name" value="{{ request('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="displayStatusInput">{{ __('admin/global.display_status') }}</label>
                            <select class="form-control" name="display_stat
                            us" id="displayStatusInput">
                                <option value="">{{ __('global.all') }}</option>
                                @include('admin.layouts.inputs.display-status-options')
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('global.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('global.search') }}</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->