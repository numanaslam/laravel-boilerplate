<div class="card">
    <!--begin::Card body-->
    <div class="card-body">

        <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-md-12 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fs-5 fw-semibold mb-2">Name</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" placeholder="Name" id="name"
                      name="name" @if ($permission->name)
                      value="{{ $permission->name }}"
                      @endif>

                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback">
                    @if ($errors->has('title'))
                        {{ $errors->first('title') }}
                    @endif
                </div>
            </div>
            <!--end::Col-->

        </div>



    </div>
    <div class="card-footer">
        <div class="flex-center">
            <!--begin::Button-->
            <button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3">Discard</button>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                <span class="indicator-label">Submit</span>

            </button>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Card body-->
</div>
