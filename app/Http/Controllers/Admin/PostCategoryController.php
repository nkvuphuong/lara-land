<?php

namespace App\Http\Controllers\Admin;

use App\Admin\PostCategory;
use App\Helpers\FileHelper;
use App\Http\Requests\Admin\PostCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCategoryController extends Controller
{
    public function __construct()
    {
        new PostCategory();
        \SEOMeta::setTitle(__('admin/global.post_category'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PostCategory::with('parent')
            ->with('translations')
            ->filter(request()->all())
            ->latest()
            ->paginate(config('settings.admin.per_page'));

        $parent_id = \request('parent_id');

        $selectedDisplayStatus = request('display_status') === '0' || !empty(request('display_status')) ? request()->get('display_status') * 1 : '';

        return view('admin.post-categories.index', compact('data', 'parent_id', 'selectedDisplayStatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \SEOMeta::setTitle(__('admin/post-category.create'));

        $selectedDisplayStatus = old('display_status') !== null ? old('display_status') * 1 : 1;
        return view('admin.post-categories.create', compact('selectedDisplayStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategoryRequest $request)
    {
        $request->validated();

        $data = $request->all();

        $data['image'] = ($path = FileHelper::upload('image', 'post-categories', $request->input('name'))) ? $path : null;

        if ($rs = PostCategory::create($data)) {
            session()->flash('success', __('admin/post-category.added_new_success'));

            if ($data['is_continue']) {
                return back();
            } else {
                return redirect()->route('admin.post-categories.index', ['locale' => $request->input('locale')]);
            }
        } else {
            session()->flash('error', __('admin/post-category.added_new_fail'));
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostCategory $postCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostCategory $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postCategory)
    {
        \SEOMeta::setTitle(__('admin/post-category.edit'));

        $selectedDisplayStatus = old('display_status') !== null ? old('display_status') * 1 : $postCategory->display_status;
        return view('admin.post-categories.edit', compact('postCategory', 'selectedDisplayStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\PostCategory $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategoryRequest $request, PostCategory $postCategory)
    {
        $request->validated();

        $data = $request->all();

        $data['image'] = ($path = FileHelper::upload('image', 'post-categories', $request->input('name'), $postCategory->image)) ? $path : $postCategory->image;

        if ($rs = $postCategory->update($data)) {
            session()->flash('success', __('admin/post-category.updated_success'));
            if ($data['is_continue']) {
                return back();
            } else {
                return redirect()->route('admin.post-categories.index', ['locale' => $request->input('locale')]);
            }
        } else {
            session()->flash('error', __('admin/post-category.updated_fail'));
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostCategory $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        if ($rs = $postCategory->delete()) {
            session()->flash('success', __('admin/global.deleted_success'));
        } else {
            session()->flash('error', __('admin/global.error_while_delete'));
        }

        return back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bulkDestroy()
    {
        $ids = \request('checked_ids');

        if (empty($ids)) {
            session()->flash('warning', __('admin/global.have_no_records_to_delete'));
        } else if (PostCategory::destroy($ids)) {
            session()->flash('success', __('admin/global.deleted_selected_records_success'));
        } else {
            session()->flash('error', __('admin/global.deleted_selected_records_fail'));
        }

        return back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bulkShow()
    {
        $ids = \request('checked_ids');

        if (empty($ids)) {
            session()->flash('warning', __('admin/global.have_no_records_to_show'));
        } else if (PostCategory::bulkShowDisplayStatus($ids)) {
            session()->flash('success', __('admin/global.showed_selected_records_success'));
        } else {
            session()->flash('error', __('admin/global.showed_selected_records_fail'));
        }

        return back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bulkHide()
    {
        $ids = \request('checked_ids');

        if (empty($ids)) {
            session()->flash('warning', __('admin/global.have_no_records_to_hidden'));
        } else if (PostCategory::bulkHideDisplayStatus($ids)) {
            session()->flash('success', __('admin/global.hidden_selected_records_success'));
        } else {
            session()->flash('error', __('admin/global.hidden_selected_records_fail'));
        }

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    //Chuyển vào model, truyền tham số là id của record
    public function deleteFile($id)
    {
        $rs = PostCategory::deleteFile($id);

        if (\request('ajax') === "1") {

            if ($rs) {
                $response = [
                    'status' => 'success',
                    'msg' => __('admin/global.deleted_file_success')
                ];
            } else {
                $response = [
                    'status' => 'fail',
                    'msg' => __('admin/global.error_while_delete_file')
                ];
            }

            return response()->json($response);
        }

        return back();
    }
}
