<?php

/**
 * DASHBOARD
 */

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

/**
 * POST CATEGORIES
 */
Breadcrumbs::for('admin.post-categories.index', function ($trail) {
   $trail->parent('admin.dashboard');
   $trail->push(__('admin/global.post_category'), route('admin.post-categories.index'));
});

Breadcrumbs::for('admin.post-categories.create', function ($trail) {
    $trail->parent('admin.post-categories.index');
    $trail->push(__('global.create'), route('admin.post-categories.create'));
});

Breadcrumbs::for('admin.post-categories.edit', function ($trail, $data) {
    $trail->parent('admin.post-categories.index');
    $trail->push(__('global.edit'), route('admin.post-categories.edit', $data->id));
});

/**
 * POST
 */
Breadcrumbs::for('admin.posts.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('admin/global.post'), route('admin.posts.index'));
});

Breadcrumbs::for('admin.posts.create', function ($trail) {
    $trail->parent('admin.posts.index');
    $trail->push(__('global.create'), route('admin.posts.create'));
});

Breadcrumbs::for('admin.posts.edit', function ($trail, $data) {
    $trail->parent('admin.posts.index');
    $trail->push(__('global.edit'), route('admin.posts.edit', $data->id));
});