<!--begin::Alert-->
<div class="col-12">
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        {{ session()->get('success') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        {{ session()->get('error') }}
    </div>
@endif
<!--end::Alert-->
</div>
