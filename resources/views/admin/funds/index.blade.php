<!DOCTYPE html>
<html lang="en">

@include('admin.partials.head')
<link href="{{ url('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

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
                            <h1 class="m-0">Funds</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Funds</li>
                            </ol>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-right">
                            <a href="{{ url('funds/add') }}" class="btn btn-primary btn-flat btn-sm ">Add
                                Fund</a>
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


                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Search Options</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body" style="display: block;">
                            <form id="search-form">
                                <div class="card-body">

                                    <div class="row search form-group mb-0">
                                        <div class="col-md-4">
                                            <input type="text" id="s_id" name="s_id" placeholder="ID"
                                                class="form-control" title="">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="s_title" name="s_title" placeholder="Title"
                                                class="form-control" title="">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="s_details" name="s_details" placeholder="Details"
                                                class="form-control" title="">
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="search" id="search" value="yes" />
                                            <button type="submit" id="kt_ecommerce_add_category_submit"
                                                class="btn btn-primary">
                                                <span class="indicator-label">Search</span>

                                            </button>
                                            <button type="reset" id="kt_ecommerce_add_category_reset"
                                                class="btn btn-primary">
                                                <span class="indicator-label">Reset</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>


                    <div class="card card-flush shadow-sm">

                        <div class="card-body">


                            <table id="example2"
                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                style="width:100%">
                                <thead>

                                    <tr>
                                        <th class="fw-bold text-gray-600" style="width: 5%">ID</th>
                                        <th class="fw-bold text-gray-600" style="width: 25%">Date
                                        </th>
                                        <th class="fw-bold text-gray-600" style="width: 25%">Payment Method
                                        </th>
                                        <th class="fw-bold text-gray-600" style="width: 10%">Amount
                                        </th>

                                        <th class="fw-bold text-gray-600" style="width: 10%">Status
                                        </th>

                                        <th class="fw-bold text-gray-600 text-end" style="width: 15%">
                                            ACTIONS</th>

                                    </tr>
                                </thead>


                            </table>



                        </div>
                        <!--end::Card body-->
                    </div>


                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        @include('admin.partials.footer')
    </div>
    <!-- ./wrapper -->

    @include('admin.partials.scripts')
    <script src="{{ url('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        function del(id, e) {
            var userConfirmed = confirm("Are you sure you want to DELETE this item?");
            if (userConfirmed) {
                window.location = '{{ url('funds/delete') }}/' + id;
            }
            return false;
        }
        $(document).ready(function() {
            @php
                $canEdit = Auth::user()->can('edit roles');
                $canDel = Auth::user()->can('delete roles');
                $canView = Auth::user()->can('view roles');
            @endphp

            var canEdit = "{{ $canEdit ? 'yes' : 'no' }}";
            var canDel = "{{ $canDel ? 'yes' : 'no' }}";
            var canView = "{{ $canView ? 'yes' : 'no' }}";

            canEdit = 'yes';
            canDel = 'yes';
            canView = 'yes';


            var s_id = $('#s_id');
            var s_title = $('#s_title');
            var s_content = $('#s_content');
            var table = $('#example2').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('funds/datatable') }}',
                    type: 'GET'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'transaction_date'
                    },
                    {
                        data: 'payment_method'
                    },
                    {
                        data: 'amount'
                    },
                    {
                        data: 'status'
                    },

                    {
                        data: null,
                        sortable: false,
                        render: function(data, type, row) {
                            var ret = '<div class="text-end">';

                            if (canView == "yes") {
                                ret +=
                                    '<a href="{{ url('funds/details') }}/' + data.id +
                                    '" class="px-2"><i class="fas fa-eye text-success"></i></a>';
                            }
                            if (canEdit == "yes") {
                                ret += '<a href="{{ url('funds/edit') }}/' + data.id +
                                    '" class="px-2"><i class="fas fa-pencil-alt text-warning"></i></a>';
                            }
                            if (canDel == "yes") {
                                ret += '<a href="#" onclick="del(' + data.id +
                                    ', this)"  class="px-2"><i class="fas fa-solid fa-trash text-danger"></i></a>';
                            }

                            ret += '</div>';


                            return ret;
                            // return '<div class="text-end"><a data-bs-toggle="modal" data-bs-target="#kt_modal_scrollable_' +
                            //     data.id + '" href="kt_modal_scrollable_' + data.id +
                            //     '" class="px-2"><i class="fa-solid fa-eye text-success"></i></a><a href="{{ url('/roles/edit') }}/' +
                            //     data.id +
                            //     '" class="px-2"><i class="fa-solid fa-pen-to-square text-warning"></i></a><a href="#" onclick="del(' +
                            //     data.id +
                            //     ', this)"  class="px-2"><i class="fa-solid fa-trash text-danger"></i></a></div>';

                        }
                    }

                ],
                order: [0, 'desc']

            });

            $('#search-form').on('submit', function(e) {
                e.preventDefault();
                $('#search').val('yes');
                var formData = $('#search-form').serializeArray();
                var searchData = {};
                for (var i = 0; i < formData.length; i++) {
                    searchData[formData[i].name] = formData[i].value;
                }
                table.search(JSON.stringify(searchData)).draw();
            });
            $('#search-form').on('reset', function(e) {
                //e.preventDefault();
                $('#search').val('');
                var formData = $('#search-form').serializeArray();
                var searchData = {};
                for (var i = 0; i < formData.length; i++) {
                    searchData[formData[i].name] = formData[i].value;
                }
                table.search(JSON.stringify(searchData)).draw();
            });
        });
    </script>
</body>

</html>
