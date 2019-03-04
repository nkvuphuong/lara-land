<div class="btn-group float-right">
    <a href="{{ \App\Admin\Post::createUrl() }}" class="{{ config('settings.admin.button.add.class') }}">{!! config('settings.admin.button.add.icon') !!}</a>
    <button type="button" class="{{ config('settings.admin.button.search.class') }}" data-toggle="modal" data-target="#search-form-modal">{!! config('settings.admin.button.search.icon') !!}</button>
    <button onclick="AdminMain.bulkAction('{{ \App\Admin\Post::setShowUrl() }}')" type="button" class="{{ config('settings.admin.button.show.class') }}">{!! config('settings.admin.button.show.icon') !!}</button>
    <button onclick="AdminMain.bulkAction('{{ \App\Admin\Post::setHideUrl() }}')" type="button" class="{{ config('settings.admin.button.hide.class') }}">{!! config('settings.admin.button.hide.icon') !!}</button>
    <button onclick="AdminMain.bulkAction('{{ \App\Admin\Post::setDeleteUrl() }}')" type="button" class="{{ config('settings.admin.button.delete.class') }}">{!! config('settings.admin.button.delete.icon') !!}</button>
</div>