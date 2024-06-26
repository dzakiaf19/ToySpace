@extends('admin.index_master')
@section('content')
<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 font-weight-bolder d-flex justify-content-between">
                        <h6>Tambah Admin</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2" style="margin: 20px 24px 20px 24px">
                        <form method="POST" enctype="multipart/form-data" action="{{route('admin.store')}}">
                            @csrf
                            @if($errors->any())
                                <div class="alert alert-danger" style="color: white">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">First Name</label>
                                        <input type="text" value="{{ old('firstName') }}" name="firstName" id="form2Example11" class="form-control"
                                                placeholder="Your First Name" style="font-size: 11px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Last Name</label>
                                        <input type="text" value="{{ old('lastName') }}" name="lastName" id="form2Example11" class="form-control"
                                                placeholder="Your Last Name" style="font-size: 11px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Birthday</label>
                                        <input type="date" value="{{ old('birthdate') }}" name="birthdate" id="form2Example11" class="form-control"
                                                placeholder="Choose Date" style="font-size: 11px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Address</label>
                                        <input type="text"  value="{{ old('address') }}" name="address" id="form2Example11" class="form-control"
                                                placeholder="Type here" style="font-size: 11px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Email</label>
                                        <input type="email" value="{{ old('email') }}" name="email" id="form2Example11" class="form-control"
                                                placeholder="*use @gmail.com" style="font-size: 11px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Phone/Whatsapp</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default"
                                                style="background-color: #e9ecef; font-size: 11px;">+62</span>
                                            <input type="text" value="{{ old('phone') }}" name="phone" maxlength="11" class="form-control"
                                                aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-default"
                                                placeholder="Type Phone Number" style="font-size: 11px; padding-left: 4px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Password</label>
                                        <input type="password" name="password" id="form2Example11" class="form-control"
                                            placeholder="*should be 8 character" style="font-size: 11px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Confirm
                                            Password</label>
                                        <input type="password" name="password_confirmation" id="form2Example11"
                                            class="form-control" placeholder="Confirm Password" style="font-size: 11px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <input type="hidden" name="role" value="admin">
                                    <button type="submit" class="btn btn-primary"
                                        style="background:#24263D; color: #FFF; width:100%; box-shadow: none; margin: 10px 0">Tambah Admin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
