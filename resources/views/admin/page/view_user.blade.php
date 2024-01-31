@extends('admin.index_master')
@section('content')
<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 font-weight-bolder d-flex justify-content-between">
                        <h6>Add Products</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2" style="margin: 20px 24px 20px 24px">
                        <form method="POST" enctype="multipart/form-data" action="{{route('storeAdmin')}}">
                            @csrf
                            @if($errors->any())
                                <div class="alert alert-danger">
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
                                        <input type="text" disabled name="firstName" value="{{$admin->firstName}}" id="form2Example11" class="form-control"
                                                placeholder="Your First Name" style="font-size: 11px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Last Name</label>
                                        <input type="text" disabled name="lastName" value="{{$admin->lastName}}" id="form2Example11" class="form-control"
                                                placeholder="Your Last Name" style="font-size: 11px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Birthday</label>
                                        <input type="date" disabled name="birthdate" value="{{$admin->birthdate}}" id="form2Example11" class="form-control"
                                                placeholder="Choose Date" style="font-size: 11px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Address</label>
                                        <input type="text" disabled name="address" value="{{$admin->address}}" id="form2Example11" class="form-control"
                                                placeholder="Type here" style="font-size: 11px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Email</label>
                                        <input type="email" disabled name="email" value="{{$admin->email}}" id="form2Example11" class="form-control"
                                                placeholder="*use @gmail.com" style="font-size: 11px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Phone/Whatsapp</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default"
                                                style="background-color: #e9ecef; font-size: 11px;">+62</span>
                                            <input type="text" disabled name="phone" value="{{$admin->phone}}" class="form-control"
                                                aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-default"
                                                placeholder="Type Phone Number" style="font-size: 11px; padding-left: 4px;">
                                        </div>
                                    </div>
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
