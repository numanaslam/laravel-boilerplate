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
                            <h1 class="m-0">Add Permissions</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/permissions') }}">Permissions</a></li>
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
                        <div class="col-12">
                            <form class="form w-100" novalidate="novalidate" id="notes_form" method="POST"
                                action="{{ url('permissions/store') }}">
                                {{ @csrf_field() }}
                                @include('admin.permissions.fields')
                            </form>

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
</body>

</html>
