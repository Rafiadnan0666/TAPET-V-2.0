@extends('master.dash')
@section('breadcrumb')
    @if ($user->role == 'a')
        <li><a href="{{ route('dashboard') }}">Dashboard <span class="mx-1">></span></a></li>
    @else
        <li><a href="{{ route('mentor.index') }}">Home <span class="mx-1">></span></a></li>
    @endif
    <li><a> Profile </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Edit Profile</h2>
@endsection
@section('konten')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 order-md-1 order-last">
                    <div style="float: right">

                        <a href="{{ URL::previous() }}">
                            <button class="btn btn-warning mt-2">
                                <i class="fa fa-arrow-circle-left"></i> Kembali
                            </button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="page-content mt-4">
            <section class="section">
                <div class="row" id="basic-table">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('user.profile', Auth::user()->id) }}"
                                        enctype="multipart/form-data" method="post">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" value="{{ Auth::user()->name }}" name="name"
                                                class="form-control mb-2 @error('name') is-invalid @enderror" id="name"
                                                placeholder="Enter Name">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" value="{{ Auth::user()->email }}" name="email"
                                                class="form-control mb-2 @error('email') is-invalid @enderror"
                                                id="email" placeholder="Enter Email">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password"
                                                class="form-control mb-2 @error('password') is-invalid @enderror"
                                                id="password" placeholder="Enter Password">
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" name="gambar"
                                                class="form-control mb-2 @error('gambar') is-invalid @enderror"
                                                id="gambar">
                                            <img src="{{ asset('upload/' . Auth::user()->gambar) }}" alt=""
                                                class="w-25">
                                            @error('gambar')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <button class="btn btn-primary mt-3" type="submit">
                                            <i class="fa fa-save"></i> Update
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
