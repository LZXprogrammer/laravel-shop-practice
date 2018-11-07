<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Http\Requests\UserAddressRequest;

class UserAddressController extends Controller
{
    /**
     * @param Request $rquest
     * 
     * 收货地址列表
     */
    public function index(Request $request)
    {   
        return view('user_address.index', [
            'addresses' => $request->user()->address,
        ]);

        // $addresses = UserAddress::get();
        // return view('user_addresses.index', compact('addresses'));
    }

    /**
     * 新增添加收货地址页面
     */
    public function create()
    {
        return view('user_address.create_and_edit', ['address' => new UserAddress()]);
    }

    /**
     * 添加收货地址，入库
     */
    public function store(UserAddressRequest $request)
    {
        $request->user()->address()->create($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));

        return redirect()->route('user_address.index');
    }

    /**
     * 新增修改收货地址页面
     * 
     * @param Model $user_address
     */
    public function edit(UserAddress $user_address)
    {
        return view('user_address.create_and_edit', ['address' => $user_address]);
    }

    /**
     * 修改收货地址
     */
    public function update(UserAddress $user_address, UserAddressRequest $request)
    {
        $user_address->update($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));

        return redirect()->route('user_address.index');
    }



}
