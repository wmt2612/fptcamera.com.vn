<?php

namespace Modules\Comment\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Comment\Entities\Comment;
use Modules\Comment\Http\Requests\SaveCommentsRequest;

class CommentsController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'comment::comments.comments';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'comment::admin.comments';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveCommentsRequest::class;

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        $tabs = TabManager::get('comment');

        return view('comment::admin.comments.edit', compact('comment', 'tabs'));
    }

    public function update($id, Request $request)
    {
        $comment = Comment::withoutGlobalScope('approved')->findOrFail($id);
        // dd($request->all());
        $data = array_merge($comment->toArray(), $request->all());
        $data = Arr::except($data, [
                                    'created_at', 
                                    'updated_at', 
                                    '_method',
                                    '_token',
                                ]);
        // dd($data);
        $comment->update($data);

        return back()->withSuccess(trans('admin::messages.resource_saved', ['resource' => $this->getLabel()]));
    }
}
