@extends('master.dash')
@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">Dashboard <span class="mx-1">></span></a></li>
    <li><a href="{{ route('mahasantri.index') }}">Mahasantri <span class="mx-1">></span></a></li>
    <li><a> Tambah </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Tambah Data Mahasantri</h2>
@endsection
@section('konten')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 order-md-1 order-last">
                    <div style="float: right">
                        <a href="{{ route('mahasantri.index') }}">
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
                                    {{-- enctype="multi platform ngirim data harus ada ini" --}}
                                    <form action="{{ route('mahasantri.store') }}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="nim">NIM</label>
                                                    <input type="text" value="{{ old('nim') }}" name="nim"
                                                        class="form-control mb-2 @error('nim') is-invalid @enderror"
                                                        id="nim" placeholder="Enter NIM">
                                                    @error('nim')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="nama_mhs">Nama Mahasiswa</label>
                                                    <input type="text" value="{{ old('nama_mhs') }}" name="nama_mhs"
                                                        class="form-control mb-2 @error('nama_mhs') is-invalid @enderror"
                                                        id="nama_mhs" placeholder="Enter Nama Mahasiswa">
                                                    @error('nama_mhs')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="gambar">Foto</label>
                                                    <input type="file" name="gambar"
                                                        class="form-control mb-2 @error('gambar') is-invalid @enderror"
                                                        id="gambar">
                                                    @error('gambar')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary mt-3" type="submit">
                                            <i class="fa fa-save"></i> Simpan
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
