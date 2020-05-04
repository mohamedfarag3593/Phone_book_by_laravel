<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $contacts_ids=DB::table('contacts')->where('user_id',Auth::id())->pluck('contact_id');        
        // $contacts_ids=User::find(Auth::id())->contacts()->pluck('contact_id'); 
        // $all_contacts=User::with('phones')->whereIn('id',$contacts_ids)->get();       
        $all_contacts=User::find(Auth::id())->contacts()->with('phones')->get();            
                
        return view('contacts.index',['contacts'=>$all_contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::select('username')->where('id','!=',Auth::id())->pluck('username');
        // dd($users);
        return view('contacts.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact_id=User::where([['username',$request->username],['id','!=',Auth::id()]])->first();        
        if (!$contact_id){
            return redirect()->back()->with('error','Contact not found');
        }
        $contact=User::find(Auth::id())->contacts()->syncWithoutDetaching($contact_id->id);        
        if(empty($contact['attached'])){
            return redirect()->back()->with('error','Contact already exists');
        }else{
            return redirect()->route('contacts.index')->with('success','Contact has been added successfully');
        }        
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
        User::findOrFail(Auth::id())->contacts()->detach($id);        
        return redirect()->route('contacts.index')->with('success','contact deleted successfully');
    }
}
