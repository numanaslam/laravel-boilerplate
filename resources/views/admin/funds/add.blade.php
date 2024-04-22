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
                            <h1 class="m-0">Add Fund</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('funds') }}">Funds</a></li>
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
                    <div class="row mb-8">
                        @include('admin.partials.alerts')
                    </div>

                    <div class="row mb-8">
                        <div class="col-6">
                            <form class="form w-100" novalidate="novalidate" id="notes_form" method="POST"
                                action="{{ url('funds/store') }}">
                                {{ @csrf_field() }}
                                @include('admin.funds.fields')
                            </form>

                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header text-danger">
                                    <h3 class="card-title">Available Payment Methods</h3>
                                </div>
                                <!--begin::Card body-->
                                <div class="card-body">

                                    <div class="callout callout-danger">
                                        <h5>Jazz Cash</h5>

                                        <p>12345</p>
                                    </div>
                                    <div class="callout callout-danger">
                                        <h5>Easy Paisa</h5>

                                        <p>12345</p>
                                    </div>
                                    <div class="callout callout-danger">
                                        <h5>Account Transfer</h5>

                                        <p>12345</p>
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
            $("#notes_form").submit(function(e) {
                var err = false;
                var title = $("#name").val();
                var content = $("#email").val();
                if (title == '') {
                    $('#title_err').html("Name Cannot be empty");
                    err = true;
                }
                if (content == '') {
                    $('#content_err').html("Email Cannot be empty");
                    err = true;
                }

                if (err == true) {

                    e.preventDefault();
                }
            });
        });
    </script>
</body>

</html>
