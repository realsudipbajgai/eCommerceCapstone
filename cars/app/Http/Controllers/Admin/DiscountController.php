<?php

// app/Http/Controllers/Admin/DiscountController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a paginated list of promo codes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "Promo Code List";
        $discounts = Discount::where('is_deleted', false)->paginate(10);
        return view('admin.discounts.index', compact('title', 'discounts'));
    }

    /**
     * Show the form for creating a new promo code.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.discounts.create');
    }

    /**
     * Store a newly created promo code in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'promo_code' => 'required|unique:discounts,promo_code|min:6|max:6',
            'discount_percentage' => 'required|numeric',
        ]);

        $discount = new Discount();
        $discount->promo_code = $request->input('promo_code');
        $discount->discount_percentage = $request->input('discount_percentage');
        $discount->is_used = false;
        $discount->is_deleted = false;
        $discount->save();

        $flash = [
            'type' => 'success',
            'message' => "Successfully Created",
        ];
        return redirect('/admin/discounts')->with('flash', $flash);
    }

    /**
     * Show the form for editing the specified promo code.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\View\View
     */
    public function edit(Discount $discount)
    {
        return view('admin.discounts.edit', compact('discount'));
    }

    /**
     * Update the specified promo code in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'promo_code' => 'required|unique:discounts,promo_code,' . $discount->id,
            'discount_percentage' => 'required|numeric|min:0',
        ]);

        $discount->promo_code = $request->input('promo_code');
        $discount->discount_percentage = $request->input('discount_percentage');
        $discount->save();

        $flash = [
            'type' => 'success',
            'message' => "Successfully Updated",
        ];
        return redirect('/admin/discounts')->with('flash', $flash);
    }

    /**
     * Soft delete the specified promo code from the database.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Discount $discount)
    {
        $discount->is_deleted = 1;
        $discount->save();
        $flash = [
            'type' => 'success',
            'message' => "Successfully deleted",
        ];
        return redirect('/admin/discounts')->with('flash', $flash);
    }

    /**
     * Display the specified promo code details.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\View\View
     */
    public function show(Discount $discount)
    {
        $title = "Discount Detail";
        return view('admin.discounts.show', compact('discount', 'title'));
    }

    /**
     * Search promo codes based on the provided search key.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search_key = $request['search'];
        if ($search_key == '') {
            return redirect('/admin/discounts');
        }
        $title = "Promo Code List";
        $discounts = Discount::where('is_deleted', false)
            ->Where('promo_code', 'like', '%' . $search_key . '%')
            ->orWhere('discount_percentage', 'like', '%' . $search_key . '%')
            ->paginate(10);
        if (count($discounts) > 0) {
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
        return view('admin.discounts.index', compact('title', 'discounts'))->with('flash', $flash);
    }
}
