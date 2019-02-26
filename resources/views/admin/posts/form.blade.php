{{ csrf_field() }}
@include('admin.layouts.locale-input')
<div class="box-header with-border">
    @include('admin.layouts.inputs.languages-dropdown')
</div>
<div class="box-body">
    <div class="form-group">
        <label for="nameInput">{{__('admin/posts.name')}}</label>
        <input type="text" class="form-control" id="nameInput" name="name" placeholder=""
               value="{{ old('name', isset($post) ? $post->name : '') }}">
    </div>
    <div class="form-group">
        <label for="cateIdsInput">{{__('global.category')}}</label>
        <select name="cate_id[]" id="cateIdsInput" class="select2-input form-control" multiple="multiple" style="width: 100%;">
            @include('admin.posts.category-options')
        </select>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label for="imageInput">{{__('admin/posts.image')}}</label>
                <input type="file" id="imageInput" name="image">
            </div>
            @if(isset($post) && FileHelper::fileExist($post->image))
                <div class="form-group image-upload-wrap">
                    <div class="thumbnail">
                        <i class="fa fa-trash fa-2x pull-right"
                           onclick="AdminMain.deleteFile($(this), '{{ \App\Admin\Post::deleteFileUrl($post->id) }}')"></i>
                        <img src="{{ asset($post->image) }}" alt="">
                    </div>
                </div>
            @endif
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="displayStatusInput">{{__('admin/global.display_status')}}</label>
                <select class="form-control" name="display_status" id="displayStatusInput">
                    @include('admin.layouts.inputs.display-status-options')
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="descriptionInput">{{__('admin/posts.description')}}</label>
        <textarea name="description" id="descriptionInput" rows="10" class="form-control">{{ old('description', isset($post) ? $post->description : '') }}</textarea>
    </div>
    <div class="form-group">
        <label for="contentInput">{{__('admin/posts.content')}}</label>
        <textarea name="content" id="contentInput" class="form-control">{{ old('content', isset($post) ? $post->content : '') }}</textarea>
    </div>
</div>

{!! JsValidator::formRequest('App\Http\Requests\Admin\PostRequest', '#form-posts'); !!}