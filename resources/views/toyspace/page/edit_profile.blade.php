@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Checkout Product')

@section('content')

    <main id="about-us" class="about-us">
        <section id="title-cart" class="title-cart">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body p-5">
                        <h2>Data Pribadi</h2>
                        <p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="namadepan" class="form-label">Nama Depan</label>
                                    <input id="namadepan" name="firstName" class="form-control" type="text"
                                        value="{{ $user->firstName }}" aria-label="default input example">
                                </div>
                                <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                                <div class="col-md-6">
                                    <label for="namabelakang" class="form-label">Nama Belakang</label>
                                    <input id="namabelakang" name="lastName" class="form-control" type="text"
                                        value="{{ $user->lastName }}" aria-label="default input example">
                                </div>
                                <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="birthdate" class="form-label">Tanggal Lahir</label>
                                    <input id="birthdate" name="birthdate" type="date" class="form-control"
                                        value="{{ $user->birthdate }}">
                                </div>
                                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                                <div class="col-md-6">
                                    <label class="phone" for="form2Example11">Phone/Whatsapp</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroup-sizing-default"
                                            style="background-color: #e9ecef;">+62</span>
                                        <input type="text" name="phone" class="form-control" maxlength="11"
                                            value="{{ $user->phone }}">
                                    </div>
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-simple col-md-12 mb-3">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section id="title-cart" class="title-cart" style="margin-top: -20px;">
            <div class="container">
                <div class="card">
                    <div class="card-body p-5">
                        <h2>Alamat</h2>
                        <p>Kelola informasi alamat Anda untuk mengontrol, melindungi dan mengamankan akun</p>
                        @foreach ($alamat as $key => $pilih)
                            <div class="row mb-3">
                                <div class="col-10">
                                    <p style="margin-bottom: 0">{{ $pilih->nama . ' (+62)' . $pilih->phone }}</p>
                                    <p>{{ $pilih->alamat_lengkap . ', ' . $pilih->kota . ', ' . $pilih->provinsi . ' (' . $pilih->kode_pos . ')' }}
                                    </p>
                                </div>
                                <div class="col-2" style="margin: auto">
                                    <button type="button" class="btn btn-simple form-control" data-bs-toggle="modal"
                                        data-bs-target="#editalamat{{ $key }}">Edit | Hapus</button>
                                </div>
                                <div class="modal fade" id="editalamat{{ $key }}" aria-hidden="true"
                                    aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalToggleLabel2">Isi Alamat Baru</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('address.update', ['address' => $pilih]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="nama" class="col-form-label">Nama:</label>
                                                                <input required type="text" name="nama"
                                                                    class="form-control" id="nama"
                                                                    value="{{ old('nama', $pilih->nama) }}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="phone" class="col-form-label">No HP:</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"
                                                                        id="inputGroup-sizing-default"
                                                                        style="background-color: #e9ecef;">+62</span>
                                                                    <input required type="text" name="phone"
                                                                        class="form-control"
                                                                        aria-label="Sizing example input"
                                                                        aria-describedby="inputGroup-sizing-default"
                                                                        maxlength="11"
                                                                        value="{{ old('phone', $pilih->phone) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <label for="province">Pilith Provinsi</label>
                                                                <select required name="provinsi" id="provinsi"
                                                                    class="form-control">
                                                                    <option
                                                                        value="{{ old('provinsi', $pilih->provinsi_id) }}">
                                                                        {{ $pilih->provinsi }}</option>
                                                                    @foreach ($provinces as $province)
                                                                        <option value="{{ $province['province_id'] }}">
                                                                            {{ $province['province'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="city">Pilith Kota</label>
                                                                <select required name="kota" id="city"
                                                                    class="form-control">
                                                                    <option value="{{ old('kota', $pilih->kota_id) }}">
                                                                        {{ $pilih->kota }}</option>
                                                                    @foreach ($cities as $city)
                                                                        <option value="{{ $city['city_id'] }}">
                                                                            {{ $city['city_name'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="kode-pos">Kode Pos</label>
                                                                <input required name="kode_pos" type="text"
                                                                    maxlength="6" class="form-control" id="kode-pos"
                                                                    value="{{ old('kode_pos', $pilih->kode_pos) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="alamat" class="col-form-label">Detail Alamat
                                                            :</label>
                                                        <textarea required name="alamat_lengkap" id="alamat" class="form-control">{{ old('alamat_lengkap', $pilih->alamat_lengkap) }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('address.update', ['address' => $pilih]) }}"
                                                        class="btn btn-secondary" data-confirm-delete="true">Hapus</a>
                                                    <button type="submit" class="btn btn-primary-all">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-simple col-md-12" data-bs-target="#formtambahalamat"
                            data-bs-toggle="modal" data-bs-dismiss="modal">Tambah Alamat Baru</button>
                        <div class="modal fade" id="formtambahalamat" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Isi Alamat Baru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('address.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="nama" class="col-form-label">Nama:</label>
                                                        <input required type="text" name="nama"
                                                            class="form-control" id="nama"
                                                            value="{{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="phone" class="col-form-label">No HP:</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroup-sizing-default"
                                                                style="background-color: #e9ecef;">+62</span>
                                                            <input required type="text" name="phone"
                                                                class="form-control" aria-label="Sizing example input"
                                                                aria-describedby="inputGroup-sizing-default"
                                                                maxlength="11" value="{{ Auth::user()->phone }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label for="province">Pilith Provinsi</label>
                                                        <select required name="provinsi" id="provinsi"
                                                            class="form-control">
                                                            <option value=""></option>
                                                            @foreach ($provinces as $province)
                                                                <option value="{{ $province['province_id'] }}">
                                                                    {{ $province['province'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="city">Pilith Kota</label>
                                                        <select required name="kota" id="city"
                                                            class="form-control">
                                                            <option value=""></option>
                                                            @foreach ($cities as $city)
                                                                <option value="{{ $city['city_id'] }}">
                                                                    {{ $city['city_name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="kode-pos">Kode Pos</label>
                                                        <input required name="kode_pos" type="text" maxlength="6"
                                                            class="form-control" id="kode-pos" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="col-form-label">Detail Alamat :</label>
                                                <textarea required name="alamat_lengkap" id="alamat" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="title-cart" class="title-cart" style="margin-top: -20px;">
            <div class="container">
                <div class="card">
                    <div class="card-body p-5">
                        <h2>Ubah Password</h2>
                        <p>Kelola informasi password Anda untuk mengontrol, melindungi dan mengamankan akun</p>
                        <form method="post" action="{{ route('password.update') }}">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="update_password_current_password" class="form-label">Password Lama</label>
                                    <input class="form-control" id="update_password_current_password"
                                        name="current_password" type="password" aria-label="default input example">
                                </div>
                                <div class="col-md-4">
                                    <label for="update_password_password" class="form-label">Password Baru</label>
                                    <input class="form-control" id="update_password_password" name="password"
                                        type="password" aria-label="default input example">
                                </div>
                                <div class="col-md-4">
                                    <label for="update_password_password_confirmation" class="form-label">Konfirmasi
                                        Password Baru</label>
                                    <input class="form-control" id="update_password_password_confirmation"
                                        name="password_confirmation" type="password" aria-label="default input example">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-simple col-md-12 mb-3">Ubah Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section id="title-cart" class="title-cart" style="margin-top: -20px;">
            <div class="container">
                <div class="card">
                    <div class="card-body p-5">
                        <h2>Hapus Akun</h2>
                        <p>Akun Anda akan dihapus secara permanen. Semua data terkait akan hilang.</p>
                        <button type="button" class="btn btn-simple col-md-12 mb-3" data-bs-target="#formhapusakun"
                            data-bs-toggle="modal" data-bs-dismiss="modal">Hapus
                            Akun</button>
                        <div class="modal fade" id="formhapusakun" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Apakah Anda yakin ingin
                                            menghapus akun Anda?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('profile.destroy') }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="hapus" class="col-form-label">Tindakan ini tidak
                                                            dapat dibatalkan dan semua data Anda akan hilang secara
                                                            permanen.</label>
                                                        <input required type="password" name="password"
                                                            class="form-control" id="hapus"
                                                            placeholder="Masukkan Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-simple">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>

@endsection
