<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAddress;

class UserAddressController extends Controller
{
    public function index(Request $request)
    {   
        return view('user_address.index', [
            'addresses' => $request->user()->address,
        ]);

        // $addresses = UserAddress::get();
        // return view('user_addresses.index', compact('addresses'));
    }
}
