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

<body class="inner_page error_404">
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="error_page">
                    <div class="center">
                        <div class="error_icon">
                            <img class="img-responsive" src="{{ asset('dist') }}/images/layout_img/error.png"
                                alt="#">
                        </div>
                    </div>
                    <br>
                    <h3>PAGE NOT FOUND !</h3>
                    <P>YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</P>
                    <div class="center"><a class="main_bt" href="{{ route('dashboard') }}">Go To Home Page</a>
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
