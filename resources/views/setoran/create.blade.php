@extends('master.dash')
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
                    <h3>Tambah Data</h3>
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
                                    <form action="{{ route('setoran.store') }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                               <label for="status">mahasantri</label>
                                                    <select name="mahasantri" id="mahasantri" class="custom-select mb-2 @error('mahasantri') is-invalid @enderror">
                                                        <option value="" selected disabled>Select mahasantri</option>
                                                      @foreach ($mahasantri as $item)
                                                           <option value="{{$item->id}}" >{{$item->nama_mhs}}</option>
                                                      @endforeach
                                                    </select>
                                                    @error('mahasantri')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                <div class="col-md-6">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input type="datetime-local" value="{{ old('tanggal') }}" name="tanggal" class="form-control mb-2 @error('tanggal') is-invalid @enderror" id="tanggal">
                                                    @error('tanggal')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="juz">Juz</label>
                                                    <input type="number" value="{{ old('juz') }}" name="juz" class="form-control mb-2 @error('juz') is-invalid @enderror" id="juz" placeholder="Enter Juz">
                                                    @error('juz')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="halaman">Halaman</label>
                                                    <input type="number" value="{{ old('halaman') }}" name="halaman" class="form-control mb-2 @error('halaman') is-invalid @enderror" id="halaman" placeholder="Enter Halaman">
                                                    @error('halaman')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="nilai">Nilai</label>
                                                    <input type="number" value="{{ old('nilai') }}" name="nilai" class="form-control mb-2 @error('nilai') is-invalid @enderror" id="nilai" placeholder="Enter Nilai">
                                                    @error('nilai')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="status">Status</label>
                                                    <select name="status" id="status" class="custom-select mb-2 @error('status') is-invalid @enderror">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="l">L</option>
                                                        <option value="a">A</option>
                                                    </select>
                                                    @error('status')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="keterangan">Keterangan</label>
                                                    <input type="text" value="{{ old('keterangan') }}" name="keterangan" class="form-control mb-2 @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Enter Keterangan">
                                                    @error('keterangan')
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
