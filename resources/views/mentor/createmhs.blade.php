@extends('master.dash')
@section('breadcrumb')
    <li><a href="{{ route('mentor.index') }}">Home <span class="mx-1">></span></a></li>
    <li><a> Tambah Mahasantri </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Tambah Data Mahasantri binaan {{ Auth::user()->name }}</h2>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <a href="{{ URL::previous() }}">
                            <button class="btn btn-warning text-light"><i class="fa fa-arrow-left mr-2"></i>kembali</button>
                        </a>
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                        @forelse ($mahasantri as $m)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 profile_details margin_bottom_30">
                                <div class="contact_blog">
                                    {{--  <h4 class="brief">Digital Strategist</h4>  --}}
                                    <div class="contact_inner">
                                        <div class="left">
                                            <h3>{{ $m->nama_mhs }}</h3>
                                            {{--  <p><strong>Jumlah: </strong>Frontend Developer</p>  --}}
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-database"></i> Jumlah Setoran :
                                                    {{ $m->setoran->count() != null ? $m->setoran->count() : 'Belum ada data setoran' }}
                                                </li>
                                                <li><i class="fa fa-database"></i> Rata-rata Nilai :
                                                    {{ $m->setoran->count() != null ? number_format($m->setoran->avg('nilai'), 1) : 'Belum ada data nilai' }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="right">
                                            <div class="profile_contacts">
                                                @if ($m->gambar != null)
                                                    <img class="img-responsive" height="83" width="83"
                                                        style="object-fit: cover"
                                                        src="{{ asset('upload') }}/{{ $m->gambar }}" alt="#" />
                                                @else
                                                    <img class="img-responsive" src="{{ asset('upload') }}/profile.jpg"
                                                        alt="#" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bottom_list">
                                            <div class="left_rating " style="display: flex !important; gap: 10px;">
                                                <form class="inline-block w-auto"
                                                    action="{{ route('mentor.storemhs', $m->id) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <input name="mid" type="number" value="{{ Auth::user()->id }}"
                                                        hidden>
                                                    <button type="submit" class="btn btn-success btn-xs"> <i
                                                            class="fa fa-circle-plus"> </i> Tambahkan
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-user"> </i> View Profile
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>belum ada data mahasantri</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
