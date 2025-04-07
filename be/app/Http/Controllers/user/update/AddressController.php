<?php

namespace App\Http\Controllers\User\Update;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function setDefault($id)
    {

        $user = Auth::user();

        Address::where('user_id', $user->id)->update(['is_default' => 'no']);
        $address = Address::where('id', (int)$id)->where('user_id', $user->id)->firstOrFail();
        $address->is_default = 'yes';
        $address->save();

        return response()->json(['message' => 'Đã chọn địa chỉ mặc định']);
    }
    public function getselect()
    {
        $user = Auth::user();
        $id = $user->id;
        $addresses = Address::where('user_id', $id)->get();
        $getselect = Address::where('user_id', $id)->where('is_default', 'yes')->first();
        return response()->json(['addresses' => $addresses, 'adselect' => $getselect]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
