@extends('master.dash')
@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">Dashboard <span class="mx-1">></span></a></li>
    <li><a> Setoran </a></li>
@endsection
@section('header')
    <h2 style="width: max-content"> Data Setoran </h2>
@endsection
@section('konten')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class=" d-flex justify-content-end">
                        <a href="{{ route('setoran.create') }}">
                            <button class="btn btn-primary"><i class="fa fa-circle-plus mr-1"></i>Tambah </button>
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
                                    <th>Nilai</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($setoran as $mhs)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $mhs->mahasantri->nama_mhs }}</td>
                                        <td>{{ $mhs->tanggal }}</td>
                                        <td>{{ $mhs->juz }}</td>
                                        <td>{{ $mhs->halaman }}</td>
                                        <td>{{ $mhs->nilai }}</td>
                                        <td>{{ $mhs->nilai > 75 ? 'lanjut' : 'ulang' }}</td>
                                        <td>
                                            @if (Str::length($mhs->keterangan) > 10)
                                                {{ substr($mhs->keterangan, 0, 10) . '[.....]' }}
                                            @else
                                                {{ $mhs->keterangan }}
                                            @endif
                                        </td>
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
                                                <button  onclick="return confirm('Anda yakin akan hapus data??')" type="submit" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="9" class="text-right">
                                        {{ $setoran->withQueryString()->links('pagination::bootstrap-5') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
