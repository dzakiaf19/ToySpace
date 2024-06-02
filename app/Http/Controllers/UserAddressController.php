<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use LDAP\Result;

class UserAddressController extends Controller
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
    public function store(UserAddressRequest $request)
    {
        $apiRajaOngkir = Http::withHeaders([
            'key' => 'ad16d62acd291a4aabb9694414cad4f3'
        ])->get('https://api.rajaongkir.com/starter/city?id=' . $request->input('kota'));

        $url = $request->input('url');

        $address = UserAddress::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->input('nama'),
            'phone' => $request->input('phone'),
            'provinsi' => $apiRajaOngkir['rajaongkir']['results']['province'],
            'provinsi_id' => $apiRajaOngkir['rajaongkir']['results']['province_id'],
            'kota' => $apiRajaOngkir['rajaongkir']['results']['city_name'],
            'kota_id' => $apiRajaOngkir['rajaongkir']['results']['city_id'],
            'kode_pos' => $request->input('kode_pos'),
            'alamat_lengkap' => $request->input('alamat_lengkap'),
        ]);

        toast('Berhasil menambahkan alamat baru!', 'success');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAddress $userAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAddress $userAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserAddressRequest $request, UserAddress $address)
    {
        $apiRajaOngkir = Http::withHeaders([
            'key' => 'ad16d62acd291a4aabb9694414cad4f3'
        ])->get('https://api.rajaongkir.com/starter/city?id=' . $request->input('kota'));

        $address->update([
            'nama' => $request->input('nama'),
            'phone' => $request->input('phone'),
            'provinsi' => $apiRajaOngkir['rajaongkir']['results']['province'],
            'provinsi_id' => $apiRajaOngkir['rajaongkir']['results']['province_id'],
            'kota' => $apiRajaOngkir['rajaongkir']['results']['city_name'],
            'kota_id' => $apiRajaOngkir['rajaongkir']['results']['city_id'],
            'kode_pos' => $request->input('kode_pos'),
            'alamat_lengkap' => $request->input('alamat_lengkap'),
        ]);

        toast('Berhasil merubah data alamat!', 'success');

        return redirect()->route('profile.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAddress $address)
    {
        $address->delete();

        toast('Berhasil menghapus alamat!', 'success');

        return redirect()->route('profile.edit');
    }
}
