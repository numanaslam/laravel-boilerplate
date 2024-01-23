<div class="card">
    <!--begin::Card body-->
    <div class="card-body">

        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll">

            <!--begin::Input group-->
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2"> Title</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    {{-- <input type="text" class="form-control form-control-solid" placeholder="Title" id="name" --}}
                        {{-- name="name" value="{{ old('name') }}"> --}}
                        {!! Form::text('name', ($roles->name) ? $roles->name : old('name'), ['class' => 'form-control form-control-solid', 'placeholder' => '']) !!}

                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('name'))
                            {{ $errors->first('name') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->

            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">Permissions</label>

                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-semibold">
                                <!--begin::Table row-->
                                <tr>
                                    <td class="text-gray-800">Administrator Access
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
                                    <td>
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                            <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
                                            <span class="form-check-label" for="kt_roles_select_all">Select all</span>
                                        </label>
                                        <!--end::Checkbox-->
                                    </td>
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">User Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="view users" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="add users" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="edit users" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="delete users" name="permissions[]" />
                                                <span class="form-check-label">Delete</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Content Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="content_management_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="content_management_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="content_management_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Financial Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Reporting</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="reporting_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="reporting_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="reporting_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Payroll</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="payroll_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="payroll_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="payroll_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Disputes Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">API Controls</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Database Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="database_management_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="database_management_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="database_management_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Repository Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
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
