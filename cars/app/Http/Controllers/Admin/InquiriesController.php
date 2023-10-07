<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiriesController extends Controller
{
    /**
     * Display a paginated list of inquiries.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "Inquiries List";
        $inquiries = Inquiry::where("is_deleted", false)->orderBy('id', 'desc')->paginate(10);
        return view('admin.inquiries.index', compact('title', 'inquiries'));
    }

    /**
     * Show the details of a specific inquiry.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $title = "Inquiries List";
        $inquiry = Inquiry::find($id);
        return view('admin.inquiries.show', compact('title', 'inquiry'));
    }

    /**
     * Show the form for creating a new inquiry.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $title = "Inquiry Register";
        return view('admin.inquiries.create', compact('title'));
    }

    /**
     * Show the form for editing a specific inquiry.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $title = "Inquiry";
        $inquiry = Inquiry::find($id);
        return view('admin.inquiries.edit', compact('title', 'inquiry'));
    }

    /**
     * Store a newly created inquiry in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string|min:1|max:255',
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required|string|min:2|max:15',
            'subject' => 'required|string|min:2|max:255',
            'description' => 'required|string',
        ]);

        try {
            Inquiry::create($valid);
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => 'New Inquiry Could Not be Added!'
            ];
            return redirect('/admin/inquiries')->with('flash', $flash);
        }
        $flash = [
            'type' => 'success',
            'message' => 'New Inquiry Successfully Added!'
        ];
        return redirect('/admin/inquiries')->with('flash', $flash);
    }

    /**
     * Update a specific inquiry in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $valid = $request->validate([
            'name' => 'required|string|min:1|max:255',
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required|string|min:2|max:15',
            'subject' => 'required|string|min:2|max:255',
            'description' => 'required|string',
        ]);
        if (Inquiry::where('id', $id)->update($valid)) {
            $flash = [
                'type' => 'success',
                'message' => "Inquiry with id: {$id} Successfully Updated"
            ];
            return redirect('/admin/inquiries')->with('flash', $flash);
        } else {
            $flash = [
                'type' => 'danger',
                'message' => "Inquiry with id: {$id} Update Failed!!"
            ];
            return redirect('/admin/inquiries')->with('flash', $flash);;
        }
    }

    /**
     * Soft delete a specific inquiry from the database.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $inquiry = Inquiry::find($id);
        if (empty($inquiry)) {
            $flash = [
                'type' => 'danger',
                'message' => "Record Does Not Exist in Database"
            ];
            return back()->with('flash', $flash);
        }
        try {
            $inquiry->update(['is_deleted' => true]);
            $flash = [
                'type' => 'success',
                'message' => "Inquiry with id: {$id} Successfully Deleted"
            ];
            return back()->with('flash', $flash);
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => "Failed!!! Make sure related data does not exist on the database !!!"
            ];
            return back()->with('flash', $flash);
        }
    }

    /**
     * Search inquiries based on the provided search key.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search_key = $request['search'];
        if ($search_key == '') {
            return redirect('/admin/inquiries');
        }
        $title = 'Inquiries List';
        $inquiries = Inquiry::where('is_deleted', false)
            ->where('name', 'like', '%' . $search_key . '%')
            ->orWhere('email', 'like', '%' . $search_key . '%')
            ->orWhere('phone', 'like', '%' . $search_key . '%')
            ->orWhere('subject', 'like', '%' . $search_key . '%')
            ->paginate(10);

        if (count($inquiries) > 0) {
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
        return view('admin.inquiries.index', compact('title', 'inquiries'))->with('flash', $flash);
    }
}
