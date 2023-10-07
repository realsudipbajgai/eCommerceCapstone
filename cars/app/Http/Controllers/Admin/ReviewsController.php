<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

/**
 * Class ReviewsController
 * @package App\Http\Controllers\Admin
 */
class ReviewsController extends Controller
{
    /**
     * Display a listing of the reviews.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "Reviews List";
        $reviews = Review::where('is_deleted', false)->paginate(10);
        return view('admin.reviews.index', compact('title', 'reviews'));
    }

    /**
     * Display the specified review.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        $title = "Review Detail";
        $review = Review::where('id', $id)->first();
        return view('admin.reviews.show', compact('title', 'review'));
    }

    /**
     * Show the form for editing the specified review.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $title = "Edit Review";
        $review = Review::where('id', $id)->first();
        return view('admin.reviews.edit', compact('title', 'review'));
    }

    /**
     * Update the specified review in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $valid = $request->validate([
            'comment' => 'required|string|min:1|max:255',
        ], [
            'comment.required' => 'Comment is required',
        ]);

        $review = Review::find($id);
        if (empty($review)) {
            $flash = [
                'type' => 'danger',
                'message' => "Record Does Not Exist in Database",
            ];
            return back()->with('flash', $flash);
        }

        try {
            $review->update($valid);
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => "Review with ID: {$id} Update Failed!!",
            ];
            return back()->with('flash', $flash);
        }

        $flash = [
            'type' => 'success',
            'message' => "Review with ID: {$id} Successfully Updated",
        ];
        return redirect('/admin/reviews')->with('flash', $flash);
    }

    /**
     * Remove the specified review from storage.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);
        if (empty($review)) {
            $flash = [
                'type' => 'danger',
                'message' => "Record Does Not Exist in Database",
            ];
            return back()->with('flash', $flash);
        }

        try {
            $review->update(['is_deleted' => true]);
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => "Failed!!! Make sure related data does not exist in the database !!!",
            ];
            return back()->with('flash', $flash);
        }

        $flash = [
            'type' => 'success',
            'message' => "Review with ID: {$id} Successfully Deleted",
        ];
        return back()->with('flash', $flash);
    }

    /**
     * Search for reviews based on the provided search key.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search_key = $request['search'];
        if ($search_key == '') {
            return redirect('/admin/reviews');
        }
        $title = 'Reviews List';
        $reviews = Review::where('is_deleted', false)
            ->where('comment', 'like', '%' . $search_key . '%')
            ->orWhereHas('user', function ($q) use ($search_key) {
                $q->where('first_name', 'like', '%' . $search_key . '%')
                    ->where('last_name', 'like', '%' . $search_key . '%');
            })
            ->orWhereHas('car', function ($q) use ($search_key) {
                $q->where('make', 'like', '%' . $search_key . '%')
                    ->orWhere('model', 'like', '%' . $search_key . '%')
                    ->orWhereHas('brand', function ($q) use ($search_key) {
                        $q->where('name', 'like', '%' . $search_key . '%');
                    });
            })->paginate(10);

        if (count($reviews) > 0) {
            $flash = [
                'type' => 'success',
                'message' => "Search result for: \"{$search_key}\"",
            ];
        } else {
            $flash = [
                'type' => 'danger',
                'message' => "No result found for: \"{$search_key}\"",
            ];
        }
        return view('admin.reviews.index', compact('title', 'reviews'))->with('flash', $flash);
    }
}
