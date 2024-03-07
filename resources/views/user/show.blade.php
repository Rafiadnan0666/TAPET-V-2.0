@extends('master.dash')
@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">Dashboard <span class="mx-1">></span></a></li>
    <li><a href="{{ route('user.index') }}">Mentor <span class="mx-1">></span></a></li>
    <li><a> Detail </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Profile Mentor</h2>
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
                                <a href="{{ route('user.index') }}">
                                    <button class="btn btn-warning mt-2">
                                        <i class="fa fa-arrow-circle-left"></i> Kembali
                                    </button>
                                </a>
                            </div>
                            <div class="heading1 margin_0">
                                <h2>{{ $user->name }} Profile</h2>
                            </div>
                        </div>
                        <div class="full price_table padding_infor_info">
                            <div class="row">
                                <!-- user profile section -->
                                <!-- profile image -->
                                <div class="col-lg-12">
                                    <div class="full dis_flex center_text">
                                        <div class="profile_img"><img width="180" class="rounded-circle"
                                                src="{{ asset('upload') }}/{{ $user->gambar }}" alt="Profile Picture"></div>
                                        <div class="profile_contant">
                                            <div class="contact_inner">
                                                <h3>{{ $user->name }}</h3>
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-person"></i>: {{ $user->name }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
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