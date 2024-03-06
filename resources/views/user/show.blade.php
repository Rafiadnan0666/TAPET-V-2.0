@extends('master.dash')
@section('konten')
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Profile</h2>
                    </div>
                </div>
            </div>
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
                                    <!-- profile content section -->
                                   
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