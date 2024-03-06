@extends('master.dash')
@section('breadcrumb')
    <li><a href="{{ route('mentor.index') }}">Home <span class="mx-1">></span></a></li>
    <li><a>{{ $mahasantri->nama_mhs }} </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Data Setoran dari {{ $mahasantri->nama_mhs }}</h2>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-left heading1 margin_0">
                        <a href="{{ route('mentor.createstr', $mahasantri->id) }}">
                            <button class="btn btn-primary"><i class="fa fa-plus mr-2"></i>tambah </button>
                        </a>
                    </div>
                    <div class="float-right heading1 margin_0">
                        <a href="{{ route('mentor.index') }}">
                            <button class="btn btn-warning text-light"><i class="fa fa-arrow-left mr-2"></i>kembali
                            </button>
                        </a>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Juz</th>
                                    <th>Halaman</th>
                                    <th>Nilai</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($setoran->count() != null)
                                    @foreach ($setoran as $s)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ number_format($s->juz, 0) }}</td>
                                            <td>{{ number_format($s->halaman, 0) }}</td>
                                            <td>{{ $s->nilai }}</td>
                                            <td>{{ $s->nilai > 75 ? 'Lanjut' : 'Ulang' }}</td>
                                            <td>{{ $s->keterangan }}</td>
                                            <td>
                                                {{ date('l d/M/Y', strtotime($s->tanggal)) }}
                                            </td>
                                            <th class="text-right">
                                                <div class="tooltip_section">
                                                    <a class="btn btn-primary" href="{{ route('mentor.showstr', $s->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Detail"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-warning" href="{{ route('mentor.editstr', $s->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a onclick="return confirm('Anda Yakin Ingin Hapus Data??')"
                                                        class="btn btn-danger"
                                                        href="{{ route('mentor.destroystr', $s->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </th>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">Mahasantri ini belum
                                            memiliki data setoran
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8" class="text-end">
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
