@extends('master.dash')
@section('konten')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <div class="float-right">
                    <ul class="d-flex">
                        <li><a href="{{ route('mentor.index') }}">Home <span class="mx-1">></span></a></li>
                        <li><a href="{{ route('mentor.setoran', $data->mahasantri->id) }}">{{ $data->mahasantri->nama_mhs }} <span
                                    class="mx-1">></span></a></li>
                        <li><a> Edit Setoran </a></li>
                    </ul>
                </div>
                <h2 style="width: max-content">Edit Data Setoran {{ $data->mahasantri->nama_mhs }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <a href="{{ route('mentor.setoran', $data->mahasantri->id) }}">
                            <button class="btn btn-warning text-light"><i class="fa fa-arrow-left mr-2"></i>kembali</button>
                        </a>
                    </div>
                </div>
                <form class="padding_infor_info row" action="{{ route('mentor.updatestr', $data->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{ $data->mahasantri->id }}" name="mid" hidden>
                        <div class="form-group">
                            <label for="juz" class="form-label">Juz <span class="text-danger small">*</span></label>
                            <input id="juz" type="number" class="form-control @error('juz') is-invalid @enderror"
                                value="{{ $data->juz }}" name="juz">
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
                                value="{{ $data->halaman }}" name="hal">
                            @error('hal')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nilai" class="form-label">Nilai <span class="text-danger small">*</span></label>
                            <input id="nilai" type="number" class="form-control @error('nilai') is-invalid @enderror"
                                value="{{ $data->nilai }}" name="nilai">
                            @error('nilai')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tanggal" class="form-label">Tanggal <span class="text-danger small">*</span></label>
                            <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ $data->tanggal }}" name="tanggal">
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
                                class="form-control @error('ket') is-invalid @enderror">{{ $data->keterangan }}</textarea>
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
