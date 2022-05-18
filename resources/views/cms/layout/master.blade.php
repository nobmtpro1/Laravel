<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <base href="{{asset('')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{now()}}">
    <link rel="shortcut icon" href="cms-html/assets/images/logo/logo.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="cms-html/assets/css/bootstrap.css">
    <link rel="stylesheet" href="cms-html/assets/css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cms-html/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="cms-html/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="cms-html/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="libs/loader.css">
    <style>
        body {
            animation: fadein 500ms ease-out;
        }

        @keyframes fadein {
            0% {
                opacity: 0.5;
                transform: translateY(-5px)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }
    </style>

</head>

<body>
    <div class="loader2">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>
    @csrf
    @include('cms.layout.sidebar')
    <div id="main">
        <header class="mb-3">
            <a class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>@yield('title')</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="{{route('cms.change_password')}}" class="pjax">Change
                                    password</a></li>
                            <li class="breadcrumb-item "><a href="{{route('cms.logout')}}">Logout</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="page-content">
            @yield('content')
        </div>
    </div>


  
    
    <script src="cms-html/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="cms-html/assets/js/bootstrap.bundle.min.js"></script>
    <script src="cms-html/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pjax@0.2.8/pjax.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="cms-html/assets/js/main.js"></script>
    <script>
        $(document).ready(function () {
                $('.loader2').removeClass('active')
            })
            
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            if (!$('.dataTable-input').lenght) {
                    const table1 = document.querySelector('#table1');
                    const dataTable = new simpleDatatables.DataTable(table1);
                }

            $(document).on('change','.imageInput',function () {
			$( this ).next().attr( 'src', URL.createObjectURL( $( this )[ 0 ].files[ 0 ] ) )
            })
            $(document).on('click','.cancel-image',function () {
                    $( this ).parent().find( 'img' ).attr('src','')
                    $( this ).parent().find( '[type="hidden"]' ).val('')
            })

            console.log(123)
    </script>

    @yield('js')

    <script>
        $(document).on('click','a.pjax',function () {
                $('.loader2').addClass('active')
            })
    </script>

</body>

</html>