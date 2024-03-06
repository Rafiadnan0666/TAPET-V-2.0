@extends('master.dash')
@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">Dashboard <span class="mx-1">></span></a></li>
    <li><a href="{{ route('mahasantri.index') }}">Mahasantri <span class="mx-1">></span></a></li>
    <li><a> Profil </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Profil Mahasantri</h2>
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
                                <a href="{{ route('mahasantri.index') }}">
                                    <button class="btn btn-warning mt-2">
                                        <i class="fa fa-arrow-circle-left"></i> Kembali
                                    </button>
                                </a>
                            </div>
                            <div class="heading1 margin_0">
                                <h2>{{ $mahasantri->nama_mhs }} Profile</h2>
                            </div>
                        </div>
                        <div class="full price_table padding_infor_info">
                            <div class="row">
                                <!-- user profile section -->
                                <!-- profile image -->
                                <div class="col-lg-12">
                                    <div class="full dis_flex center_text">
                                        <div class="profile_img"><img width="180" class="rounded-circle"
                                                src="{{ asset('upload') }}/{{ $mahasantri->gambar }}" alt="Profile Picture">
                                        </div>
                                        <div class="profile_contant">
                                            <div class="contact_inner">
                                                <h3>{{ $mahasantri->nama_mhs }}</h3>
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-person"></i>: {{ $mahasantri->mentor->name }}</li>
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
                                                            aria-selected="true">Recent Setoran</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="recent_activity"
                                                        role="tabpanel" aria-labelledby="nav-home-tab">
                                                        <div class="msg_list_main">
                                                            <ul class="msg_list">
                                                                @forelse ($setoran as $setoran)
                                                                    <li>
                                                                        <div class="msg_content">
                                                                            <span
                                                                                class="name_user">{{ $setoran->mahasantri->nama_mhs }}</span>
                                                                            <p class="msg_user">JUZ: {{ $setoran->juz }}</p>
                                                                            <p class="msg_user">Halaman:
                                                                                {{ $setoran->halaman }}</p>
                                                                            <p class="msg_user">Nilai:
                                                                                {{ $setoran->nilai }}</p>
                                                                            <p class="msg_user">Keterangan:
                                                                                {{ $setoran->keterangan }}</p>
                                                                            <p class="time_ago">12 min ago</p>
                                                                        </div>
                                                                    </li>
                                                                @empty
                                                                    <li>No recent setoran found.</li>
                                                                @endforelse
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
            <!-- footer -->
            <div class="container-fluid">
                <div class="footer">
                    <p>Copyright © 2018 Designed by html.design. All rights reserved.
                        <br>
                        Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- end dashboard inner -->
    </div>
@endsection
