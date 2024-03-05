@extends('master.dash')
@section('konten')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class=" d-flex justify-content-between">
                        <h2>Data Setoran</h2>
                        <a href="{{ route('setoran.create') }}">
                            <button class="btn btn-primary"><i class="fa fa-create"></i>tambah </button>
                        </a>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Mahasantri</th>
                                    <th>Tanggal</th>
                                    <th>Juz</th>
                                    <th>Halaman</th>
                                    <th>Keterangan</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($setoran as $mhs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mhs->mahasantri->nama_mhs }}</td>
                                        <td>{{$mhs->tanggal}}</td>
                                        <td>{{ $mhs->juz }}</td>
                                        <td>{{ $mhs->halaman }}</td>
                                        <td>{{ $mhs->status == 'l' ? 'lanjut' : 'ulang' }}</td>
                                        <td>{{ $mhs->created_at }}</td>
                                        <td>{{ $mhs->updated_at }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('setoran.show', $mhs->id) }}">
                                                <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                            </a>
                                            <a href="{{ route('setoran.edit', $mhs->id) }}">
                                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                            </a>

                                            <form action="{{ route('setoran.destroy', $mhs->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

