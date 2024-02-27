@extends('master.dash')
@section('konten')
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class=" d-flex justify-content-between">
                    <h2>Hover Table</h2>
                    <a href="{{ route('mahasantri.create') }}">
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
                                <th>NIM</th>
                                <th>Foto</th>
                                <th>Nama Mahasantri</th>
                                <th>Mentor</th>
                                <th>status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasantri as $mhs)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mhs->nim }}</td>
                                    <td><img src="{{ asset('upload') }}/{{ $mhs->gambar }}" alt="{{ $mhs->nama }}"
                                            style="max-width: 100px;">
                                    </td>
                                    <td>{{ $mhs->nama_mhs }}</td>
                                    <td>{{ $mhs->mentor->name }}</td>
                                     <td>{{ $mhs->status == 'l' ? "lanjut" : "ulang" }}</td>
                                    <td>{{ $mhs->created_at }}</td>
                                    <td>{{ $mhs->updated_at }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('mahasantri.show', $mhs->id) }}">
                                            <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                        </a>
                                        <a href="{{ route('mahasantri.show', $mhs->id) }}">
                                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                        </a>

                                        <form action="{{ route('mahasantri.destroy', $mhs->id) }}"
                                            method="POST">
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
@endsection