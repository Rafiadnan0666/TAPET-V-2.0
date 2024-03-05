@extends('master.dash')
@section('konten')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <div class="float-right">
                    <ul class="d-flex">
                        <li><a href="{{ route('mentor.index') }}">Home <span class="mx-1">></span></a></li>
                        <li><a href="{{ route('mentor.setoran', $data->mahasantri->id) }}">{{ $data->mahasantri->nama_mhs }}
                                <span class="mx-1">></span></a></li>
                        <li><a>Detail Setoran</a></li>
                    </ul>
                </div>
                <h2 style="width: max-content">Detail Setoran dari {{ $data->mahasantri->nama_mhs }}</h2>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <a href="{{ route('mentor.setoran', $data->mahasantri->id) }}">
                            <button class="btn btn-warning text-light"><i class="fa fa-arrow-left mr-2"></i>kembali
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
                                <div class="profile_img"><img width="180" class="rounded-circle"
                                        src="images/layout_img/user_img.jpg" alt="#" /></div>
                                <div class="profile_contant">
                                    <div class="contact_inner">
                                        <h3>{{ $data->mahasantri->nama_mhs }}</h3>
                                        <p><strong>Mentor: </strong>{{ $data->mahasantri->mentor->name }}</p>
                                        <ul class="list-unstyled">
                                            <li>Juz : {{ $data->juz }}</li>
                                            <li>Halaman : {{ $data->halaman }}</li>
                                            <li>Nilai : {{ $data->nilai }}</li>
                                            <li>Status : {{ $data->nilai > 75 ? 'Lanjut' : 'Ulang' }}</li>
                                            <li>Tanggal : {{ $data->tanggal }}</li>
                                            <li>Keterangan : {{ $data->keterangan }}</li>
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
@endsection
