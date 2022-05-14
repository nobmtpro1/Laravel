<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{asset('')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cms-html/assets/css/bootstrap.css">
    <link rel="stylesheet" href="cms-html/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="cms-html/assets/css/app.css">
    <link rel="stylesheet" href="cms-html/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="cms-html/logo.png" type="image/x-icon">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo" style="width:200px;height:auto;margin-bottom:50px">
                        <a href="{{route('cms.dashboard')}}" style="width:200px;height:auto"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>

                    <form action="{{route('cms.login')}}" method="post">
                        @if (!empty(session('error')))
                        <div class="alert alert-danger" /> {{session('error')}}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span> <br>
                        @endforeach
                    </ul>
                </div>
                @endif
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Username" required
                        name="username" value="{{old('username')}}">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password" required
                        name="password" value="{{old('password')}}">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="1" id="flexCheckDefault"
                        name="remember">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

    </div>
</body>

</html>