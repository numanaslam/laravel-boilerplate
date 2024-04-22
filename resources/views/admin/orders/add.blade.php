<!DOCTYPE html>
<html lang="en">

@include('admin.partials.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('admin.partials.preloader')

        @include('admin.partials.topbar')

        <!-- Main Sidebar Container -->
        @include('admin.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Order</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('orders') }}">Orders</a></li>
                                <li class="breadcrumb-item active">Add</li>
                            </ol>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-right">
                            <a href="#" onclick="history.back()" class="btn btn-dark btn-flat btn-sm ">Back</a>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-3 col-6">
                          <!-- small card -->
                          <div class="small-box bg-info">
                            <div class="inner">
                              <h3>150</h3>

                              <p>Total Orders</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-shopping-cart"></i>
                            </div>

                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                          <!-- small card -->
                          <div class="small-box bg-success">
                            <div class="inner">
                              <h3>53<sup style="font-size: 20px">%</sup></h3>

                              <p>Balance</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-money"></i>
                            </div>

                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                          <!-- small card -->
                          <div class="small-box bg-warning">
                            <div class="inner">
                              <h3>44</h3>

                              <p>Spending</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-user-plus"></i>
                            </div>

                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                          <!-- small card -->
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <h3>Active</h3>

                              <p>Account Status</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-chart-pie"></i>
                            </div>

                          </div>
                        </div>
                        <!-- ./col -->
                      </div>


                    <div class="row mb-8">
                        @include('admin.partials.alerts')
                    </div>

                    <div class="row mb-8">
                        <div class="col-6">
                            <form class="form w-100" novalidate="novalidate" id="notes_form" method="POST"
                                action="{{ url('orders/store') }}">
                                {{ @csrf_field() }}
                                @include('admin.orders.fields')
                            </form>

                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header text-danger">
                                    <h3 class="card-title">Service Details</h3>
                                </div>
                                <!--begin::Card body-->
                                <div class="card-body" id="sd_">

                                    <div class="row">
                                        <div class="col-12">
                                            <label class="col-lg-12 mb-0 text-muted">Example Link</label>
                                            <hr class="m-0" />
                                            <div class="col-lg-12">
                                                <span class="fw-bold fs-6 text-gray-800">1111</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="col-lg-12 mb-0 text-muted">Start time</label>
                                            <hr class="m-0" />
                                            <div class="col-lg-12">
                                                <span class="fw-bold fs-6 text-gray-800">1111</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="col-lg-12 mb-0 text-muted">speed_per_day</label>
                                            <hr class="m-0" />
                                            <div class="col-lg-12">
                                                <span class="fw-bold fs-6 text-gray-800">1111</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="col-lg-12 mb-0 text-muted">average_time</label>
                                            <hr class="m-0" />
                                            <div class="col-lg-12">
                                                <span class="fw-bold fs-6 text-gray-800">1111</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="col-lg-12 mb-0 text-muted">refill</label>
                                            <hr class="m-0" />
                                            <div class="col-lg-12">
                                                <span class="fw-bold fs-6 text-gray-800">1111</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="col-lg-12 mb-0 text-muted">Details</label>
                                            <hr class="m-0" />
                                            <div class="col-lg-12">
                                                <span class="fw-bold fs-6 text-gray-800">1111</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>

                    </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        @include('admin.partials.footer')
    </div>
    <!-- ./wrapper -->

    @include('admin.partials.scripts')
    <script>
        $(document).ready(function() {
            // $("#notes_form").submit(function(e) {
            //     var err = false;
            //     var title = $("#name").val();
            //     var content = $("#email").val();
            //     if (title == '') {
            //         $('#title_err').html("Name Cannot be empty");
            //         err = true;
            //     }
            //     if (content == '') {
            //         $('#content_err').html("Email Cannot be empty");
            //         err = true;
            //     }

            //     if (err == true) {

            //         e.preventDefault();
            //     }
            // });
            updateServices();
            $('#category').change(function() {
                updateServices();
            });
            $('#service_id').change(function() {
                updateview();
            });
            $('#quantity').blur(function() {
                updatePrice();
            });

            function updateServices() {
                var selectedCategory = $('#category').val();
                // Hide all services initially
                $('#service_id option').hide();
                // Show only services belonging to the selected category
                $('#service_id option[data-service="' + selectedCategory + '"]').show();
                // Set the first visible option as selected
                $('#service_id option[data-service="' + selectedCategory + '"]:first').prop('selected', true);
                // Fetch HTML content from the selected service's div
                var serviceHtml = $('#s_' + $('#service_id').val()).html();
                console.log(serviceHtml);
                // Set the fetched HTML content to the sd_ div
                $("#sd_").html(serviceHtml);
            }

            function updateview() {
                // Fetch HTML content from the selected service's div
                var serviceHtml = $('#s_' + $('#service_id').val()).html();
                // Set the fetched HTML content to the sd_ div
                $("#sd_").html(serviceHtml);
            }
            function updatePrice() {
                var quantity = $('#t_block').css('display','block');
                // Fetch HTML content from the selected service's div
                var unitprice = $('#price_s_' + $('#service_id').val()).val();
                var quantity = $('#quantity').val();
                // Set the fetched HTML content to the sd_ div
                $("#t_block_p").html(unitprice*quantity);
            }
        });
    </script>
</body>

</html>
