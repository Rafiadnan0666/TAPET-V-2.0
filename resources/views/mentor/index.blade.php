@extends('master.dash')
@section('header')
    <h2 style="width: max-content">Mahasantri binaan {{ Auth::user()->name }}</h2>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <a href="{{ route('mentor.createmhs') }}">
                            <button class="btn btn-primary"><i class="fa fa-plus mr-2"></i>tambah </button>
                        </a>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Rata-rata Nilai</th>
                                    <th>Setoran Terakhir</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($mahasantri->count() != null)
                                    @foreach ($mahasantri as $m)
                                        @php
                                            $mid = $m->id;
                                            $avg = DB::table('setoran')
                                                ->where('mahasantri_id', '=', $mid)
                                                ->avg('nilai');
                                            $l = DB::table('setoran')
                                                ->orderBy('tanggal', 'desc')
                                                ->where('mahasantri_id', '=', $mid)
                                                ->limit(1)
                                                ->get();
                                        @endphp
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>
                                                @if ($m->gambar != null)
                                                    <div class="profile_img"><img width="50" height="50"
                                                            class="rounded-circle"
                                                            src="{{ asset('upload') }}/{{ $m->gambar }}" alt="#"
                                                            style="object-fit: cover" />
                                                    </div>
                                                @else
                                                    <div class="profile_img"><img width="50" height="50"
                                                            class="rounded-circle" src="{{ asset('upload') }}/profile.jpg"
                                                            alt="#" />
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $m->nim }}</td>
                                            <td>{{ $m->nama_mhs }}</td>
                                            <td>{{ number_format($avg, 2) }}</td>
                                            <td>
                                                @foreach ($l as $t)
                                                    {{ date('l d-M-Y', strtotime($t->tanggal)) }}
                                                @endforeach
                                            </td>
                                            <th class="text-right">
                                                <div class="tooltip_section">
                                                    <a class="btn btn-primary" href="{{ route('mentor.setoran', $m->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Detail"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-warning" href="{{ route('mentor.editmhs', $m->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a onclick="return confirm('Anda Yakin Ingin Hapus Data??')"
                                                        class="btn btn-danger"
                                                        href="{{ route('mentor.destroymhs', $m->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </th>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">Mentor ini belum
                                            memiliki mahasantri binaan
                                        </td>
                                    </tr>
                                @endif

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
