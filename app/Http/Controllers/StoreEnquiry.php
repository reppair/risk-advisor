<?php

namespace App\Http\Controllers;

use App\Enum\ContactPreference;
use App\Models\Customer;
use App\Models\Enquiry;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreEnquiry extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = collect($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:14',
            'address' => 'required|string|max:255',
            'contact_preference' => ['required', 'string', Rule::in(ContactPreference::valuesToArray())],
            'message' => 'nullable|string|max:500',
            'product_ids' => 'required|array|min:1|max:3',
            'products.*' => 'int|exists:products,id'
        ]));

        $message = $data->pull('message');

        $products = Product::whereIn('id', $data->pull('product_ids'))->get();

        $customer = Customer::create($data->toArray()); // use updateOrCreate via email to create multiple enquiries for the same customer?

        $enquiry = Enquiry::make(compact('message'));
        $enquiry->customer()->associate($customer);
        $enquiry->save();
        $enquiry->products()->sync($products);

        session()->flash('message', 'All done. We will be contacting you soon!');

        return redirect()->back();
    }
}
