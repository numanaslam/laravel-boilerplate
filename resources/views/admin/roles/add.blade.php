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
                            <h1 class="m-0">Add Role</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="/users">Roles</a></li>
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
                                    action="{{ url('roles/store') }}">
                                    {{ @csrf_field() }}
                                    @include('admin.roles.fields')
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
