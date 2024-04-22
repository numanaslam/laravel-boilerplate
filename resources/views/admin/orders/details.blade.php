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
                            <h1 class="m-0"> Order Details</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('orders') }}">Orders</a></li>
                                <li class="breadcrumb-item active">Details</li>
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
                    <div class="row mb-8">
                        @include('admin.partials.alerts')
                    </div>

                    <div class="row mb-8">
                        <div class="col-12">


                            <div class="card">
                                {{-- <div class="card-header text-danger">
                                    <h3 class="card-title">Available Payment Methods</h3>
                                </div> --}}
                                <!--begin::Card body-->


                                <div class="card-body">

                                    <div class="row">
                                        <label class="col-lg-4 fw-semibold text-muted">Payment Method</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $order->payment_method }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-lg-4 fw-semibold text-muted">Amount</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $order->amount }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-lg-4 fw-semibold text-muted">Transaction Date</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $order->transaction_date }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-lg-4 fw-semibold text-muted">Status</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $order->status }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-lg-4 fw-semibold text-muted">Payment Method</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $order->payment_method }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-lg-4 fw-semibold text-muted">Attachment</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800"><a href="{{url('orders')}}/{{ $order->image }}">{{ $order->image }}</span>
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

</body>

</html>
