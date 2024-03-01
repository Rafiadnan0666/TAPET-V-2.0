@extends('master.dash')
@section('konten')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <div class="float-right">
                    <ul class="d-flex">
                        <li><a href="{{ route('mentor.index') }}">Home <span class="mx-1">></span></a></li>
                        <li><a href="{{ route('mentor.setoran', $mahasantri->id) }}">{{ $mahasantri->nama_mhs }} <span
                                    class="mx-1">></span></a></li>
                        <li><a> Create STR </a></li>
                    </ul>
                </div>
                <h2 style="width: max-content">Tambah Data Setoran {{ $mahasantri->nama_mhs }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <a href="{{ route('mentor.setoran', $mahasantri->id) }}">
                            <button class="btn btn-warning text-light"><i class="fa fa-arrow-left mr-2"></i>kembali</button>
                        </a>
                    </div>
                </div>
                <form class="padding_infor_info row" action="{{ route('mentor.storestr') }}" method="POST">
                    @csrf
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{ $mahasantri->id }}" name="mid" hidden>
                        <div class="form-group">
                            <label for="juz" class="form-label">Juz <span class="text-danger small">*</span></label>
                            <input id="juz" type="number" class="form-control @error('juz') is-invalid @enderror"
                                value="{{ old('juz') }}" name="juz">
                            @error('juz')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="hal" class="form-label">Halaman <span
                                    class="text-danger small">*</span></label>
                            <input id="hal" type="number" class="form-control @error('hal') is-invalid @enderror"
                                value="{{ old('hal') }}" name="hal">
                            @error('hal')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nilai" class="form-label">Nilai <span class="text-danger small">*</span></label>
                            <input id="nilai" type="number" class="form-control @error('nilai') is-invalid @enderror"
                                value="{{ old('nilai') }}" name="nilai">
                            @error('nilai')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tanggal" class="form-label">Tanggal <span class="text-danger small">*</span></label>
                            <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal') }}" name="tanggal">
                            @error('tanggal')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="ket" class="form-label">Keterangan <span
                                    class="text-danger small">*</span></label>
                            <textarea name="ket" id="ket" cols="30" rows="10"
                                class="form-control @error('ket') is-invalid @enderror">{{ old('ket') }}</textarea>
                            @error('ket')
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
