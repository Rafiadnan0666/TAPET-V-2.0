@extends('master.dash')
@section('konten')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 order-md-1 order-last">
                    <div style="float: right">
                        <a href="{{ route('user.index') }}">
                            <button class="btn btn-warning mt-2">
                                <i class="fa fa-arrow-circle-left"></i> Kembali
                            </button>
                        </a>
                    </div>
                    <h3>{{ 'Create New User' }}</h3>
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
                                    <form action="{{ route('user.store') }}" enctype="multipart/form-data" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" placeholder="Enter Name">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control mb-2 @error('email') is-invalid @enderror" id="email" placeholder="Enter Email">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control mb-2 @error('password') is-invalid @enderror" id="password" placeholder="Enter Password">
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select name="role" id="role" class="custom-select mb-2 @error('role') is-invalid @enderror">
                                                <option value="a">Admin</option>
                                                <option value="m">Mentor</option>
                                            </select>
                                            @error('role')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" name="gambar" class="form-control mb-2 @error('gambar') is-invalid @enderror" id="gambar">
                                            @error('gambar')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <button class="btn btn-primary mt-3" type="submit">
                                            <i class="fa fa-save"></i> Create User
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
