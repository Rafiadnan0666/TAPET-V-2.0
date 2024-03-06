@extends('master.dash')
@section('breadcrumb')
    <li><a href="{{ route('mentor.index') }}">Home <span class="mx-1">></span></a></li>
    <li><a> Tambah Mahasantri </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Tambah Data Mahasantri binaan {{ Auth::user()->name }}</h2>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <a href="{{ route('mentor.index') }}">
                            <button class="btn btn-warning text-light"><i class="fa fa-arrow-left mr-2"></i>kembali</button>
                        </a>
                    </div>
                </div>
                <form class="padding_infor_info row" action="{{ route('mentor.storemhs') }}" method="POST">
                    @csrf
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{ Auth::user()->id }}" name="mid" hidden>
                        <div class="form-group">
                            <label for="nim" class="form-label">NIM <span class="text-danger small">*</span></label>
                            <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror"
                                value="{{ old('nim') }}" name="nim">
                            @error('nim')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Mahasantri <span
                                    class="text-danger small">*</span></label>
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}" name="nama">
                            @error('nama')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
