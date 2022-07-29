<?php

namespace App\Http\Controllers\Private\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = User::where('role', 'toko')->where('status', 1)->with('toko')->get();
        return view('private.admin.sellers.valid', compact('sellers'));
    }
    public function invalidseller ()
    {
        $sellers = User::where('role', 'toko')->where('status', null)->with('toko')->get();
        return view('private.admin.sellers.invalid', compact('sellers'));
    }
    public function frozenseller ()
    {
        $sellers = User::where('role', 'toko')->where('status', '>', 1 )->with('toko')->get();
        return view('private.admin.sellers.froen', compact('sellers'));
    }
    public function makefrozen($id)
    {
        $seller = User::findOrFail($id);
        $seller->status = $seller->status + 2;
        $seller->save();
        return redirect()->back()->with('success', 'Seeler dibekukan');
    }
    public function makevalid($id)
    {
        $seller = User::findOrFail($id);
        $seller->status = 1;
        $seller->save();
        return redirect()->back()->with('success', 'Seeler Divalidasi');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
