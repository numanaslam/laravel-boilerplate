<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title>Aerotickets</title>
    <meta charset="utf-8" />
    <meta name="description" content="Aerotickets" />
    <meta name="keywords" content="Aerotickets" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Aerotickets" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="Aerotickets" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="{{ url('metronic/assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ url('metronic/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('metronic/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('{{ url('metronic/assets/media/auth/bg10.jpeg') }}');
            }

            [data-theme="dark"] body {
                background-image: url('{{ url('metronic/assets/media/auth/bg10-dark.jpeg') }}');
            }
        </style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <!--begin::Image-->
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="{{ url('metronic/assets/media/auth/agency.png') }}" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="{{ url('metronic/assets/media/auth/agency-dark.png') }}" alt="" />
                    <!--end::Image-->
                    <!--begin::Title-->
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Aerotickets</h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="text-gray-600 fs-base text-center fw-semibold">Login to Continue
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <!--begin::Wrapper-->
                <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
                    <!--begin::Content-->
                    <div class="w-md-400px">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="lgn_form" method="POST"
                            data-kt-redirect-url="user/validation" action="user/validation">
                            {{ @csrf_field() }}
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                {{-- <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div> --}}
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Login options-->

                            <!--end::Login options-->
                            <!--begin::Separator-->
                            <div class="separator separator-content my-14">
                                <span class="w-125px text-gray-500 fw-semibold fs-7">login with email</span>
                            </div>
                            <!--end::Separator-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">


                                @include('admin.partials.alerts')
                                {{-- @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}

                                    </div>
                                @endif --}}
                            </div>
                            <div class="fv-row mb-8">
                                <!--begin::Email-->

                                <label class="form-label">Email Address</label>

                                <input type="text" placeholder="Email" name="email" id="email"
                                    autocomplete="off" class="form-control bg-transparent"
                                    value="{{ old('email') }}" />
                                <!--end::Email-->
                                <div class="fv-plugins-message-container invalid-feedback" id="email_err">
                                    @if ($errors->has('email'))
                                        {{ $errors->first('email') }}
                                    @endif
                                </div>
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <label class="form-label">Password</label>
                                <input type="password" placeholder="Password" id="password" name="password"
                                    autocomplete="off" class="form-control bg-transparent" />
                                <div class="fv-plugins-message-container invalid-feedback" id="password_err">
                                    @if ($errors->has('password'))
                                        {{ $errors->first('password') }}
                                    @endif
                                </div>
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <!--begin::Link-->
                                {{-- <a href="authentication/layouts/overlay/reset-password.html" class="link-primary">Forgot
                            Password ?</a> --}}
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Sign In</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                            <!--begin::Sign up-->
                            {{-- <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                                <a href="/register" class="link-primary">Sign up</a>
                            </div> --}}
                            <!--end::Sign up-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ url('metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ url('metronic/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->

    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    <script>
        $(document).ready(function() {

            $("#lgn_form").submit(function(e) {
                var err = false;
                var eml = $("#email").val();
                var password = $("#password").val();
                if (eml === '') {
                    $('#email_err').html("Email Cannot be empty");
                    err = true;
                }
                if (password === '') {
                    $('#pass_2_err').html("Password Cannot be empty");
                    err = true;
                }

                if (err == true) {
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again. ",
                        icon: "error",
                        buttonsStyling: !0,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
<!--end::Body-->

</html>
