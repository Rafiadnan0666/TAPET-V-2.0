@extends('master.dash')
@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">Dashboard <span class="mx-1">></span></a></li>
    <li><a> Mahasantri </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Data Mahasantri</h2>
@endsection
@section('konten')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class=" d-flex justify-content-end">
                        <a href="{{ route('mahasantri.create') }}">
                            <button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah </button>
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
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasantri as $mhs)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $mhs->nim }}</td>
                                        <td>
                                            @if ($mhs->gambar != null)
                                                <div class="profile_img"><img width="50" height="50"
                                                        class="rounded-circle"
                                                        src="{{ asset('upload') }}/{{ $mhs->gambar }}" alt="#"
                                                        style="object-fit: cover" />
                                                </div>
                                            @else
                                                <div class="profile_img"><img width="50" height="50"
                                                        class="rounded-circle" src="{{ asset('upload') }}/profile.jpg"
                                                        alt="#" />
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $mhs->nama_mhs }}</td>
                                        <td>{{ $mhs->mentor != null ? $mhs->mentor->name : 'Belum punya mentor' }}</td>
                                        <td>{{ $mhs->setoran->avg('nilai') != null ? number_format($mhs->setoran->avg('nilai'), 2) : 'Belum ada data nilai' }}
                                        </td>
                                        <td>{{ $mhs->setoran->max('tanggal') != null ? $mhs->setoran->max('tanggal') : 'Belum ada data setoran' }}
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('mahasantri.show', $mhs->id) }}">
                                                <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                            </a>
                                            <a href="{{ route('mahasantri.edit', $mhs->id) }}">
                                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                            </a>

                                            <form action="{{ route('mahasantri.destroy', $mhs->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Anda yakin akan hapus data??')"
                                                    type="submit" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8" class="text-right">
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
