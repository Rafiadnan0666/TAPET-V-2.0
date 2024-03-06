@extends('master.err')
@section('gambar')
    <img class="img-responsive" src="{{ asset('dist') }}/images/layout_img/error.png" alt="#">
@endsection
@section('error')
    <h3>PAGE NOT FOUND !</h3>
@endsection
{{--  @extends('master.dash')
@section('konten')
    <div class="error_page error_404">
        <div class="center">
            <div class="error_icon">
                <div class="d-flex justify-content-center">
                    <img class="img-fluid" style="display: flex" width="40%"
                        src="{{ asset('dist') }}/images/layout_img/3828547.jpg" alt="#">
                </div>
            </div>
        </div>
        <br>
        <h3>PAGE IS FORBIDDEN !</h3>
        <p class="center">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
        <div class="center"><a class="main_bt" href="{{ route('er') }}">Go To Home Page</a>
        </div>
    </div>
@endsection  --}}
