<div class="btn-group float-right">
    <a href="{{ \App\Admin\PostCategory::createUrl() }}" class="{{ config('settings.admin.button.add.class') }}">{!! config('settings.admin.button.add.icon') !!}</a>
    <button type="button" class="{{ config('settings.admin.button.search.class') }}" data-toggle="modal" data-target="#search-form-modal">{!! config('settings.admin.button.search.icon') !!}</button>
    <button onclick="AdminMain.bulkAction('{{ \App\Admin\PostCategory::setShowUrl() }}')" type="button" class="{{ config('settings.admin.button.show.class') }}">{!! config('settings.admin.button.show.icon') !!}</button>
    <button onclick="AdminMain.bulkAction('{{ \App\Admin\PostCategory::setHideUrl() }}')" type="button" class="{{ config('settings.admin.button.hide.class') }}">{!! config('settings.admin.button.hide.icon') !!}</button>
    <button onclick="AdminMain.bulkAction('{{ \App\Admin\PostCategory::setDeleteUrl() }}')" type="button" class="{{ config('settings.admin.button.delete.class') }}">{!! config('settings.admin.button.delete.icon') !!}</button>
</div>