<div class="box-tools pull-right">
    <div class="btn-group">
        <a href="{{ \App\Admin\PostCategory::createUrl() }}" class="{{ config('settings_admin.button.add.class') }}">{!! config('settings_admin.button.add.icon') !!}</a>
        <button type="button" class="{{ config('settings_admin.button.search.class') }}" data-toggle="modal" data-target="#search-form-modal">{!! config('settings_admin.button.search.icon') !!}</button>
        <button onclick="AdminMain.bulkAction('{{ \App\Admin\PostCategory::setShowUrl() }}')" type="button" class="{{ config('settings_admin.button.show.class') }}">{!! config('settings_admin.button.show.icon') !!}</button>
        <button onclick="AdminMain.bulkAction('{{ \App\Admin\PostCategory::setHideUrl() }}')" type="button" class="{{ config('settings_admin.button.hide.class') }}">{!! config('settings_admin.button.hide.icon') !!}</button>
        <button onclick="AdminMain.bulkAction('{{ \App\Admin\PostCategory::setDeleteUrl() }}')" type="button" class="{{ config('settings_admin.button.delete.class') }}">{!! config('settings_admin.button.delete.icon') !!}</button>
    </div>
</div>