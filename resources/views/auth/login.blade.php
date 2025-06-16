<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../">
    <link rel="shortcut icon" href="{{ asset('logo-sinjai.png') }}" />
    <title>{{ config('app.name') }} | Login</title>
    <meta charset="utf-8" />
    <meta property="og:description"
        content="Arvala Mockup is a professional product mockup template designed for digital goods. Perfect for creators and entrepreneurs." />
    <meta name="keywords"
        content="product mockup template, digital product mockup, marketplace mockup design, sell mockup templates, professional product mockups, digital goods mockup, mockup for creators, product presentation template, high-quality mockup designs, downloadable mockup templates, creative product mockups, mockup marketplace template, sell digital mockups, product display templates, mockup design for entrepreneurs, digital asset mockups, customizable mockup templates, premium mockup designs, mockup for digital products, product visualization templates">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Kilq - Professional Product Mockup Template for Digital Goods" />
    <meta property="og:description"
        content="Kilq is a dynamic product mockup template designed to help creators and entrepreneurs showcase their digital products with professional, high-quality mockups. Perfect for selling and presenting digital goods in a visually appealing way." />
    <meta property="og:url" content="https://arvalamockup.com/" />
    <meta property="og:site_name" content="Kilq Mockup" />
    <meta property="og:image" content="https://arvalamockup.com/logo_arvala.png" />
    <meta property="og:image:alt" content="Kilq Mockup Preview" />
    <link rel="canonical" href="https://arvalamockup.com/" />
    <meta name="google-site-verification" content="FnO2dJiuVYaHHdnvK8oXap9nXg8FuI7ayeh6i1J7nEE" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!-- Tambahkan ini di <head> HTML kamu -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/jquery-ui/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body data-kt-name="metronic" id="kt_body"
    class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column justify-content-center flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-none d-lg-flex justify-content-center align-items-center w-50">
                <img src="{{ asset('logo-sinjai.png') }}" style="width: 200px" alt="">
                <div class="ms-3 d-flex align-items-center" style="height: 100%;">
                    <div class="fw-bolder text-dark"
                        style="font-size: 6em; line-height: 0.85; font-family: 'Poppins', sans-serif;">
                        <div>Pemdes</div>
                        <div>Puncak</div>
                    </div>
                </div>
            </div>
            <!--begin::Body-->
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 p-10">
                <!--begin::Wrapper-->
                <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                    <!--begin::Body-->
                    <div class="py-20 shadow-lg"
                        style="background: rgb(110 101 101 / 50%); padding: 50px; border-radius: 10px">
                        <div class="d-flex d-lg-none justify-content-center align-items-center"
                            style="margin-bottom: 10px">
                            <img src="{{ asset('logo-sinjai.png') }}" style="width: 80px;" alt="">
                            <div class="ms-3 d-flex align-items-center" style="height: 100%;">
                                <div class="fw-bolder text-dark"
                                    style="font-size: 2.5em; line-height: 0.85; font-family: 'Poppins', sans-serif;">
                                    <div>Pemdes</div>
                                    <div>Puncak</div>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="form w-100" method="POST" action="{{ route('login.login-proses') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-white fw-bolder mb-3">LOGIN</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-white fw-semibold fs-6">Masukkan data anda</div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Username" name="username"
                                    value="{{ old('username') }}" autocomplete="off" class="form-control" />
                                @error('username')
                                    <small class="error text-danger">{{ $message }}</small>
                                @enderror
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <div class="position-relative">
                                            <input placeholder="Password" type="password" name="password"
                                                autocomplete="off" class="form-control" />
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>
                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Submit button-->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Login</span>
                                    <!--end::Indicator label-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/custom/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script><!--begin::Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/panel.js') }}"></script>
    <!--end::Custom Javascript-->
    @if ($message = Session::get('failed'))
        <script>
            swal.fire({
                title: "Eror",
                text: "{{ $message }}",
                icon: "warning",
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif

    @if ($message = Session::get('success'))
        <script>
            swal.fire({
                title: "Sukses",
                text: "{{ $message }}",
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif
</body>
<!--end::Body-->

</html>
