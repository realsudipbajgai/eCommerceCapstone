<?php
// app/Http/Controllers/Admin/UsersController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Province;

/**
 * Class UsersController
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "Users List";
        $users = User::where('is_deleted', false)->paginate(10);

        return view('admin.users.index', compact('title', 'users'));
    }

    /**
     * Display the specified user.
     *
     * @param string $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(string $id)
    {
        $title = "User Detail";
        $user = User::find($id);

        if (!$user) {
            return redirect('/admin/users')->with('flash', [
                'type' => 'danger',
                'message' => 'User not found!'
            ]);
        }

        return view('admin.users.show', compact('user', 'title'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param string $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(string $id)
    {
        $title = "Edit User";
        $user = User::find($id);

        if (!$user) {
            return redirect('/admin/users')->with('flash', [
                'type' => 'danger',
                'message' => 'User not found!'
            ]);
        }

        $provinces = Province::all()->pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'title', 'provinces'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $valid = $request->validate([
            'first_name' => 'required|string|min:1|max:100',
            'last_name' => 'required|string|min:1|max:100',
            'country' => 'required|string|min:1|max:100',
            'street' => 'required|string|min:1|max:100',
            'city' => 'required|string|min:1|max:100',
            'province_id' => 'required|integer',
            'postal_code' => 'required|string|min:1|max:100',
            'phone' => 'required|string|min:1|max:100',
            'email' => 'required|string|email|max:255',
        ], [
            'province_id.required' => 'Province is required'
        ]);

        if (User::where('id', $id)->update($valid)) {
            $flash = [
                'type' => 'success',
                'message' => "User with ID: {$id} Successfully Updated"
            ];
            return redirect('/admin/users')->with('flash', $flash);
        } else {
            $flash = [
                'type' => 'danger',
                'message' => "User with ID: {$id} Update Failed!!"
            ];
            return redirect('/admin/users')->with('flash', $flash);
        }
    }

    /**
     * Soft delete the specified user from storage.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('flash', [
                'type' => 'danger',
                'message' => "Record Does Not Exist in Database"
            ]);
        }

        try {
            // Soft delete by setting 'is_deleted' = true
            $user->is_deleted = true;
            $user->save();
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => "Failed!!! Make sure related data does not exist in the database !!!"
            ];
            return back()->with('flash', $flash);
        }

        $flash = [
            'type' => 'success',
            'message' => "User with ID: {$id} Successfully Soft Deleted"
        ];
        return back()->with('flash', $flash);
    }

    /**
     * Search Users by User Name or related details.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search_key = $request['search'];
        if ($search_key == '') {
            return redirect('/admin/users');
        }
        $title = 'Users List';
        $users = User::where('is_deleted', false)
            ->where('first_name', 'like', '%' . $search_key . '%')
            ->orWhere('last_name', 'like', '%' . $search_key . '%')
            ->orWhere('email', 'like', '%' . $search_key . '%')
            ->orWhere('country', 'like', '%' . $search_key . '%')
            ->orWhere('city', 'like', '%' . $search_key . '%')
            ->orWhere('street', 'like', '%' . $search_key . '%')
            ->orWhereHas('province', function ($q) use ($search_key) {
                $q->where('name', 'like', '%' . $search_key . '%');
            })
            ->orWhere('postal_code', 'like', '%' . $search_key . '%')
            ->orWhere('phone', 'like', '%' . $search_key . '%')
            ->paginate(10);

        if (count($users) > 0) {
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
        return view('admin.users.index', compact('title', 'users'))->with('flash', $flash);
    }
}
