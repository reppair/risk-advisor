<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreEnquiry extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:14',
            'address' => 'required|string|max:255',
            'message' => 'nullable|string|max:500',
            'product_ids' => 'required|array|min:1|max:3',
            'products.*' => 'int|exists:products,id'
        ]);

    }
}
