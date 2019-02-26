<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Post;
use App\Helpers\FileHelper;
use App\Http\Requests\Admin\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        \SEOMeta::setTitle(__('admin/global.post'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::with('translations')
            ->filter(request()->all())
            ->latest()
            ->paginate(config('settings.admin.per_page'));;

        $selectedDisplayStatus = request('display_status') === '0' || !empty(request('display_status'))  ? request()->get('display_status') * 1 : '';

        return view('admin.posts.index', compact('data', 'selectedDisplayStatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \SEOMeta::setTitle(__('admin/posts.create'));

        $selectedCates = old('cate_id');
        $selectedDisplayStatus = old('display_status') !== null ? old('display_status') * 1 : 1;

        return view('admin.posts.create', compact('selectedDisplayStatus', 'selectedCates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->validated();

        $data = $request->except('cate_id');

        $data['image'] = ($path = FileHelper::upload('image', 'posts', $request->input('name'))) ? $path : null;

        if ($rs = Post::create($data)) {

            //Add pivot
            if ($cateIds = $request->input('cate_id')) {
                $rs->categories()->sync($cateIds);
            }

            session()->flash('success', __('admin/posts.added_new_success'));
            if ($data['is_continue']) {
                return back();
            } else {
                return redirect()->route('admin.posts.index', ['locale' => $request->input('locale')]);
            }
        } else {
            session()->flash('error', __('admin/posts.added_new_fail'));
            return back()->withInput();
        }
    }

    /**
     * @param Post $post
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        \SEOMeta::setTitle(__('admin/posts.edit'));

        $selectedCates = old('cate_id', $post->getCateIds()->all());
        $selectedDisplayStatus = old('display_status') !== null ? old('display_status') * 1 : $post->display_status;
        return view('admin.posts.edit', compact('post', 'selectedDisplayStatus', 'selectedCates'));
    }

    /**
     * @param PostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        $request->validated();

        $data = $request->except('cate_id');

        $data['image'] = ($path = FileHelper::upload('image', 'posts', $request->input('name'), $post->image)) ? $path : $post->image;

        if ($rs = $post->update($data)) {

            //Update pivot
            $post->categories()->sync($request->input('cate_id', []));

            session()->flash('success', __('admin/posts.updated_success'));
            if ($data['is_continue']) {
                return back();
            } else {
                return redirect()->route('admin.posts.index', ['locale' => $request->input('locale')]);
            }
        } else {
            session()->flash('error', __('admin/posts.updated_fail'));
            return back()->withInput();
        }
    }


    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        if ($rs = $post->delete()) {
            session()->flash('success', __('admin/global.deleted_success'));
        } else {
            session()->flash('error', __('admin/global.error_while_delete'));
        }

        return back();
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete($id = 0)
    {
        if ($post = Post::findOrFail($id)) {
            return $this->destroy($post);
        } else {
            session()->flash('error', __('global.data_not_found'));
            return back();
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bulkDestroy()
    {
        $ids = \request('checked_ids');

        if (empty($ids)) {
            session()->flash('warning', __('admin/global.have_no_records_to_delete'));
        }
        else if (Post::destroy($ids)) {
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
        }
        else if (Post::bulkShowDisplayStatus($ids)) {
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
        }
        else if (Post::bulkHideDisplayStatus($ids)) {
            session()->flash('success', __('admin/global.hidden_selected_records_success'));
        } else {
            session()->flash('error', __('admin/global.hidden_selected_records_fail'));
        }

        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    //Chuyển vào model, truyền tham số là id của record
    public function deleteFile($id)
    {
        $rs = Post::deleteFile($id);

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
