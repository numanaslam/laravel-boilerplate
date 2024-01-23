<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
@include('admin.partials.head')
<link href="{{ url('metronic/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
    type="text/css" />
<script src="{{ url('metronic/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--end::Head-->
<!--begin::Body-->
<meta name="csrf-token" content="{{ csrf_token() }}">

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-sidebar-stacked="true" data-kt-app-toolbar-enabled="true"
    data-kt-app-sidebar-secondary-collapse="on" class="app-default">



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
                            @include('admin.partials.topbar')
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">

                                @include('admin.partials.alerts')



                                {{-- --------------------  Search -------------- --}}
                                <div class="row  mt-5">
                                    <div class="col-md-12 mb-5">
                                        <div class="card card-flush shadow-sm">
                                            <!--begin::Card header-->

                                            <div class="card-header collapsible cursor-pointer rotate bg-success"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#kt_docs_card_collapsible_search">
                                                <h3 class="card-title text-white">Search</h3>
                                                <div class="card-toolbar rotate-180">
                                                    <span class="svg-icon svg-icon-1">
                                                        <i class="fa-solid fa-chevron-up text-white"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="kt_docs_card_collapsible_search" class="collapse show">
                                                <div class="card-body pt-0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form id="search_search-form">

                                                                <div class="row search form-group">
                                                                    <div class="col-md-12 pt-3">
                                                                        <label class="  fs-5 fw-semibold mb-2">Search
                                                                            Key</label>
                                                                        <input type="text" id="search_s_file_number"
                                                                            name="search_s_file_number"
                                                                            placeholder="Search Key"
                                                                            class="form-control" title="">
                                                                    </div>
                                                                    {{-- <div class="col-md-4 pt-3">
                                        <label class=" fs-5 fw-semibold mb-2">Customer
                                            Name</label>
                                        <input type="text"
                                            id="search_s_customer_name"
                                            name="search_s_customer_name"
                                            placeholder="Customer Name"
                                            class="form-control" title="">
                                    </div>
                                    <div class="col-md-4 pt-3">
                                        <label
                                            class=" fs-5 fw-semibold mb-2">Email</label>
                                        <input type="text" id="search_s_email"
                                            name="search_s_email" placeholder="Email"
                                            class="form-control" title="">
                                    </div>
                                    <div class="col-md-4 pt-3">
                                        <label
                                            class=" fs-5 fw-semibold mb-2">Phone</label>
                                        <input type="text" id="search_s_phone"
                                            name="search_s_phone" placeholder="Phone"
                                            class="form-control" title="">
                                    </div>
                                    <div class="col-md-4 pt-3">
                                        <label
                                            class="  fs-5 fw-semibold mb-2">Consultant</label>
                                        <select id="search_s_consultant"
                                            name="search_s_consultant"
                                            class="form-control">
                                            @if ($users)
                                                <option value="">Please Select a
                                                    Consultant</option>
                                                @foreach ($users as $u)
                                                    <option
                                                        value="{{ $u->id }}">
                                                        {{ $u->name }}</option>
                                                @endforeach

                                            @endif
                                        </select>

                                    </div>

                                    <div class="col-md-2 pt-3">
                                        <label
                                            class="  fs-5 fw-semibold mb-2">From</label>
                                        <input type="date" id="search_s_from"
                                            name="search_s_from" placeholder="From"
                                            class="form-control" title="">
                                    </div>
                                    <div class="col-md-2 pt-3">
                                        <label
                                            class="  fs-5 fw-semibold mb-2">To</label>
                                        <input type="date" id="search_s_to"
                                            name="search_s_to" placeholder="To"
                                            class="form-control" title="">
                                    </div> --}}


                                                                </div>
                                                                <div class="row mt-5 mb-5">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="search"
                                                                            id="search" value="yes" />
                                                                        <button type="button"
                                                                            id="kt_ecommerce_add_search_submit"
                                                                            class="btn btn-primary"
                                                                            onclick="execSearch(this);">
                                                                            <span class="indicator-label">Search</span>

                                                                        </button>
                                                                        <button type="reset"
                                                                            id="kt_ecommerce_add_search_reset"
                                                                            class="btn btn-primary">
                                                                            <span class="indicator-label">Reset</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="search_html">

                                                    </div>

                                                </div>
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                    </div>
                                </div>

                                {{-- -------------------- End Search -------------- --}}



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-flush shadow-sm">
                                            <!--begin::Card header-->
                                            <div class="card-header align-items-center gap-2 gap-md-5 bg-primary">
                                                <h3 class="card-title text-white">FollowUps / Offers</h3>
                                            </div>
                                            <div id="kt_docs_fullcalendar_selectable" class="mt-2 p-5"></div>
                                        </div>

                                    </div>
                                    {{-- <div class="col-md-4 bg-white p-5">



                                    </div> --}}
                                </div>

                                {{-- --------------------  Follow Ups -------------- --}}
                                {{-- <div class="row  mt-5">
                                    <div class="col-md-12">
                                        <div class="card card-flush shadow-sm">
                                            <!--begin::Card header-->
                                            <div class="card-header align-items-center py-5 gap-2 gap-md-5 bg-primary">
                                                <h3 class="card-title text-white">FollowUps</h3>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form id="search-form">

                                                            <div class="row search form-group">
                                                                <div class="col-md-3 pt-3">
                                                                    <label class="  fs-5 fw-semibold mb-2">ID</label>
                                                                    <input type="text" id="followup_s_id" name="followup_s_id"
                                                                        placeholder="ID" class="form-control"
                                                                        title="">
                                                                </div>
                                                                <div class="col-md-3 pt-3">
                                                                    <label
                                                                        class="  fs-5 fw-semibold mb-2">Remarks</label>
                                                                    <input type="text" id="followup_s_remarks"
                                                                        name="followup_s_remarks" placeholder="Remarks"
                                                                        class="form-control" title="">
                                                                </div>
                                                                <div class="col-md-3 pt-3">
                                                                    <label class=" fs-5 fw-semibold mb-2">Date Followup</label>
                                                                    <input type="date" id="followup_s_date_followup"
                                                                        name="followup_s_date_followup" placeholder="Date Followup"
                                                                        class="form-control" title="">
                                                                </div>
                                                                <div class="col-md-3 pt-3">
                                                                    <label
                                                                        class="  fs-5 fw-semibold mb-2">Agent</label>
                                                                    <select id="followup_s_added_by" name="followup_s_added_by"
                                                                        class="form-control">
                                                                        @if ($users)
                                                                            <option value="">Please Select a
                                                                                Agent</option>
                                                                            @foreach ($users as $u)
                                                                                <option value="{{ $u->id }}">
                                                                                    {{ $u->name }}</option>
                                                                            @endforeach

                                                                        @endif
                                                                    </select>
                                                                            </div>




                                                            </div>
                                                            <div class="card-footer">
                                                                <input type="hidden" name="followup_s_search" id="followup_s_search"
                                                                    value="yes" />
                                                                <button type="submit"
                                                                    id="followup_s_search_btn"
                                                                    class="btn btn-primary">
                                                                    <span class="indicator-label">Search</span>

                                                                </button>
                                                                <button type="reset"
                                                                    id="followup_s_reset_btn"
                                                                    class="btn btn-primary">
                                                                    <span class="indicator-label">Reset</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <table id="followup_s_table"
                                                    class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                    style="width:100%">
                                                    <thead>

                                                        <tr>
                                                            <th class="fw-bold text-gray-600" style="width: 10%">ID
                                                            </th>
                                                            <th class="fw-bold text-gray-600" style="width: 30%">REMARKS</th>
                                                            <th class="fw-bold text-gray-600" style="width: 30%">DATE FOLLOWUP</th>
                                                            <th class="fw-bold text-gray-600" style="width: 30%">AGENT</th>


                                                        </tr>
                                                    </thead>
                                                </table>

                                                <!--begin::Table-->
                                                <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                    <div class="table-responsive">

                                                    </div>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- --------------------  Notifications -------------- --}}
                                <div class="row  mt-5">
                                    <div class="col-md-12">
                                        <div class="card card-flush shadow-sm">
                                            <!--begin::Card header-->

                                            <div class="card-header collapsible cursor-pointer rotate bg-warning"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#kt_docs_card_collapsible_not">
                                                <h3 class="card-title text-white">Notifications</h3>
                                                <div class="card-toolbar rotate-180">
                                                    <span class="svg-icon svg-icon-1">
                                                        <i class="fa-solid fa-chevron-up text-white"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="kt_docs_card_collapsible_not" class="collapse show">
                                                <div class="card-body pt-0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form id="notifications-search-form">

                                                                <div class="row search form-group">
                                                                    <div class="col-md-4 pt-3">
                                                                        <label
                                                                            class="  fs-5 fw-semibold mb-2">ID</label>
                                                                        <input type="text" id="s_id"
                                                                            name="s_id" placeholder="ID"
                                                                            class="form-control" title="">
                                                                    </div>
                                                                    <div class="col-md-4 pt-3">
                                                                        <label
                                                                            class=" fs-5 fw-semibold mb-2">Date</label>
                                                                        <input type="date" id="s_time_notify"
                                                                            name="s_time_notify"
                                                                            placeholder="Time Notify"
                                                                            class="form-control" title="">
                                                                    </div>
                                                                    <div class="col-md-4 pt-3">
                                                                        <label
                                                                            class="  fs-5 fw-semibold mb-2">Consultant</label>
                                                                        <select id="s_consultant" name="s_consultant"
                                                                            class="form-control">
                                                                            @if ($users)
                                                                                <option value="">Please Select a
                                                                                    Consultant</option>
                                                                                @foreach ($users as $u)
                                                                                    <option
                                                                                        value="{{ $u->id }}">
                                                                                        {{ $u->name }}</option>
                                                                                @endforeach

                                                                            @endif
                                                                        </select>
                                                                        {{-- <input type="text" id="s_consultant" name="s_consultant"
                                                                            placeholder="Consultant" class="form-control" title=""> --}}
                                                                    </div>
                                                                    <div class="col-md-4 pt-3">
                                                                        <label
                                                                            class="  fs-5 fw-semibold mb-2">Priority</label>
                                                                        <select id="s_priority" name="s_priority"
                                                                            class="form-control">
                                                                            @if ($priorities)
                                                                                <option value="">Please Select a
                                                                                    Priority Level</option>
                                                                                @foreach ($priorities as $p)
                                                                                    <option
                                                                                        value="{{ $p }}">
                                                                                        {{ $p }}</option>
                                                                                @endforeach

                                                                            @endif
                                                                        </select>

                                                                    </div>
                                                                    <div class="col-md-4 pt-3">
                                                                        <label
                                                                            class="  fs-5 fw-semibold mb-2">Message</label>
                                                                        <input type="text" id="s_message"
                                                                            name="s_message" placeholder="Message"
                                                                            class="form-control" title="">
                                                                    </div>
                                                                    <div class="col-md-4 pt-3">
                                                                        <label
                                                                            class="  fs-5 fw-semibold mb-2">Notification
                                                                            Type</label>
                                                                        <select id="s_type" name="s_type"
                                                                            class="form-control">
                                                                            @if ($types)
                                                                                <option value="">Please Select a
                                                                                    Type
                                                                                </option>
                                                                                @foreach ($types as $t)
                                                                                    <option
                                                                                        value="{{ $t }}">
                                                                                        {{ $t }}</option>
                                                                                @endforeach

                                                                            @endif
                                                                        </select>

                                                                    </div>

                                                                </div>
                                                                <div class="row mt-5 mb-5">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="search"
                                                                            id="search" value="yes" />
                                                                        <button type="submit"
                                                                            id="kt_ecommerce_add_category_submit"
                                                                            class="btn btn-primary">
                                                                            <span class="indicator-label">Search</span>

                                                                        </button>
                                                                        <button type="reset"
                                                                            id="kt_ecommerce_add_category_reset"
                                                                            class="btn btn-primary">
                                                                            <span class="indicator-label">Reset</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <table id="notifications_example2"
                                                        class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                        style="width:100%">
                                                        <thead class="border-top">

                                                            <tr>
                                                                <th class="fw-bold text-gray-600" style="width: 5%">ID
                                                                </th>
                                                                <th class="fw-bold text-gray-600" style="width: 20%">
                                                                    TIME
                                                                    NOTIFY
                                                                </th>
                                                                <th class="fw-bold text-gray-600" style="width: 25%">
                                                                    CONSULTANT
                                                                </th>
                                                                <th class="fw-bold text-gray-600" style="width: 10%">
                                                                    PRIORITY</th>
                                                                <th class="fw-bold text-gray-600" style="width: 30%">
                                                                    MESSAGE
                                                                </th>
                                                                <th class="fw-bold text-gray-600" style="width: 10%">
                                                                    TYPE
                                                                </th>


                                                            </tr>
                                                        </thead>
                                                    </table>

                                                    <!--begin::Table-->
                                                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                        <div class="table-responsive">

                                                        </div>
                                                    </div>
                                                    <!--end::Table-->
                                                </div>
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                    </div>
                                </div>

                                {{-- --------------------  Enquiries -------------- --}}
                                <div class="row  mt-5">
                                    <div class="col-md-12">
                                        <div class="card card-flush shadow-sm">
                                            <!--begin::Card header-->

                                            <div class="card-header collapsible cursor-pointer rotate bg-success"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#kt_docs_card_collapsible_enq">
                                                <h3 class="card-title text-white">Enquiries</h3>
                                                <div class="card-toolbar rotate-180">
                                                    <span class="svg-icon svg-icon-1">
                                                        <i class="fa-solid fa-chevron-up text-white"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="kt_docs_card_collapsible_enq" class="collapse show">
                                                <div class="card-body pt-0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form id="enquiry_search-form">

                                                                <div class="row search form-group">
                                                                    <div class="col-md-3 pt-3">
                                                                        <input type="text" id="enquiry_s_id"
                                                                            name="s_id" placeholder="ID"
                                                                            class="form-control" title="">
                                                                    </div>
                                                                    <div class="col-md-3 pt-3">

                                                                        <select id="enquiry_s_consultant"
                                                                            name="s_consultant"
                                                                            placeholder="Consultant"
                                                                            class="form-control">
                                                                            @if ($users)
                                                                                <option value="">Please Select a
                                                                                    Consultant</option>
                                                                                @foreach ($users as $u)
                                                                                    <option
                                                                                        value="{{ $u->id }}">
                                                                                        {{ $u->name }}</option>
                                                                                @endforeach

                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 pt-3">
                                                                        <input type="text" id="enquiry_s_full_name"
                                                                            name="s_full_name" placeholder="Passenger"
                                                                            class="form-control" title="">
                                                                    </div>
                                                                    <div class="col-md-3 pt-3">
                                                                        <input type="text" id="enquiry_s_email"
                                                                            name="s_email" placeholder="Email"
                                                                            class="form-control" title="">
                                                                    </div>
                                                                    <div class="col-md-3 pt-3">
                                                                        <input type="date"
                                                                            id="enquiry_s_created_at"
                                                                            name="s_created_at"
                                                                            placeholder="Created at"
                                                                            class="form-control" title="">
                                                                    </div>
                                                                    <div class="col-md-3 pt-3">

                                                                        <select id="enquiry_s_enquiry_type"
                                                                            name="s_enquiry_type"
                                                                            placeholder="Consultant"
                                                                            class="form-control">
                                                                            @if ($enquiry_types)
                                                                                <option value="">Please Select
                                                                                    enquiry type</option>
                                                                                @foreach ($enquiry_types as $k => $v)
                                                                                    <option
                                                                                        value="{{ $k }}">
                                                                                        {{ $v }}</option>
                                                                                @endforeach

                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 pt-3">

                                                                        <select id="enquiry_s_status" name="s_status"
                                                                            placeholder="Consultant"
                                                                            class="form-control">
                                                                            @if ($enquiry_status)
                                                                                <option value="">Please Select
                                                                                    enquiry status</option>
                                                                                @foreach ($enquiry_status as $k => $v)
                                                                                    <option
                                                                                        value="{{ $k }}">
                                                                                        {{ $v }}</option>
                                                                                @endforeach

                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-5">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="search"
                                                                            id="search" value="yes" />
                                                                        <button type="submit"
                                                                            id="enquiry_kt_ecommerce_add_category_submit"
                                                                            class="btn btn-primary">
                                                                            <span class="indicator-label">Search</span>

                                                                        </button>
                                                                        <button type="reset"
                                                                            id="enquiry_kt_ecommerce_add_category_reset"
                                                                            class="btn btn-primary">
                                                                            <span class="indicator-label">Reset</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <table id="enquiry_table"
                                                        class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                        style="width:100%">
                                                        <thead>

                                                            <tr>
                                                                <th class="fw-bold text-gray-600" style="width: 10%">
                                                                    Enquiry#</th>
                                                                <th class="fw-bold text-gray-600" style="width: 20%">
                                                                    CONSULTANT
                                                                </th>
                                                                <th class="fw-bold text-gray-600" style="width: 15%">
                                                                    PASSENGER(S)
                                                                </th>
                                                                <th class="fw-bold text-gray-600" style="width: 10%">
                                                                    Email
                                                                </th>
                                                                <th class="fw-bold text-gray-600" style="width: 15%">
                                                                    DATE
                                                                </th>
                                                                <th class="fw-bold text-gray-600" style="width: 15%">
                                                                    TYPE
                                                                </th>
                                                                <th class="fw-bold text-gray-600" style="width: 10%">
                                                                    STATUS</th>
                                                                <th class="fw-bold text-gray-600 text-end"
                                                                    style="width: 5%">
                                                                    ACTIONS</th>

                                                            </tr>
                                                        </thead>
                                                    </table>

                                                    <!--begin::Table-->
                                                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                        <div class="table-responsive">

                                                        </div>
                                                    </div>
                                                    <!--end::Table-->
                                                </div>
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                    </div>
                                </div>

                                {{-- --------------------  Ticket Orders -------------- --}}
                                <div class="row  mt-5">
                                    <div class="col-md-12">
                                        <div class="card ">
                                            <div class="card-header card-header-stretch bg-primary">
                                                <h3 class="card-title text-white">Ticket Orders</h3>
                                                <div class="card-toolbar">
                                                    <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                                        <li class="nav-item">
                                                            <a class="nav-link active btn btn-active-dark btn-color-red-600 btn-active-color-info text-white rounded-0"
                                                                data-bs-toggle="tab" href="#kt_tab_pane_7"> <i
                                                                    class="fa fa-ticket text-white"></i> Issue
                                                                Ticket</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-active-dark btn-color-red-600 btn-active-color-info text-white rounded-0"
                                                                data-bs-toggle="tab" href="#kt_tab_pane_8"> <i
                                                                    class="fa fa-times text-white"></i> Cancel
                                                                Ticket</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-active-dark btn-color-red-600 btn-active-color-info text-white rounded-0"
                                                                data-bs-toggle="tab" href="#kt_tab_pane_9"><i
                                                                    class="fa fa fa-times-circle text-white"></i>
                                                                Void</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="kt_tab_pane_7"
                                                        role="tabpanel">
                                                        <div class="row">
                                                            <table id="ticket_order_table"
                                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                style="width:100%">
                                                                <thead>

                                                                    <tr>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 15%">BOOKING ID</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">CONSOLIDATOR
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">PNR
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REQ DATE
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REQ BY</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">STATUS</th>
                                                                        <th class="fw-bold text-gray-600 text-end"
                                                                            style="width: 15%">
                                                                            ACTIONS</th>

                                                                    </tr>
                                                                </thead>


                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
                                                        <div class="row">
                                                            <table id="cancel_ticket_order_table"
                                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                style="width:100%">
                                                                <thead>

                                                                    <tr>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 15%">BOOKING ID</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">CONSOLIDATOR
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">PNR
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REQ DATE
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REQ BY</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">STATUS</th>
                                                                        <th class="fw-bold text-gray-600 text-end"
                                                                            style="width: 15%">
                                                                            ACTIONS</th>
                                                                    </tr>
                                                                </thead>


                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="kt_tab_pane_9" role="tabpanel">
                                                        <div class="row">
                                                            <table id="void_ticket_order_table"
                                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                style="width:100%">
                                                                <thead>

                                                                    <tr>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 15%">BOOKING ID</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">CONSOLIDATOR
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">PNR
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REQ DATE
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REQ BY</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">STATUS</th>
                                                                        <th class="fw-bold text-gray-600 text-end"
                                                                            style="width: 15%">
                                                                            ACTIONS</th>
                                                                    </tr>
                                                                </thead>


                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- -------------------- End Ticket Orders -------------- --}}

                                {{-- --------------------  Booking Close Requests -------------- --}}
                                <div class="row  mt-5">
                                    <div class="col-md-12">
                                        <div class="card card-flush shadow-sm">
                                            <!--begin::Card header-->

                                            <div class="card-header collapsible cursor-pointer rotate bg-success"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#kt_docs_card_collapsible_enq">
                                                <h3 class="card-title text-white">Booking Close Requests</h3>
                                                <div class="card-toolbar rotate-180">
                                                    <span class="svg-icon svg-icon-1">
                                                        <i class="fa-solid fa-chevron-up text-white"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="kt_docs_card_collapsible_enq" class="collapse show">
                                                <div class="card-body pt-0">

                                                    <table id="bcr_table"
                                                        class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                        style="width:100%">
                                                        <thead>

                                                            <tr>
                                                                <th class="fw-bold text-gray-600" style="width: 10%">
                                                                    BKG #</th>
                                                                <th class="fw-bold text-gray-600" style="width: 20%">
                                                                    DATE
                                                                </th>
                                                                <th class="fw-bold text-gray-600" style="width: 15%">
                                                                    BKG TYPE
                                                                </th>
                                                                <th class="fw-bold text-gray-600" style="width: 10%">
                                                                    BKG STATUS
                                                                </th>
                                                                @role('Administrator')
                                                                    <th class="fw-bold text-gray-600" style="width: 15%">
                                                                        REQ BY
                                                                    </th>

                                                                    <th class="fw-bold text-gray-600 text-end"
                                                                        style="width: 5%">
                                                                        ACTIONS</th>
                                                                @else
                                                                    <th class="fw-bold text-gray-600" style="width: 10%">
                                                                        STATUS
                                                                    </th>
                                                                @endrole

                                                            </tr>
                                                        </thead>
                                                        @if ($bookingCloseRequest)
                                                            @foreach ($bookingCloseRequest as $bcr)
                                                                <tr>
                                                                    <td><a
                                                                            href="/booking/details/{{ $bcr->booking_id }}">A{{ $bcr->booking_id }}</a>
                                                                    </td>
                                                                    <td>{{ date('Y-m-d H:i A', strtotime($bcr->created_at)) }}
                                                                    </td>
                                                                    <td>{{ $bcr->booking_type }}</td>
                                                                    <td>{{ $bcr->current_booking_status }}</td>
                                                                    @role('Administrator')
                                                                        <td>{{ $bcr->requested_by }}</td>
                                                                        <td><a href="booking_close_confirm.php?id="
                                                                                class="btn default btn-xs green-stripe"
                                                                                data-target="#my-ajax-modal"
                                                                                data-toggle="modal">Update</a></td>
                                                                    @else
                                                                        <td>{{ $bcr->status }}</td>
                                                                    @endrole
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="5">No Record Found</td>

                                                            </tr>
                                                        @endif
                                                        <tbody></tbody>
                                                    </table>

                                                    <!--begin::Table-->
                                                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                        <div class="table-responsive">

                                                        </div>
                                                    </div>
                                                    <!--end::Table-->
                                                </div>
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                    </div>
                                </div>

                                {{-- -------------------- End Booking Close Requests -------------- --}}


                                {{-- --------------------  Payments -------------- --}}
                                <div class="row  mt-5">
                                    <div class="col-md-12">
                                        <div class="card ">
                                            <div class="card-header card-header-stretch bg-primary">
                                                <h3 class="card-title text-white">Payments</h3>
                                                <div class="card-toolbar">
                                                    <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                                        <li class="nav-item">
                                                            <a class="nav-link active btn btn-active-dark btn-color-red-600 btn-active-color-info text-white rounded-0 m-0"
                                                                data-bs-toggle="tab" href="#kt_tab_pane_17"> <i
                                                                    class="fa fa-ticket text-white"></i> Bank Payments
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-active-dark btn-color-red-600 btn-active-color-info text-white rounded-0 m-0"
                                                                data-bs-toggle="tab" href="#kt_tab_pane_18"> <i
                                                                    class="fa fa-times text-white"></i> Cash
                                                                Ticket</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-active-dark btn-color-red-600 btn-active-color-info text-white rounded-0 m-0"
                                                                data-bs-toggle="tab" href="#kt_tab_pane_19"><i
                                                                    class="fa-solid fa-credit-card text-white"></i>
                                                                Cards</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-active-dark btn-color-red-600 btn-active-color-info text-white rounded-0 m-0"
                                                                data-bs-toggle="tab" href="#kt_tab_pane_20"><i
                                                                    class="fa fa fa-times-circle text-white"></i>
                                                                Files</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="kt_tab_pane_17"
                                                        role="tabpanel">
                                                        <div class="row">
                                                            <table id="ticket_order_table"
                                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                style="width:100%">
                                                                <thead>

                                                                    <tr>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 15%"> ID</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">DATE
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">AMOUNT
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REFERENE
                                                                        </th>

                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">STATUS</th>


                                                                    </tr>



                                                                </thead>
                                                                <tbody>
                                                                    @if ($payments)
                                                                        @foreach ($payments as $pmn)
                                                                            <tr>
                                                                                <td>{{ $pmn->id }}</td>
                                                                                <td>{{ date('Y-m-d H:i A', strtotime($pmn->transaction_date)) }}
                                                                                </td>
                                                                                <td>{{ $pmn->amount }}</td>
                                                                                <td>{{ $pmn->reference }}</td>
                                                                                <td>{!! $pmn->status !!}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td>No Record Found</td>
                                                                        </tr>
                                                                    @endif

                                                                </tbody>

                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="kt_tab_pane_18" role="tabpanel">
                                                        <div class="row">
                                                            <table id="cancel_ticket_order_table"
                                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                style="width:100%">
                                                                <thead>

                                                                    <tr>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 15%"> ID</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">DATE
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REQ BY
                                                                        </th>
                                                                        @role('Administrator')
                                                                            <th class="fw-bold text-gray-600"
                                                                                style="width: 20%">AGENT
                                                                            </th>
                                                                        @endrole
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">CONSOLIDATOR
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">AMOUNT
                                                                        </th>


                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">STATUS</th>

                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">ACTION
                                                                        </th>
                                                                    </tr>
                                                                </thead>

                                                                @if ($cash)
                                                                    @foreach ($cash as $csh)
                                                                        <tr>
                                                                            <td>{{ $csh->id }}</td>
                                                                            <td>{{ date('Y-m-d H:i A', strtotime($csh->transaction_date)) }}
                                                                            </td>
                                                                            @role('Administrator')
                                                                                <td>{{ $csh->agent }}</td>
                                                                            @endrole
                                                                            <td>{{ $csh->consolidator }}</td>
                                                                            <td>{{ $csh->amount }}</td>

                                                                            <td>{!! $csh->status !!}</td>
                                                                            @role('Administrator')
                                                                                <td><a href="cash_payment_view.php?id="
                                                                                        class="btn default btn-xs green-stripe"
                                                                                        data-target="#my-ajax-modal"
                                                                                        data-toggle="modal"><i
                                                                                            class="fa-solid fa-eye text-success"></i></a>
                                                                                </td>
                                                                            @else
                                                                                <td>N/A</td>
                                                                            @endrole

                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <tr>
                                                                        <td>No Record Found</td>
                                                                    </tr>
                                                                @endif

                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="kt_tab_pane_19" role="tabpanel">
                                                        <div class="row">
                                                            <table id="void_ticket_order_table"
                                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                style="width:100%">
                                                                <thead>

                                                                    <tr>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 15%">BOOKING ID</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REQUESTED AT</th>
                                                                        @role('Administrator')
                                                                            <th class="fw-bold text-gray-600"
                                                                                style="width: 25%">AGENT
                                                                            </th>
                                                                        @endrole
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">AMOUNT
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">STATUS
                                                                        </th>
                                                                        @role('Administrator')
                                                                            <th class="fw-bold text-gray-600 text-end"
                                                                                style="width: 15%">
                                                                                ACTIONS</th>
                                                                        @endrole

                                                                    </tr>
                                                                </thead>

                                                                @if ($cc)
                                                                    @foreach ($cc as $c)
                                                                        <tr>
                                                                            @role('Administrator')
                                                                                <td><a
                                                                                        href="/bookin/details/{{ $c->booking_id }}">A{{ $c->booking_id }}</a>
                                                                                </td>
                                                                            @else
                                                                                <td>>A{{ $c->booking_id }}</td>
                                                                            @endrole
                                                                            <td>{{ date('Y-m-d H:i A', strtotime($c->created_at)) }}
                                                                            </td>
                                                                            @role('Administrator')
                                                                                <td>{{ $c->name }}</td>
                                                                            @endrole
                                                                            <td>{{ $c->cc_amount }}</td>
                                                                            <td>{!! $c->status !!}</td>
                                                                            @role('Administrator')
                                                                                @if ($c->status == 'pending')
                                                                                    <td class="text-end"><a
                                                                                            href="javascript:;"
                                                                                            onclick="getCardChargeView({{ $c->id }})"
                                                                                            title="Charge Now"><i
                                                                                                class="fa-solid fa-credit-card"></i>
                                                                                            Charge</a></td>
                                                                                @else
                                                                                    <td class="text-end"><a
                                                                                            href="javascript:;"
                                                                                            onclick="getCardChargeDisplay({{ $c->id }})"
                                                                                            title="View Details"><i
                                                                                                class="fa-solid fa-eye text-success"></i>View</a>
                                                                                    </td>
                                                                                @endif
                                                                            @else
                                                                                <td>N/A</td>
                                                                            @endrole

                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <tr>
                                                                        <td>No Record Found</td>
                                                                    </tr>
                                                                @endif

                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="kt_tab_pane_20" role="tabpanel">
                                                        <div class="row">
                                                            <table id="void_ticket_order_table"
                                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                style="width:100%">
                                                                <thead>

                                                                    <tr>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">BKG#</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">DATE
                                                                        </th>
                                                                        @role('Administrator')
                                                                            <th class="fw-bold text-gray-600"
                                                                                style="width: 25%">REQ BY
                                                                            </th>
                                                                        @endrole
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">FILE#
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">AMOUNT</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">STATUS</th>
                                                                        <th class="fw-bold text-gray-600 text-end"
                                                                            style="width: 15%">
                                                                            ACTIONS</th>
                                                                    </tr>
                                                                </thead>

                                                                @if ($filePayments)
                                                                    @foreach ($filePayments as $c)
                                                                        <tr>
                                                                            @role('Administrator')
                                                                                <td><a
                                                                                        href="/bookin/details/{{ $c->booking_id }}">A{{ $c->booking_id }}</a>
                                                                                </td>
                                                                            @else
                                                                                <td>>A{{ $c->booking_id }}</td>
                                                                            @endrole
                                                                            <td>{{ date('Y-m-d H:i A', strtotime($c->transaction_date)) }}
                                                                            </td>
                                                                            @role('Administrator')
                                                                                <td>{{ $c->agent }}</td>
                                                                            @endrole
                                                                            <td>A{{ $c->file_no }}</td>
                                                                            <td>{{ $c->amount }}</td>
                                                                            <td>{!! $c->status !!}</td>
                                                                            @role('Administrator')
                                                                                @if ($c->status == 'pending')
                                                                                    <td class="text-end"><a
                                                                                            href="cc_charge_request_charge.php?id=' . $id . '"
                                                                                            class="btn default btn-xs green-stripe"
                                                                                            data-target="#my-ajax-modal"
                                                                                            data-toggle="modal">View</a>
                                                                                    </td>
                                                                                @else
                                                                                    <td class="text-end">N/A</td>
                                                                                @endif
                                                                            @else
                                                                                <td>N/A</td>
                                                                            @endrole

                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <tr>
                                                                        <td>No Record Found</td>
                                                                    </tr>
                                                                @endif


                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- -------------------- End Payments -------------- --}}
                                {{-- --------------------  Refunds -------------- --}}
                                <div class="row  mt-5">
                                    <div class="col-md-12">
                                        <div class="card ">
                                            <div class="card-header card-header-stretch bg-primary">
                                                <h3 class="card-title text-white">Refund Requests</h3>
                                                <div class="card-toolbar">
                                                    <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                                        <li class="nav-item">
                                                            <a class="nav-link active btn btn-active-dark btn-color-red-600 btn-active-color-info text-white rounded-0 m-0"
                                                                data-bs-toggle="tab" href="#kt_tab_pane_27"> <i
                                                                    class="fa fa-ticket text-white"></i> Cards
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-active-dark btn-color-red-600 btn-active-color-info text-white rounded-0 m-0"
                                                                data-bs-toggle="tab" href="#kt_tab_pane_28"> <i
                                                                    class="fa fa-times text-white"></i> cheque
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-active-dark btn-color-red-600 btn-active-color-info text-white rounded-0 m-0"
                                                                data-bs-toggle="tab" href="#kt_tab_pane_29"><i
                                                                    class="fa-solid fa-credit-card text-white"></i>
                                                                Bank Payments</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link btn btn-active-dark btn-color-red-600 btn-active-color-info text-white rounded-0 m-0"
                                                                data-bs-toggle="tab" href="#kt_tab_pane_30"><i
                                                                    class="fa fa fa-times-circle text-white"></i>
                                                                Cash</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="kt_tab_pane_27"
                                                        role="tabpanel">
                                                        <div class="row">
                                                            <table id="ticket_order_table"
                                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                style="width:100%">
                                                                <thead>

                                                                    <tr>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 15%"> BOOKING#</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">AMOUNT
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REQ. DATE
                                                                        </th>

                                                                        @role('Administrator')
                                                                            <th class="fw-bold text-gray-600"
                                                                                style="width: 20%">REQ. BY
                                                                            </th>
                                                                        @endrole
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">STATUS</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">ACTION
                                                                        </th>


                                                                    </tr>



                                                                </thead>
                                                                <tbody>
                                                                    @if ($refunds)
                                                                        @foreach ($refunds as $pmn)
                                                                            @if ($pmn->payment_method == 'credit_card')
                                                                                <tr>
                                                                                    @role('Administrator')
                                                                                        <td><a
                                                                                                href="/booking/details/{{ $pmn->booking_id }}">A{{ $pmn->booking_id }}</a>
                                                                                        </td>
                                                                                    @else
                                                                                        <td>>A{{ $pmn->booking_id }}</td>
                                                                                    @endrole
                                                                                    <td>{{ $pmn->amount * -1 }}</td>
                                                                                    <td>{{ date('Y-m-d H:i A', strtotime($pmn->created_at)) }}
                                                                                    </td>
                                                                                    @role('Administrator')
                                                                                        <td>{{ $pmn->requestedBy }}</td>
                                                                                    @endrole
                                                                                    <td>{!! $pmn->status !!}</td>
                                                                                    @role('Administrator')
                                                                                        <td><a href="javascript:;"
                                                                                                class="btn default btn-xs green-stripe"
                                                                                                data-target="#my-ajax-modal"
                                                                                                data-toggle="modal">View/Update</a>
                                                                                        </td>
                                                                                    @else
                                                                                        <td>>N/A</td>
                                                                                    @endrole
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td>No Record Found</td>
                                                                        </tr>
                                                                    @endif

                                                                </tbody>

                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="kt_tab_pane_28" role="tabpanel">
                                                        <div class="row">
                                                            <table id="cancel_ticket_order_table"
                                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                style="width:100%">
                                                                <thead>

                                                                    <tr>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 15%"> BOOKING#</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">AMOUNT
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REQ. DATE
                                                                        </th>

                                                                        @role('Administrator')
                                                                            <th class="fw-bold text-gray-600"
                                                                                style="width: 20%">REQ. BY
                                                                            </th>
                                                                        @endrole
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">STATUS</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">ACTION
                                                                        </th>


                                                                    </tr>



                                                                </thead>
                                                                <tbody>
                                                                    @if ($refunds)
                                                                        @foreach ($refunds as $pmn)
                                                                            @if ($pmn->payment_method == 'cheque_refund')
                                                                                <tr>
                                                                                    @role('Administrator')
                                                                                        <td><a
                                                                                                href="/booking/details/{{ $pmn->booking_id }}">A{{ $pmn->booking_id }}</a>
                                                                                        </td>
                                                                                    @else
                                                                                        <td>>A{{ $pmn->booking_id }}</td>
                                                                                    @endrole
                                                                                    <td>{{ $pmn->amount * -1 }}</td>
                                                                                    <td>{{ date('Y-m-d H:i A', strtotime($pmn->created_at)) }}
                                                                                    </td>
                                                                                    @role('Administrator')
                                                                                        <td>{{ $pmn->requestedBy }}</td>
                                                                                    @endrole
                                                                                    <td>{{ $pmn->status }}</td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td>No Record Found</td>
                                                                        </tr>
                                                                    @endif

                                                                </tbody>

                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="kt_tab_pane_29" role="tabpanel">
                                                        <div class="row">
                                                            <table id="void_ticket_order_table"
                                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                style="width:100%">
                                                                <thead>

                                                                    <tr>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 15%"> BOOKING#</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">AMOUNT
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">REQ. DATE
                                                                        </th>

                                                                        @role('Administrator')
                                                                            <th class="fw-bold text-gray-600"
                                                                                style="width: 20%">REQ. BY
                                                                            </th>
                                                                        @endrole
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">STATUS</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">ACTION
                                                                        </th>


                                                                    </tr>



                                                                </thead>
                                                                <tbody>
                                                                    @if ($refunds)
                                                                        @foreach ($refunds as $pmn)
                                                                            @if ($pmn->payment_method == 'bank_refund')
                                                                                <tr>
                                                                                    @role('Administrator')
                                                                                        <td><a
                                                                                                href="/booking/details/{{ $pmn->booking_id }}">A{{ $pmn->booking_id }}</a>
                                                                                        </td>
                                                                                    @else
                                                                                        <td>>A{{ $pmn->booking_id }}</td>
                                                                                    @endrole
                                                                                    <td>{{ $pmn->amount * -1 }}</td>
                                                                                    <td>{{ date('Y-m-d H:i A', strtotime($pmn->created_at)) }}
                                                                                    </td>
                                                                                    @role('Administrator')
                                                                                        <td>{{ $pmn->requestedBy }}</td>
                                                                                    @endrole
                                                                                    <td>{{ $pmn->status }}</td>
                                                                                    @role('Administrator')
                                                                                        <td><a href="javascript:;"
                                                                                                class="btn default btn-xs green-stripe"
                                                                                                data-target="#my-ajax-modal"
                                                                                                data-toggle="modal">View/Update</a>
                                                                                        </td>
                                                                                    @else
                                                                                        <td>>N/A</td>
                                                                                    @endrole
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td>No Record Found</td>
                                                                        </tr>
                                                                    @endif

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="kt_tab_pane_30" role="tabpanel">
                                                        <div class="row">
                                                            <table id="void_ticket_order_table"
                                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                                style="width:100%">
                                                                <thead>

                                                                    <tr>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 15%"> BOOKING#</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">AMOUNT
                                                                        </th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">REQ. DATE
                                                                        </th>

                                                                        @role('Administrator')
                                                                            <th class="fw-bold text-gray-600"
                                                                                style="width: 20%">REQ. BY
                                                                            </th>
                                                                        @endrole
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 10%">STATUS</th>
                                                                        <th class="fw-bold text-gray-600"
                                                                            style="width: 20%">ACTION
                                                                        </th>


                                                                    </tr>



                                                                </thead>
                                                                <tbody>
                                                                    @if ($refunds)
                                                                        @foreach ($refunds as $pmn)
                                                                            @if ($pmn->payment_method == 'cheque_refund')
                                                                                <tr>
                                                                                    @role('Administrator')
                                                                                        <td><a
                                                                                                href="/booking/details/{{ $pmn->booking_id }}">A{{ $pmn->booking_id }}</a>
                                                                                        </td>
                                                                                    @else
                                                                                        <td>>A{{ $pmn->booking_id }}</td>
                                                                                    @endrole
                                                                                    <td>{{ $pmn->amount * -1 }}</td>
                                                                                    <td>{{ date('Y-m-d H:i A', strtotime($pmn->created_at)) }}
                                                                                    </td>
                                                                                    @role('Administrator')
                                                                                        <td>{{ $pmn->requestedBy }}</td>
                                                                                    @endrole
                                                                                    <td>{{ $pmn->status }}</td>
                                                                                    @role('Administrator')
                                                                                        <td><a href="javascript:;"
                                                                                                class="btn default btn-xs green-stripe"
                                                                                                data-target="#my-ajax-modal"
                                                                                                data-toggle="modal">View/Update</a>
                                                                                        </td>
                                                                                    @else
                                                                                        <td>>N/A</td>
                                                                                    @endrole
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td>No Record Found</td>
                                                                        </tr>
                                                                    @endif

                                                                </tbody>


                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- -------------------- End Refunds -------------- --}}



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
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
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
    <div class="modal fade" tabindex="-1" id="kt_modal_stacked_1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Booking Ticket Details</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body" id="kt_modal_stacked_1_body">
                    <div class="text-center" id="loading">
                        <div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>

                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="modalTitle">Edit </h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->


                </div>

                <div class="modal-body pt-5 pb-15 px-5 px-xl-20" id="modalBody">


                </div>

            </div>

        </div>
    </div>
    <!--begin::Javascript-->
    @include('admin.partials.scripts')
    <!--end::Custom Javascript-->
    <script>
        $(document).ready(function() {

            var calendarEl = document.getElementById("kt_docs_fullcalendar_selectable");
            var calendar1 = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay"
                },
                eventClick: function(info) {
                    console.log(info.event);
                },
                moreLinkClick: function(info) {
                    // console.log(info);
                    // console.log(info.date);
                    //info.preventDefault();
                    $('#search').val('yes');
                    var date = new Date(info.date);
                    var isoDate = date.toISOString().substring(0, 10);
                    $('#s_time_notify').val(isoDate);
                    var formData = $('#notifications-search-form').serializeArray();
                    var searchData = {};
                    for (var i = 0; i < formData.length; i++) {
                        searchData[formData[i].name] = formData[i].value;
                    }
                    var table = $('#notifications_example2').DataTable();
                    table.search(JSON.stringify(searchData)).draw();
                    $('html, body').animate({
                        scrollTop: '+=' + 500 + 'px'
                    }, 'slow');
                },

                initialDate: "{{ date('Y-m-d') }}",
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: '/dashboard/getCalenderData'
            });

            // $(".fc-daygrid-day-bottom").css("margin-top","-2%");
            function loadEvents() {
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ url('dashboard/getCalenderData') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        _token: token,
                    },
                    success: function(data) {
                        // clear existing events
                        calendar.removeAllEvents();

                        // add new events to calendar
                        $.each(data, function(index, event) {
                            calendar.addEvent(event);
                        });
                    }
                });
            }



            // url: '/dashboard/getCalenderData',
            //         method: 'POST',
            //         //dataType: 'json',
            //         data: {
            //             _token: $('meta[name="csrf-token"]').attr('content'),
            //         },
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         failure: function() {
            //             alert('Failed to load calendar events');
            //         }



            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay"
                },
                initialDate: "2020-09-12",
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,


                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [{
                        title: "All Day Event",
                        start: "2020-09-01"
                    },
                    {
                        title: "Long Event",
                        start: "2020-09-07",
                        end: "2020-09-10"
                    },
                    {
                        groupId: 999,
                        title: "Repeating Event",
                        start: "2020-09-09T16:00:00"
                    },
                    {
                        groupId: 999,
                        title: "Repeating Event",
                        start: "2020-09-16T16:00:00"
                    },
                    {
                        title: "Conference",
                        start: "2020-09-11",
                        end: "2020-09-13"
                    },
                    {
                        title: "Meeting",
                        start: "2020-09-12T10:30:00",
                        end: "2020-09-12T12:30:00"
                    },
                    {
                        title: "Lunch",
                        start: "2020-09-12T12:00:00"
                    },
                    {
                        title: "Meeting",
                        start: "2020-09-12T14:30:00"
                    },
                    {
                        title: "Happy Hour",
                        start: "2020-09-12T17:30:00"
                    },
                    {
                        title: "Dinner",
                        start: "2020-09-12T20:00:00"
                    },
                    {
                        title: "Birthday Party",
                        start: "2020-09-13T07:00:00"
                    },
                    {
                        title: "Click for Google",
                        url: "http://google.com/",
                        start: "2020-09-28"
                    }
                ]
            });

            // calendar.render();
            calendar1.render();
            calendar1.setOption('aspectRatio', 3);
            // calendar1.on('dateClick', function(info) {
            //     console.log('clicked on ' + info.dateStr);
            // });

            // ------------------------------- Notifications Area -------------------------------


            var s_id = $('#s_id');
            var s_time_notify = $('#s_time_notify');
            var s_consultant = $('#s_consultant');
            var s_priority = $('#s_priority');
            var s_message = $('#s_message');
            var s_type = $('#s_type');
            var table = $('#notifications_example2').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('notifications/test') }}',
                    type: 'GET'
                },
                columns: [{
                        data: 'id_'
                    },
                    {
                        data: 'time_notify'
                    },
                    {
                        data: 'consultant'
                    },
                    {
                        data: 'priority'
                    },
                    {
                        data: 'message'
                    },
                    {
                        data: 'type'
                    },

                ],
                "pageLength": 5,
                order: [0, 'desc']
            });
            $('#notifications-search-form').on('submit', function(e) {
                e.preventDefault();
                $('#search').val('yes');
                var formData = $('#notifications-search-form').serializeArray();
                var searchData = {};
                for (var i = 0; i < formData.length; i++) {
                    searchData[formData[i].name] = formData[i].value;
                }
                var table = $('#notifications_example2').DataTable();
                table.search(JSON.stringify(searchData)).draw();
            });
            $('#notifications-search-form').on('reset', function(e) {
                //e.preventDefault();

                document.getElementById("#notifications-search-form").reset();
                $('#search').val('');
                var formData = [];
                var searchData = {};
                for (var i = 0; i < formData.length; i++) {
                    searchData[formData[i].name] = formData[i].value;
                }
                var table = $('#notifications_example2').DataTable();
                table.search(JSON.stringify(searchData)).draw();

            });
            // ------------------------------- Notifications Area End -------------------------------
            // ------------------------------- Enquiry -------------------------------

            var s_id = $('#enquiry_s_id');
            var s_consultant = $('#enquiry_s_consultant');
            var s_full_name = $('#enquiry_s_full_name');
            var s_email = $('#enquiry_s_email');
            var s_created_at = $('#enquiry_s_created_at');
            var s_enquiry_type = $('#enquiry_s_enquiry_type');
            var s_status = $('#enquiry_s_status');
            var enquiry_table = $('#enquiry_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('enquiry/test') }}',
                    type: 'GET'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'consultant'
                    },
                    {
                        data: 'full_name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'created_at',
                        render: function(data, type, row) {
                            return formatDate(data);

                        }
                    },
                    {
                        data: 'enquiry_type'
                    },
                    {
                        data: 'status',

                    },
                    {
                        data: null,
                        sortable: false,
                        render: function(data, type, row) {
                            return '<div class="text-end"><a href="/enquiry/details/' + data.id +
                                '" class="px-2"><i class="fa-solid fa-eye text-success"></i></a><a href="#" onclick="del(' +
                                data.id +
                                ', this)" class="px-2"><i class="fa-solid fa-trash text-danger"></i></a></div>';

                        }

                    }

                ],
                order: [0, 'desc']

            });

            $('#enquiry_search-form').on('submit', function(e) {
                e.preventDefault();
                $('#enquiry_search').val('yes');
                var formData = $('#enquiry_search-form').serializeArray();
                var searchData = {};
                for (var i = 0; i < formData.length; i++) {
                    searchData[formData[i].name] = formData[i].value;
                }
                enquiry_table.search(JSON.stringify(searchData)).draw();
            });
            $('#enquiry_search-form').on('reset', function(e) {
                //e.preventDefault();
                $('#search').val('');
                document.getElementById("enquiry_search-form").reset();
                var formData = $('#enquiry_search-form').serializeArray();
                var searchData = {};
                for (var i = 0; i < formData.length; i++) {
                    searchData[formData[i].name] = formData[i].value;
                }
                enquiry_table.search(JSON.stringify(searchData)).draw();
            });


            // ------------------------------- Enquiry  end -------------------------------
            // ------------------------------- Ticket Order -------------------------------
            var table = $('#ticket_order_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('dashboard/ticketOrders') }}',
                    type: 'GET'
                },
                columns: [{
                        data: 'booking_id'
                    },
                    {
                        data: 'consolidatorName'
                    },
                    {
                        data: 'pnr'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'requestedBy'
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            var badgeClass = (data == 'request') ? 'badge-primary' :
                                'badge-success';
                            return '<span class="badge ' + badgeClass + '">' + capitalize(data) +
                                '</span>';
                        }
                    },
                    {
                        data: null,
                        sortable: false,
                        render: function(data, type, row) {
                            return '<div class="text-end"><a  href="javascript:;" onclick="getTicketView( ' +
                                data.id +
                                ' )" class="px-2"><i class="fa-solid fa-eye text-success"></i></a><a href="#" onclick="del(' +
                                data.id +
                                ', this)" class="px-2"><i class="fa-solid fa-trash text-danger"></i></a></div>';

                        }

                    }

                ],
                order: [0, 'desc']

            });
            // ------------------------------- Ticket Order End -------------------------------
            // ------------------------------- Cancel Ticket Order -------------------------------
            var table = $('#cancel_ticket_order_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('dashboard/cancelTicketOrders') }}',
                    type: 'GET'
                },
                columns: [{
                        data: 'booking_id'
                    },
                    {
                        data: 'consolidatorName'
                    },
                    {
                        data: 'pnr'
                    },
                    {
                        data: 'return_date'
                    },
                    {
                        data: 'requestedBy'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: null,
                        sortable: false,
                        render: function(data, type, row) {
                            return '<div class="text-end"><a  href="javascript:;" onclick="getTicketView( ' +
                                data.id +
                                ' )" class="px-2"><i class="fa-solid fa-eye text-success"></i></a><a href="#" onclick="del(' +
                                data.id +
                                ', this)" class="px-2"><i class="fa-solid fa-trash text-danger"></i></a></div>';

                        }

                    }

                ],
                order: [0, 'desc']

            });
            // ------------------------------- Cancel Ticket Order End -------------------------------

            // ------------------------------- Void Ticket Order -------------------------------
            var table = $('#void_ticket_order_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('dashboard/voidTicketOrders') }}',
                    type: 'GET'
                },
                columns: [{
                        data: 'booking_id'
                    },
                    {
                        data: 'consolidatorName'
                    },
                    {
                        data: 'pnr'
                    },
                    {
                        data: 'return_date'
                    },
                    {
                        data: 'requestedBy'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: null,
                        sortable: false,
                        render: function(data, type, row) {
                            return '<div class="text-end"><a  href="javascript:;" onclick="getTicketView( ' +
                                data.id +
                                ' )" class="px-2"><i class="fa-solid fa-eye text-success"></i></a><a href="#" onclick="del(' +
                                data.id +
                                ', this)" class="px-2"><i class="fa-solid fa-trash text-danger"></i></a></div>';

                        }

                    }

                ],
                order: [0, 'desc']

            });
            // ------------------------------- Void Ticket Order End -------------------------------
            // ------------------------------- Booking Close -------------------------------

            var table_bcr = $('#bcr_table').DataTable({
                processing: true,
                serverSide: false,
                // ajax: {
                //     url: '{{ url('dashboard/voidTicketOrders') }}',
                //     type: 'GET'
                // },
                // columns: [{
                //         data: 'booking_id'
                //     },
                //     {
                //         data: 'consolidatorName'
                //     },
                //     {
                //         data: 'pnr'
                //     },
                //     {
                //         data: 'return_date'
                //     },
                //     {
                //         data: 'requestedBy'
                //     },
                //     {
                //         data: 'status'
                //     },
                //     {
                //         data: null,
                //         sortable: false,
                //         render: function(data, type, row) {
                //             return '<div class="text-end"><a  href="javascript:;" onclick="getTicketView( ' +
                //                 data.id +
                //                 ' )" class="px-2"><i class="fa-solid fa-eye text-success"></i></a><a href="#" onclick="del(' +
                //                 data.id +
                //                 ', this)" class="px-2"><i class="fa-solid fa-trash text-danger"></i></a></div>';

                //         }

                //     }

                // ],


            });

            // ------------------------------- Booking Close End -------------------------------
        });

        function formatDate(date) {
            var d = new Date(date),
                year = d.getFullYear(),
                month = ('0' + (d.getMonth() + 1)).slice(-2),
                day = ('0' + d.getDate()).slice(-2),
                hours = ('0' + d.getHours()).slice(-2),
                minutes = ('0' + d.getMinutes()).slice(-2),
                seconds = ('0' + d.getSeconds()).slice(-2);

            return [year, month, day].join('-') + ' ' + [hours, minutes, seconds].join(':');
        }

        function getTicketView(ticket_id) {


            $('#kt_modal_stacked_1').modal('show');
            $.ajax({
                url: '{{ url('ticketrequests/getTicketView/') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    ticket_id: ticket_id
                },
                success: function(response) {
                    $('#kt_modal_stacked_1_body').html(response.html);


                },
                error: function(xhr, status, error) {
                    errorMessage('Something went wrong, Please try again later.');
                    $('#kt_modal_stacked_1').modal('hide');
                }
            });

        }

        function getCardChargeView(charge_id) {
            $('#modalTitle').text("Credti Card Charge Request");
            $('#modalBody').html(
                '<div class="text-center" id="loading"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>'
            );
            $('#editModal').modal('show');
            $.ajax({
                url: '{{ url('cardrequests/getCardChargeView/') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    charge_id: charge_id
                },
                success: function(response) {
                    $('#modalBody').html(response.html);
                    $('#charge_btn').click(function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $(
                                    'meta[name="csrf-addcredit"]'
                                ).attr('content')
                            }
                        });
                        $.ajax({
                            url: '{{ url('cardrequests/addCharge/') }}',
                            type: 'POST',
                            data: $("#credit_form").serialize(),

                            success: function(response) {
                                successMessage(
                                    'Request updated Successfully.');
                                $('#editModal').modal('hide');
                            },
                            error: function(xhr, status, error) {
                                errorMessage(
                                    'Something went wrong, Please try again later.');
                                $('#editModal').modal('hide');
                            }
                        });
                    });

                },
                error: function(xhr, status, error) {
                    errorMessage('Something went wrong, Please try again later.');
                    $('#editModal').modal('hide');
                }
            });

        }

        function getCardChargeDisplay(charge_id) {
            $('#modalTitle').text("View Credti Card Charge Request Details");
            $('#modalBody').html(
                '<div class="text-center" id="loading"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>'
            );
            $('#editModal').modal('show');
            $.ajax({
                url: '{{ url('cardrequests/getCardChargeView/') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    charge_id: charge_id
                },
                success: function(response) {
                    $('#modalBody').html(response.html);

                },
                error: function(xhr, status, error) {
                    errorMessage('Something went wrong, Please try again later.');
                    $('#editModal').modal('hide');
                }
            });

        }

        function execSearch(e) {

            $.ajax({
                url: '{{ url('dashboard/search') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    search_s_file_number: $("#search_s_file_number").val(),
                    search_s_customer_name: $("#search_s_customer_name").val(),
                    search_s_phone: $("#search_s_phone").val(),
                    search_s_email: $("#search_s_email").val(),
                    search_s_consultant: $("#search_s_consultant").val(),
                    search_s_from: $("#search_s_from").val(),
                    search_s_to: $("#search_s_to").val(),
                },
                success: function(response) {
                    $('#search_html').html(response.html);

                },
                error: function(xhr, status, error) {
                    errorMessage('Something went wrong, Please try again later.');

                }
            });
            return false;
        }

        function successMessage(msg) {
            var ans = Swal.fire({
                html: msg,
                icon: "success",
                buttonsStyling: false,
                showCancelButton: false,

                customClass: {
                    confirmButton: "btn btn-primary",
                }
            }).then((result) => {

            });

        }

        function errorMessage(msg) {
            var ans = Swal.fire({
                html: msg,
                icon: "error",
                buttonsStyling: false,
                showCancelButton: false,

                customClass: {
                    confirmButton: "btn btn-primary",
                }
            }).then((result) => {

            });
        }

        function capitalize(word) {
            return word.charAt(0).toUpperCase() + word.slice(1);
        }
    </script>
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
