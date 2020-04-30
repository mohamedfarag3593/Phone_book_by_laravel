<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneRequest;
use Illuminate\Http\Request;
use App\Phone;
use Illuminate\Support\Facades\Auth;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::where('user_id',Auth::id())->get();
        return view('phones.index', ['phones' => $phones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        $phone = new Phone;
        $phone->phone = $request->phone;
        $phone->user_id = Auth::id();
        $phone->save();
        return redirect()->route('phones.index');
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
        $phone = Phone::findOrFail($id);
        return view('phones.edit', ['phone' => $phone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, $id)
    {
        $phone = Phone::findOrFail($id);
        $phone->phone = $request->phone;
        $phone->save();
        return redirect()->route('phones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::findOrFail($id);
        $phone->delete();
        return redirect()->route('phones.index');
    }
}
