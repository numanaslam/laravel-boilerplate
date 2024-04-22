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
                            <h1 class="m-0">Services</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Services</li>
                            </ol>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-right">
                            <a href="{{ url('services/add') }}" class="btn btn-primary btn-flat btn-sm ">Add
                                Service</a>
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
                                        <th class="fw-bold text-gray-600" style="width: 25%">Title
                                        </th>
                                        <th class="fw-bold text-gray-600" style="width: 40%">Details
                                        </th>
                                        <th class="fw-bold text-gray-600" style="width: 5%">Price
                                        </th>
                                        <th class="fw-bold text-gray-600" style="width: 10%">Status
                                        </th>

                                        <th class="fw-bold text-gray-600 text-end" style="width: 15%">
                                            ACTIONS</th>

                                    </tr>
                                </thead>


                            </table>



                            <!--begin::Table-->
                            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    @foreach ($services as $note)
                                        <div class="modal fade" tabindex="-1"
                                            id="kt_modal_scrollable_{{ $note->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">View Category
                                                            Details</h5>
                                                        <!--begin::Close-->
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">


                                                        <div class="tab-pane fade show active"
                                                            id="kt_contact_view_general" role="tabpanel">
                                                            <!--begin::Additional details-->
                                                            <div class="d-flex flex-column gap-5 mt-7">

                                                                <!--begin::City-->
                                                                <div class="d-flex flex-column gap-1">
                                                                    <div class="fw-bold text-muted">
                                                                        Title</div>
                                                                    <div class="fw-bold fs-5">
                                                                        {{ $note->title }}</div>
                                                                </div>
                                                                <!--end::City-->


                                                            </div>
                                                            <!--end::Additional details-->
                                                        </div>



                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


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
                window.location = '{{ url('services/delete') }}/' + id;
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
                    url: '{{ url('services/datatable') }}',
                    type: 'GET'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'price'
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
                                    '<a data-toggle="modal" data-target="#kt_modal_scrollable_' +
                                    data.id + '" href="kt_modal_scrollable_' + data.id +
                                    '" class="px-2"><i class=" fas fa-solid fa-eye text-success"></i></a>';
                            }
                            if (canEdit == "yes") {
                                ret += '<a href="{{ url('services/edit') }}/' + data.id +
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
