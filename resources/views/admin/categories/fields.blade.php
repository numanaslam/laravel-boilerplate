<div class="card">
    <!--begin::Card body-->
    <div class="card-body">

        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll">

            <!--begin::Input group-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2"> Title</label>
                    <!--end::Label-->
                    <!--begin::Input-->

                        {!! Form::text('title', ($categories->title) ? $categories->title : old('title'), ['class' => 'form-control form-control-solid', 'placeholder' => '']) !!}

                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('title'))
                            {{ $errors->first('title') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->

            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2"> Details</label>
                    <!--end::Label-->
                    <!--begin::Input-->

                        {!! Form::text('details', ($categories->details) ? $categories->details : old('details'), ['class' => 'form-control form-control-solid', 'placeholder' => '']) !!}

                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('details'))
                            {{ $errors->first('details') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->

            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2"> Status</label>
                    <!--end::Label-->
                    <!--begin::Input-->

                    {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], ($categories->status) ? $categories->status : old('status'), ['class' => 'form-control form-control-solid', 'placeholder' => 'Select Status']) !!}
                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('status'))
                            {{ $errors->first('status') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->

            </div>
            <!--end::Input group-->




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
