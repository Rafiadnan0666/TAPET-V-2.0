@extends('master.dash')
@section('konten')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Mahasantri binaan {{ Auth::user()->name }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>Responsive Tables</h2>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Rata-rata Nilai</th>
                                    <th>Setoran Terakhir</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasantri as $m)
                                    @php
                                        $mid = $m->id;
                                        $avg = DB::table('setoran')->where('mahasantri_id', '=', $mid)->avg('nilai');
                                        $l = DB::table('setoran')->orderBy('tanggal', 'desc')->where('mahasantri_id', '=', $mid)->limit(1)->get();
                                    @endphp
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $m->nim }}</td>
                                        <td>{{ $m->nama_mhs }}</td>
                                        <td>{{ $avg }}</td>
                                        <td>{{ $l }}</td>
                                        <th class="text-right">
                                            <div class="tooltip_section">
                                                <a class="btn btn-primary" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Detail"><i
                                                        class="fa fa-eye"></i></a>
                                                <a class="btn btn-warning" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Edit"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Delete"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="text-end">
                                        {{ $mahasantri->withQueryString()->links('pagination::bootstrap-5') }}
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
