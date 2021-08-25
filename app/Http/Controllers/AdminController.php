<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ContactGroup;
use App\Imports\ContactsImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Models\Group;
use App\Models\Contact;
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
     */
    public function index()
    {
        return view('admin.index');
    }

    // admin=> upload contact  
public function uploadContact(){
    $contacts = DB::table('contacts')->get();
    return view('admin.contacts.upload',compact('contacts'));
}

public function importContact(Request $request){
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);
    try {
        Excel::import(new ContactsImport,request()->file('file'));
        $users_id = request()->get('users_id');

        return redirect()->route('admin.upload_contact')->with(['users_id' => $users_id])->with('success', 'List of contacts imported successfully');
    
    } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        $failures = $e->failures();
        
        foreach ($failures as $failure) {
            $failure->row(); // row that went wrong
            $failure->attribute(); // either heading key (if using heading row concern) or column index
            $failure->errors(); // Actual error messages from Laravel validator
            $failure->values(); // The values of the row that has failed.
        }
        foreach($failure->errors() as $error){
        $the_error = $error;
        }
        return redirect()->back()->with('error', 'There was an error on row'.$failure->row().' '.$the_error );

    }
}


// admin=> add contact
public function addContact(){
    $users = DB::table('users')->get();
    $contacts = DB::table('contacts')->get();
    return view('admin.contacts.create', compact('users', 'contacts'));
}
public function viewContact(){
    $contacts = DB::table('contacts')->get();
    return view('admin.contacts.view', compact('contacts'));
}

//store contact
public function storeContact(Request $request){
    $contacts = DB::table('contacts')->insert([
        'users_id' => $request->user_id,
        'users_name' => DB::table('users')->where('id', $request->user_id)->value('name'),
        'users_phone' => DB::table('users')->where('id', $request->user_id)->value('phone'),
    ]);
    return redirect()->back()->with('success', 'contact added Successfully');
}


 // admin=> group
public function createGroup(){
    //display groups
$groups = DB::table('groups')->get();
    //display groups with contact list
    $contact_groups = DB::table('contact_group')->get();
//display contacts
$contacts = DB::table('contacts')->get();
    return view('admin.groups.create', compact('groups','contacts', 'contact_groups'));
}
public function viewGroupContact(){
    //display groups with contact list
$contact_groups = DB::table('contact_group')->get();
    return view('admin.groups.view', compact('contact_groups'));
}

//store group
public function storeGroup(Request $request){
    $groups = DB::table('groups')->insert([
        'name' => $request->name,
        'description' => $request->description,
    ]);
    return redirect()->back()->with('success', 'Group added Successfully');
}

//view groups
public function viewGroupList(){
    $messages = DB::table('groups')->first();
    return view('admin.sms.view', compact('messages'));
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
        'name' => $request->input('name'),
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
 // admin=> Send Sms To Contacts
public function sendSms(){
    $groups = DB::table('groups')->get();
    $contacts = DB::table('contacts')->get();
    $messages = DB::table('sms')->get();
    
    return view('admin.sms.send_sms', compact('groups','messages','contacts'));
}

// admin=> Send Sms To groups
public function sendGroupSms(){
    $groups = DB::table('groups')->get();
    $contacts = DB::table('contacts')->get();
    $messages = DB::table('sms')->get();
    
    return view('admin.sms.send_group_sms', compact('groups','messages','contacts'));
}

//store sms
public function storeSms(Request $request){
    //request the selected field
    $groups = $request->input('group');
    $contacts = $request->input('contact');
    if ($groups) {
    foreach($groups as $group)
    {
        $request->validate([
            'Ccontact_id' =>  ['nullable'
                             ],
            'contact_name' =>  ['nullable'
                                   
                            ],
         ]);
        $messages = DB::table('sms')->Insert(
        [
            'group_id' => $group,
            'group_name' => DB::table('contact_group')->where('group_id', $group)->value('group_name'),
            
            'sms_title' => $request->sms_title,
            'sms_body' => $request->sms_body,
            'created_at' => now(),
        ]);
    }
}
else
if ($contacts){
foreach($contacts as $contact)
{
    $messages = DB::table('sms')->Insert(
    [
        'contact_id' => $contact,
        'contact_name' => DB::table('contact_group')->where('contact_id', $contact)->value('contact_name'),
        'sms_title' => $request->sms_title,
        'sms_body' => $request->sms_body,
        'created_at' => now(),
    ]);
}
}
    return redirect()->back()->with('success', 'Sms Saved Successfully');
}

//view sms
public function viewSms($id){
    $messages = DB::table('sms')->where('id', $id)->get();

    return view('admin.sms.view', compact('messages'));
}


// admin=> store group contact
public function assignContact(Request $request){
     // request the field selected
     $contacts = $request->input('contact');
     if ($contacts) {
     foreach($contacts as $contact){
        DB::table('contact_group')->updateOrInsert(
            [
            'contact_id' => $contact,
            'group_id' => $request->group_id
            ],
            [ //skip if contact exists
        'contact_id' => $contact,
        'contact_name' => Contact::where('id',$contact )->value('users_name'),
        'contact_phone' => Contact::where('id', $contact)->value('users_phone'),
        'group_id' => $request->group_id,
        'group_name' => Group::where('id', $request->group_id)->value('name')
    ]);
}
}
    return redirect()->back()->with('success', 'Contact Added Successfully');
}

public function viewOneGroup($id){
    //display a particular group
$contact_groups = DB::table('contact_group')->where('group_id', $id)->get();
$group_name = DB::table('contact_group')->where('group_id', $id)->value('group_name');

return view('admin.groups.oneview', compact('contact_groups','group_name'));
}



}

