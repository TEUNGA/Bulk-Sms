<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    // admin=> add contact  
public function uploadContact(){
    
    return view('admin.contacts.upload');
}

public function viewContact(){
    
    return view('admin.contacts.view');
}


 // admin=> group
public function createGroup(){
    //display groups
$groups = DB::table('groups')->get();
    return view('admin.groups.create', compact('groups'));
}
public function viewGroup(){
    //display groups
$groups = DB::table('groups')->get();
    return view('admin.groups.view');
}

//store group
public function storeGroup(Request $request){
    $groups = DB::table('groups')->insert([
        'name' => $request->name,
        'description' => $request->description,
    ]);
    return redirect()->back()->with('success', 'Group added Successully');
}

//edit group
public function updateGroup(Request $request, $id){
    //validation
    $request->validate([
        'name' =>  ['required', 
                          Rule::unique('groups')->ignore($id, 'id')
                                
                         ],
        'description' =>  ['nullable'
                               
                        ],
     ]);

    //get the groups  update 
    $groups = DB::table('groups')->where('id', $id)->update([

        'name' => $request->get('name'),
        'description' => $request->get('description'),    
    ]);
     return redirect()->back()->with('success', 'Group updated successfully');

}

//delete group
public function deleteGroup(Request $request, $id){
    //get the group delete
    $group = DB::table('groups')->where('id', $id)->delete();
     return redirect()->back()->with('success', 'group deleted successfully');

}

 // admin=> Sms
public function sendSms(){
    
    return view('admin.sms.send_sms');
}
public function viewSms(){
    
    return view('admin.sms.view');
}

}

