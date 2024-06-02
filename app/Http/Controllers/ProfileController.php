<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $cityResponse = Http::withHeaders([
            'key' => 'ad16d62acd291a4aabb9694414cad4f3'
        ])->get('https://api.rajaongkir.com/starter/city');

        $provinceResponse = Http::withHeaders([
            'key' => 'ad16d62acd291a4aabb9694414cad4f3'
        ])->get('https://api.rajaongkir.com/starter/province');

        $cities = $cityResponse['rajaongkir']['results'];
        $provinces = $provinceResponse['rajaongkir']['results'];

        $user =  $request->user();

        $alamat = UserAddress::all()->where('user_id', $user->id);

        $title = 'Hapus Alamat?';
        $text = "Anda yakin ingin menghapus alamat?";
        confirmDelete($title, $text);

        return view('toyspace.page.edit_profile', compact('user', 'alamat', 'cities', 'provinces'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        toast('Data profil berhasil diupdate!', 'success');

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
