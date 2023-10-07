<?php
// app/Http/Controllers/Admin/CategoriesController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a paginated list of categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "Categories List";
        $categories = Category::where('is_deleted', false)->paginate(10);

        return view('admin.categories.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $title = "Create New Category";
        return view('admin.categories.create', compact('title'));
    }

    /**
     * Store a newly created category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string|min:1|max:100',
        ]);

        try {
            Category::create($valid);
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => 'New Category Could Not be Added!'
            ];
            return redirect('/admin/categories')->with('flash', $flash);
        }

        $flash = [
            'type' => 'success',
            'message' => 'New Category Successfully Added!'
        ];
        return redirect('/admin/categories')->with('flash', $flash);
    }

    /**
     * Display the specified category.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        $title = "Category Detail";
        $category = Category::find($id);
        if (!$category) {
            return redirect('/admin/categories')->with('flash', [
                'type' => 'danger',
                'message' => 'Category not found!'
            ]);
        }

        return view('admin.categories.show', compact('category', 'title'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $title = "Edit Category";
        $category = Category::find($id);
        if (!$category) {
            return redirect('/admin/categories')->with('flash', [
                'type' => 'danger',
                'message' => 'Category not found!'
            ]);
        }

        return view('admin.categories.edit', compact('category', 'title'));
    }

    /**
     * Update the specified category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $valid = $request->validate([
            'name' => 'required|string|min:1|max:100',
        ]);

        if (Category::where('id', $id)->update($valid)) {
            $flash = [
                'type' => 'success',
                'message' => "Category with ID: {$id} Successfully Updated"
            ];
            return redirect('/admin/categories')->with('flash', $flash);
        } else {
            $flash = [
                'type' => 'danger',
                'message' => "Category with ID: {$id} Update Failed!!"
            ];
            return redirect('/admin/categories')->with('flash', $flash);
        }
    }

    /**
     * Soft delete the specified category from the database.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return back()->with('flash', [
                'type' => 'danger',
                'message' => "Record Does Not Exist in Database"
            ]);
        }

        try {
            // Soft delete by setting 'is_deleted' = true
            $category->update(['is_deleted' => true]);
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => "Failed!!! Make sure related data does not exist in the database !!!"
            ];
            return back()->with('flash', $flash);
        }

        $flash = [
            'type' => 'success',
            'message' => "Category with ID: {$id} Successfully Soft Deleted"
        ];
        return back()->with('flash', $flash);
    }

    /**
     * Search categories based on the provided search key.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search_key = $request['search'];
        if ($search_key == '') {
            return redirect('/admin/categories');
        }
        $title = "Categories List";
        //Get all categories
        //then filter cars, filter for related brand name or category
        $categories = Category::where('is_deleted', false)
                    ->where('name', 'like', '%' . $search_key . '%')
                    ->paginate(10);
        if (count($categories) > 0) {
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
        return view('admin.categories.index', compact('title', 'categories'))->with('flash', $flash);
    }
}
