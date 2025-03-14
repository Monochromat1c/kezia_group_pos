<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function list()
    {
        // Fetch all users from the users table in the database
        $users = User::join('genders', 'users.gender_id', '=', 'genders.gender_id')
        ->orderBy('users.first_name', 'asc')
        ->paginate();
        $users = User::with('gender')->orderBy('user_id')->paginate();


         // Return to the user list module with the users value
          return view('user.list', compact('users'));
    }

    public function login(){
        return view ('login.login');
    }

    public function processLogin(Request $request){
        $validated = $request->validate([
            'username' => ['required', 'max:12'],
            'password' => ['required', 'max:15']
        ]);

        $user = User::where('username',  $validated['username'])->first();

        if($user && auth()->attempt($validated)) {
            auth()->login($user);
            $request->session()->regenerate();

            return redirect ('/home');
        } else {
        return back()-> with('message_success', 'Username or Password Invalid.');
        }
    }

    public function create()
    {
        // Call gender model
        $genderModel = new Gender();
        $roleModel = new Role();
        
        // Fetch all gender values from the gender table in the database
        $genders = $genderModel->get(); 

        // Fetch all role values from the roles table in the database
        $roles = $roleModel->get();
        
        // Return to the add user module with gender and role values
        return view('user.create', ['genders' => $genders, 'roles' => $roles]);
    }

    public function store(Request $request)
{
    if ($request->isMethod('post')) {
        
        // Validate the request data
        $validated = $request->validate([
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'suffix_name' => ['nullable'],
            'birth_date' => ['required', 'date'],
            'gender_id' => ['required'],
            'address' => ['required'],
            'contact_number' => ['required'],
            'email_address' => ['required', 'email', 'unique:users,email_address'],
            'role_id' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'password' => ['required'],
            'confirm_password' => ['required_with:password', 'same:password'],
            'user_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $validated['password'] = sha1($validated['password']);

        if ($request->hasFile('user_image')) {
            $fileNameWithExtension = $request->file('user_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('user_image')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('user_image')->storeAs('public/img/user', $filenameToStore);
            $validated['user_image'] = $filenameToStore; // Only store the file name
        } else {
            $validated['user_image'] = null; // Handle default in the view
        }

        $userModel = new User();
        $userModel->create($validated);

        return redirect('/users')->with('message_success', 'User Successfully Saved!');
    }

}
    //EDIT------------//
    public function edit($id)
    {
        $user = User::findOrFail($id);  // Ensure we get a valid user or fail
        $genders = Gender::all();
        $roles = Role::all();
        return view('user.edit', compact('user', 'genders', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'user_image' => 'nullable|mimes:jpeg,png,bmp,gif|max:4096',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'suffix_name' => 'nullable',
            'birth_date' => 'required|date',
            'gender_id' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required|email|unique:users,email_address,'.$user->user_id.',user_id',
            'role_id' => 'required',
            'username' => 'required|unique:users,username,'.$user->user_id.',user_id',
            'old_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed'
        ]);

        // Handle password change
        if (!empty($validated['old_password'])) {
            if (!Hash::check($validated['old_password'], $user->password)) {
                return back()->withErrors(['old_password' => 'The provided password does not match your current password.']);
            }

            $validated['password'] = Hash::make($validated['new_password']);
        }

        if ($request->hasFile('user_image')) {
            $fileNameWithExtension = $request->file('user_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('user_image')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('user_image')->storeAs('public/img/user', $filenameToStore);
            $validated['user_image'] = $filenameToStore;
        }

        $user->update($validated);

        return redirect('/users')->with('message_success', 'User Successfully Updated.');
    }


    //DELETEE--------------//

    public function delete($id){
        $user = User::find($id);
        return view ('user.delete', compact('user'));
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete($request);

        return redirect('/users')-> with ('message_success', 'User Successfully deleted.');

    }


    public function show($id){
        $users = User::find($id); //Select * FROM users WHERE user_id = id;

        return view('user.show', compact('users'));
    }

    public function logout()
    {
        return view ('logout.logout');
    }
    public function processLogout(Request $request)
    {
        auth()->logout();

        $request-> session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}