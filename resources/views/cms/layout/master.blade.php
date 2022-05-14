<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{asset('')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cms-html/assets/css/bootstrap.css">

    <link rel="stylesheet" href="cms-html/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="cms-html/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="cms-html/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="cms-html/assets/css/app.css">
    <link rel="stylesheet" href="libs/loader.css">
    <link rel="shortcut icon" href="cms-html/logo.png" type="image/x-icon">
    <script src="cms-html/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="cms-html/assets/js/bootstrap.bundle.min.js"></script>

    <script src="cms-html/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pjax@0.2.8/pjax.min.js"></script>

</head>

<body>
    <div class="loader"></div>

    {{-- Start App --}}
    <div id="app">
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
                                <li class="breadcrumb-item "><a href="{{route('cms.change_password')}}"
                                        class="pjax">Change
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



        <script>
            $('#app').ready(function () {
                let table1 = document.querySelector('#table1');
                let dataTable = new simpleDatatables.DataTable(table1);
            })
        </script>

        <script>
            $('#app').on('change','.imageInput',function () {
			$( this ).next().attr( 'src', URL.createObjectURL( $( this )[ 0 ].files[ 0 ] ) )
            })
            $('#app').on('click','.cancel-image',function () {
                    $( this ).parent().find( 'img' ).attr('src','')
                    $( this ).parent().find( '[type="hidden"]' ).val('')
            })
        </script>

        <script>
            $('.loader').removeClass('active')
            $('.loader').addClass('finish')
        </script>

        <script src="cms-html/assets/js/main.js"></script>

        <script>
            var pjax = new Pjax({
                elements: "a.pjax",
                selectors: [
                    "title",
                    "#app"
                ]
            })
    
        $('#app').on('click','a.pjax',function () {
            $('.loader').removeClass('finish')
            $('.loader').addClass('active')
        })
        </script>

        @yield('js')

    </div>
    {{-- End App --}}

</body>

</html>