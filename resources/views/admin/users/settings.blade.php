<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
@include('admin.partials.head')
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-sidebar-stacked="true" data-kt-app-toolbar-enabled="true"
    class="app-default">
    <!--begin::Theme mode setup on page load-->

    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            @include('admin.partials.header')
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                @include('admin.partials.sidebar')
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-4 py-lg-6 mb-8 mb-lg-10" data-kt-sticky="true"
                            data-kt-sticky-name="app-toolbar-sticky"
                            data-kt-sticky-offset="{default: 'false', lg: '300px'}">
                            <!--begin::Toolbar container-->


                            <div id="kt_app_toolbar_container"
                                class="app-container container-xxl d-flex flex-stack flex-wrap flex-lg-nowrap gap-4">
                                <!--begin::Toolbar wrapper-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Logo-->
                                    <img src="{{ url('metronic/assets/media/svg/brand-logos/layer.svg') }}"
                                        class="w-40px me-5" alt="" />
                                    <!--end::Logo-->
                                    <!--begin::Page title-->
                                    <div class="page-title py-2 py-sm-0 d-flex flex-column justify-content-center me-3">
                                        <!--begin::Title-->
                                        <h1
                                            class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                            User profile Settings
                                            <!--begin::Description-->
                                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                                <!--begin::Item-->
                                                <li class="breadcrumb-item text-muted">
                                                    <a href="/" class="text-muted text-hover-primary">Home</a>
                                                </li>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <li class="breadcrumb-item">
                                                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                                </li>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <li class="breadcrumb-item text-muted">User</li>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <li class="breadcrumb-item">
                                                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                                </li>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <li class="breadcrumb-item text-muted">All</li>
                                                <!--end::Item-->
                                            </ul>
                                            <!--end::Description-->
                                        </h1>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Page title-->
                                </div>
                                <!--end::Toolbar wrapper=-->
                                <!--begin::Toolbar wrapper=-->
                                <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-4 gap-lg-10">
                                    <!--begin::Actions-->
                                    <a href="#" onclick="history.back()"
                                        class="btn btn-flex btn-primary btn-sm h-40px btn-light fw-bold"
                                        data-kt-menu-placement="bottom-end">Back</a>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Toolbar wrapper=-->
                            </div>

                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">

                                @include('admin.partials.alerts')

                                <form class="form w-100" novalidate="novalidate" id="notes_form" method="POST"
                                    action="{{ url('users/addUser') }}">
                                    {{ @csrf_field() }}

                                </form>



                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    @include('admin.partials.footer')
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->

    <!--begin::Javascript-->
    @include('admin.partials.scripts')
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->
<script>
    $(document).ready(function() {

        $("#notes_form").submit(function(e) {
            var err = false;
            var title = $("#title").val();
            var content = $("#content").val();
            if (title === '') {
                $('#title_err').html("Title Cannot be empty");
                err = true;
            }
            if (content === '') {
                $('#content_err').html("content Cannot be empty");
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

</html>

