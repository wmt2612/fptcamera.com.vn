<?php

namespace Modules\Review\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Modules\Review\Entities\Review;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Review\Http\Requests\UpdateReviewRequest;

class ReviewController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'review::reviews.review';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'review::admin.reviews';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = UpdateReviewRequest::class;

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::withoutGlobalScope('approved')->findOrFail($id);

        $tabs = TabManager::get('reviews');

        return view('review::admin.reviews.edit', compact('review', 'tabs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $review = Review::withoutGlobalScope('approved')->findOrFail($id);
        $data = array_merge($review->toArray(), $request->all());
        $data = Arr::except($data, ['created_at',
                                    'updated_at',
                                    'rating_percent',
                                    'created_at_formatted',
                                    '_method',
                                    '_token',
                                ]);
        $review->update($data);

        if($request->comment_replay)
        {
            if(is_null($review->children))
            {
                Review::create([
                    'reviewer_id' => auth()->id(),
                    'parent_id' => $review->id,
                    'product_id' => $review->product_id,
                    'reviewer_name' => auth()->user()->full_name,
                    'reviewer_email' => auth()->user()->email,
                    'comment' => $request->comment_replay,
                    'rating' => 5,
                    'is_approved' => 1
                ]);
            }else{
                $review->children()->update([
                    'comment' => $request->comment_replay
                ]);
            }
        }

        return back()->withSuccess(trans('admin::messages.resource_saved', ['resource' => $this->getLabel()]));
    }

    /**
     * Destroy resources by given ids.
     *
     * @param string $ids
     * @return void
     */
    public function destroy($ids)
    {
        Review::withoutGlobalScope('approved')
            ->whereIn('id', explode(',', $ids))
            ->delete();
    }
}
