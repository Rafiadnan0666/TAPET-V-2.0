@extends('master.dash')
@section('breadcrumb')
    <li><a href="{{ route('mentor.index') }}">Home <span class="mx-1">></span></a></li>
    <li><a href="{{ route('mentor.setoran', $data->mahasantri->id) }}">{{ $data->mahasantri->nama_mhs }}
            <span class="mx-1">></span></a></li>
    <li><a>Detail Setoran</a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Detail Setoran dari {{ $data->mahasantri->nama_mhs }}</h2>
@endsection
@section('konten')
    <div class="midde_cont">
        <div class="container-fluid">
            <!-- row -->
            <div class="row column1">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div style="float: right">
                                <a href="{{ route('mentor.setoran', $data->mahasantri->id) }}">
                                    <button class="btn btn-warning mt-2">
                                        <i class="fa fa-arrow-circle-left"></i> Kembali
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="full price_table padding_infor_info">
                            <div class="row">
                                <!-- user profile section -->
                                <!-- profile image -->
                                <div class="col-lg-12">
                                    <div class="full dis_flex center_text">
                                        <div class="profile_img">
                                            @if (!$data->mahasantri->gambar)
                                                <img width="180" class="" src="{{ asset('upload') }}/profile.jpg"
                                                    alt="Profile Picture">
                                            @else
                                                <img width="180" class=""
                                                    src="{{ asset('upload') }}/{{ $data->mahasantri->gambar }}"
                                                    alt="Profile Picture">
                                            @endif
                                        </div>
                                        <div class="profile_contant">
                                            <div class="contact_inner">
                                                <h3>{{ $data->mahasantri->nama_mhs }}</h3>
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <i class="fa fa-user"></i> Mentor:
                                                        {{ $data->mahasantri->mentor->name }}
                                                    </li>
                                                    <li><i class="fa fa-marker"></i> Rata-rata Nilai :
                                                        {{ $data->mahasantri->setoran->avg('nilai') != null ? number_format($data->mahasantri->setoran->avg('nilai'), 2) : 'Afwan, belum ada data nilai' }}
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-book"></i> Juz:
                                                        {{ $data->juz }}
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-book"></i> Halaman:
                                                        {{ $data->halaman }}
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-marker"></i> Nilai:
                                                        {{ $data->nilai }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- profile content section -->
                                    <div class="full inner_elements margin_top_30">
                                        <div class="tab_style2">
                                            <div class="tabbar">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="nav-home-tab"
                                                            data-toggle="tab" href="#recent_activity" role="tab"
                                                            aria-selected="true">Keterangan Setoran</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="recent_activity"
                                                        role="tabpanel" aria-labelledby="nav-home-tab">
                                                        <div class="msg_list_main">
                                                            <ul class="msg_list">
                                                                <li>
                                                                    <div class="msg_content">
                                                                        <p class="msg_user"> {{ $data->keterangan }}</p>
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end user profile section -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end dashboard inner -->
    </div>
@endsection
