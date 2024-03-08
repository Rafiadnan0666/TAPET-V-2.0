@extends('master.dash')
@section('header')
    <h2 style="width: max-content">Dashboard</h2>
@endsection
@section('konten')
    <div class="row column1">
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('user.index') }}">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-user-tie yellow_color fa-beat-fade"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>

                            <p class="total_no">{{ $user->count() }}</p>

                            <p class="head_couter">Mentor</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('mahasantri.index') }}">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa-solid fa-users green_color fa-flip"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>

                            <p class="total_no">{{ $mahasantri->count() }}</p>
                            <p class="head_couter">Mahasantri</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('setoran.index') }}">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-cloud-download blue1_color fa-bounce"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>

                            <p class="total_no">{{ $setoran->count() }}</p>

                            <p class="head_couter">Setoran</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
@endsection
