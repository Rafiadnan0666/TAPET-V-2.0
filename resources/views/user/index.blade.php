@extends('master.dash')
@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">Dashboard <span class="mx-1">></span></a></li>
    <li><a> Mentor </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Data Mentor</h2>
@endsection
@section('konten')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class=" d-flex justify-content-end">
                        <a href="{{ route('user.create') }}">
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
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jumlah Mahasantri</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mentor as $m)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($m->gambar != null)
                                                <div class="profile_img"><img width="50" height="50"
                                                        class="rounded-circle"
                                                        src="{{ asset('upload') }}/{{ $m->gambar }}" alt="#" style="object-fit: cover" />
                                                </div>
                                            @else
                                                <div class="profile_img"><img width="50" height="50"
                                                        class="rounded-circle" src="{{ asset('upload') }}/profile.jpg"
                                                        alt="#" />
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $m->name }}</td>
                                        <td>{{ $m->email }}</td>
                                        <td>{{ $m->email }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('user.show', $m->id) }}">
                                                <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                            </a>
                                            <a href="{{ route('user.edit', $m->id) }}">
                                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                            </a>

                                            <form action="{{ route('user.destroy', $m->id) }}" method="POST">
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
