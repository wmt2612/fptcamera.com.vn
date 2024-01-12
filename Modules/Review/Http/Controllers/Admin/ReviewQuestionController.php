<?php

namespace Modules\Review\Http\Controllers\Admin;

use Modules\Review\Entities\Review;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Review\Entities\ReviewQuestion;

class ReviewQuestionController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = ReviewQuestion::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'review::review_questions.review_question';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'review::admin.review_questions';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    // protected $validation = UpdateReviewRequest::class;

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // dd($this->getResourceName());
        $data = array_merge([
            'tabs' => TabManager::get('review_questions'),
            $this->getResourceName() => $this->getModel(),
        ], $this->getFormData('create'));

        return view("{$this->viewPath}.create", $data);
    }

    public function edit($id)
    {
        $review_question = ReviewQuestion::findOrFail($id);

        $tabs = TabManager::get('review_questions');

        return view('review::admin.review_questions.edit', compact('review_question', 'tabs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Destroy resources by given ids.
     *
     * @param string $ids
     * @return void
     */
    public function destroy($ids)
    {
        Review::
            whereIn('id', explode(',', $ids))
            ->delete();
    }
}
