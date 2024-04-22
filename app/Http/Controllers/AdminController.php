<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
        $createAdmin = new CreateNewUser;
        $createAdmin->create($request->all());

        return redirect()->route('indexAdmin')->with('success', 'Admin added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        //
        return view('admin.page.view_user', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    // protected $deleteUser;

    // public function __construct(DeleteUser $deleteUser)
    // {
    //     $this->deleteUser = $deleteUser;
    // }

    // public function destroy(User $admin)
    // {
    //     //
    //     $this->deleteUser->delete($admin);

    //     return redirect()->route('indexAdmin')->with('success', 'Admin deleted successfully');
    // }
}
