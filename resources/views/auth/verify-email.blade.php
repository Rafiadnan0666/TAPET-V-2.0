{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/custom.css" />
    <!-- calendar file css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/js/semantic.min.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.{{ asset('dist') }}/js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="inner_page login">
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="login_section">
                    <div class="logo_login">
                        <div class="center">
                            <img width="100" src="{{ asset('dist') }}/images/logo/koran.png" alt="#" />
                        </div>
                    </div>
                    <div class="login_form">
                        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                            Syukran, sudah register di aplikasi TAPET V-2-0 ini, silahkan verifikasi email terlebih
                            dahulu
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                A new verification link has been sent to the email address you provided during
                                registration.
                            </div>
                        @endif

                        <div class="mt-4 flex items-center justify-between">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <button class="main_bt" type="submit">Resend Verification Email</button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit"
                                    class="underline btn btn-danger mt-3 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('dist') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dist') }}/js/popper.min.js"></script>
    <script src="{{ asset('dist') }}/js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="{{ asset('dist') }}/js/animate.js"></script>
    <!-- select country -->
    <script src="{{ asset('dist') }}/js/bootstrap-select.js"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('dist') }}/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ asset('dist') }}/js/custom.js"></script>
</body>

</html>
