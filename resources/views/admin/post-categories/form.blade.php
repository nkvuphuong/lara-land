{{ csrf_field() }}
@include('admin.layouts.locale-input')
<div class="card-header">
    @include('admin.layouts.inputs.languages-dropdown')
</div>
<div class="card-body">
    <div class="form-group">
        <label for="parentInput">{{__('admin/post-categories.parent')}}</label>
        <select name="parent_id" id="parentInput" class="form-control">
            <option value="0"></option>
            @include('admin.post-categories.parent-options')
        </select>
    </div>
    <div class="form-group">
        <label for="nameInput">{{__('admin/post-categories.name')}}</label>
        <input type="text" class="form-control" id="nameInput" name="name" placeholder=""
               value="{{ old('name', isset($postCategory) ? $postCategory->name : '') }}">
    </div>
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="imageInput">{{__('admin/post-categories.image')}}</label>
                <input type="file" id="imageInput" name="image">
            </div>
            @if(isset($postCategory) && \App\Helpers\FileHelper::fileExist($postCategory->image))
                <div class="form-group image-upload-wrap">
                    <button class="btn btn-danger btn-sm float-left position-absolute delete-img-btn" onclick="AdminMain.deleteFile($(this), '{{ \App\Admin\PostCategory::deleteFileUrl($postCategory->id) }}')">
                        <i class="far fa-trash-alt"></i>
                    </button>
                    <img class="img-thumbnail" src="{{ asset($postCategory->image) }}" alt="">
                </div>
            @endif
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="displayStatusInput">{{__('admin/global.display_status')}}</label>
                <select class="form-control" name="display_status" id="displayStatusInput">
                    @include('admin.layouts.inputs.display-status-options')
                </select>
            </div>
        </div>
    </div>
</div>

{!! JsValidator::formRequest('App\Http\Requests\Admin\PostCategoryRequest', '#form-post-categories'); !!}