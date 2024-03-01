
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('master.dash')
@section('konten')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Dashboard</h2>
            </div>
        </div>
    </div>
    <div class="row column1">
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('mentor.index') }}">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div> 
                            <i class="fa fa-user-tie yellow_color fa-beat-fade"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ $mentor }}</p>
                            <p class="head_couter">Mentor</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('mahasantri.index') }}">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div> 
                            <i class="fa-solid fa-users green_color fa-flip"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ $mahasantri }}</p>
                            <p class="head_couter">Mahasantri</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('setoran.index') }}">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div> 
                            <i class="fa fa-cloud-download blue1_color fa-bounce"></i>
                        </div>
                        </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ $setoran }}</p>
                            <p class="head_couter">Setoran</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                    <div> 
                        <i class="fa fa-comments-o red_color fa-shake"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <p class="total_no">54</p>
                        <p class="head_couter">Comments</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    

