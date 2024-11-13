<?php

namespace Modules\Rating\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Rating\Entities\Rating;
use Modules\Rating\Http\Requests\Admin\UpdateReviewRequest;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('user')->latest()
            ->paginate(10);
        return view('rating::pages.index', compact('ratings'));
   }

    public function updateStatus($ratingId)
    {
        $rating = Rating::findOrFail($ratingId);
        $rating->update([
            Rating::STATUS => $rating->status != 1 ? Rating::APPROVED : Rating::REJECTED
        ]);
        return $rating;
    }

    public function update(UpdateReviewRequest  $request, $ratingId)
    {
        $rating = Rating::findOrFail($ratingId);
        $rating->update($request->all());
        return response()->json($rating);
    }

    public function delete($id)
    {
        Rating::findOrFail($id)->delete();
        return back();
    }
}
