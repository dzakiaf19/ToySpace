<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Product!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $admin = User::role('admin')->get()->reverse();
        return view('admin.page.users', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.page.add_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^8[1-9][0-9]{6,10}$/', 'string', 'min:9', 'max:11', Rule::unique('users')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
            'birthdate' => ['required'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $createAdmin = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $createAdmin->assignRole('admin');

        event(new Registered($createAdmin));

        return redirect()->route('admin.index')->with('success', 'Admin added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        return view('admin.page.view_user', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        return view('admin.page.edit_user', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^8[1-9][0-9]{6,10}$/', 'string', 'min:9', 'max:11', Rule::unique('users')->ignore($admin->id)->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
            'birthdate' => ['required'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($admin->id)->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
        ]);

        $admin->fill([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'email' => $request->email
        ]);

        $admin->save();

        return Redirect::route('admin.index')->with('status', 'admin-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully');
    }

    public function editPassword()
    {
        $admin = Auth::user();
        return view('admin.page.updatePassword', compact('admin'));
    }
    
    public function updatePassword(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        toast('Password berhasil diupdate!', 'success');

        return back()->with('status', 'password-updated');
    }
}
