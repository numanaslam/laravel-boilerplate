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
                    {!! Form::text('name', $roles->name ? $roles->name : old('name'), [
                        'class' => 'form-control form-control-solid',
                        'placeholder' => '',
                    ]) !!}

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
                        <table class="table align-middle table-striped fs-6 gy-5">
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-semibold">
                                <!--begin::Table row-->
                                <tr>
                                    <td class="text-gray-800">Administrator Access
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Allows a full access to the system"></i>
                                    </td>
                                    <td>
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="kt_roles_select_all" />
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
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view users')) echo "checked" @endphp
                                                    value="view users" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add users')) echo "checked" @endphp
                                                    value="add users" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('edit users')) echo "checked" @endphp
                                                    value="edit users" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('delete users')) echo "checked" @endphp
                                                    value="delete users" name="permissions[]" />
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
                                    <td class="text-gray-800">Roles Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view roles')) echo "checked" @endphp
                                                    value="view roles" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add roles')) echo "checked" @endphp
                                                    value="add roles" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('edit roles')) echo "checked" @endphp
                                                    value="edit roles" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('delete roles')) echo "checked" @endphp
                                                    value="delete roles" name="permissions[]" />
                                                <span class="form-check-label">Delete</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Reports Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    value="view reportsmanager" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->


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
                                    <td class="text-gray-800">Consolidator Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view consolidator')) echo "checked" @endphp
                                                    value="view consolidator" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add consolidator')) echo "checked" @endphp
                                                    value="add consolidator" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('edit consolidator')) echo "checked" @endphp
                                                    value="edit consolidator" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('delete consolidator')) echo "checked" @endphp
                                                    value="delete consolidator" name="permissions[]" />
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
                                    <td class="text-gray-800">Booking Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('view booking')) echo "checked" @endphp
                                                                value="view booking" name="permissions[]" />
                                                            <span class="form-check-label">View</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Checkbox-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('add booking')) echo "checked" @endphp
                                                                value="add booking" name="permissions[]" />
                                                            <span class="form-check-label">Add</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Checkbox-->
                                                        <label
                                                            class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('edit booking')) echo "checked" @endphp
                                                                value="edit booking" name="permissions[]" />
                                                            <span class="form-check-label">Edit</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('delete booking')) echo "checked" @endphp
                                                                value="delete booking" name="permissions[]" />
                                                            <span class="form-check-label">Delete</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('reopen booking')) echo "checked" @endphp
                                                                value="reopen booking" name="permissions[]" />
                                                            <span class="form-check-label">Booking Re-Open</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Checkbox-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('booking revert to query')) echo "checked" @endphp
                                                                value="booking revert to query"
                                                                name="permissions[]" />
                                                            <span class="form-check-label">Booking Revert to
                                                                Enquiry</span>
                                                        </label>

                                                        <!--end::Checkbox-->

                                                        <!--end::Checkbox-->
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex">

                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('close booking')) echo "checked" @endphp
                                                                value="close booking" name="permissions[]" />
                                                            <span class="form-check-label">Close Booking</span>
                                                        </label>
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('change booking consultant')) echo "checked" @endphp
                                                                value="change booking consultant"
                                                                name="permissions[]" />
                                                            <span class="form-check-label">Change Booking
                                                                Consultant</span>
                                                        </label>
                                                        <!--end::Checkbox-->

                                                        <!--end::Checkbox-->
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex">

                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('booking print report')) echo "checked" @endphp
                                                                value="booking print report" name="permissions[]" />
                                                            <span class="form-check-label">Booking Print Report</span>
                                                        </label>
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"

                                                                value="edit bookingstatus" name="permissions[]" />
                                                            <span class="form-check-label">Edit Booking Status</span>
                                                        </label>

                                                        <!--end::Checkbox-->

                                                        <!--end::Checkbox-->
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Enquiry Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('view enquiry')) echo "checked" @endphp
                                                                value="view enquiry" name="permissions[]" />
                                                            <span class="form-check-label">View</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Checkbox-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('add enquiry')) echo "checked" @endphp
                                                                value="add enquiry" name="permissions[]" />
                                                            <span class="form-check-label">Add</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Checkbox-->
                                                        <label
                                                            class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('edit enquiry')) echo "checked" @endphp
                                                                value="edit enquiry" name="permissions[]" />
                                                            <span class="form-check-label">Edit</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('delete enquiry')) echo "checked" @endphp
                                                                value="delete enquiry" name="permissions[]" />
                                                            <span class="form-check-label">Delete</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox"
                                                                @php if($roles->hasPermissionTo('change enquiry consultant')) echo "checked" @endphp
                                                                value="change enquiry consultant" name="permissions[]" />
                                                            <span class="form-check-label">Change Enquiry Consultant</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Checkbox-->


                                                        <!--end::Checkbox-->

                                                        <!--end::Checkbox-->
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800"> Notifications</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view notifications')) echo "checked" @endphp
                                                    value="view notifications" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add notifications')) echo "checked" @endphp
                                                    value="add notifications" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->

                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('delete notifications')) echo "checked" @endphp
                                                    value="delete notifications" name="permissions[]" />
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
                                    <td class="text-gray-800">Ticket Request Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view tickets')) echo "checked" @endphp
                                                    value="view tickets" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add tickets')) echo "checked" @endphp
                                                    value="add tickets" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('edit tickets')) echo "checked" @endphp
                                                    value="edit tickets" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            {{-- <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" @php if($roles->hasPermissionTo('delete tickets')) echo "checked" @endphp value="delete tickets" name="permissions[]" />
                                                <span class="form-check-label">Delete</span>
                                            </label> --}}
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
                                    <td class="text-gray-800">Customers Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view customers')) echo "checked" @endphp
                                                    value="view customers" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add customers')) echo "checked" @endphp
                                                    value="add customers" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('edit customers')) echo "checked" @endphp
                                                    value="edit customers" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('delete customers')) echo "checked" @endphp
                                                    value="delete customers" name="permissions[]" />
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
                                    <td class="text-gray-800">Newsletter Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view newsletter')) echo "checked" @endphp
                                                    value="view newsletter" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add newsletter')) echo "checked" @endphp
                                                    value="add newsletter" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('edit newsletter')) echo "checked" @endphp
                                                    value="edit newsletter" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('delete newsletter')) echo "checked" @endphp
                                                    value="delete newsletter" name="permissions[]" />
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
                                    <td class="text-gray-800">Subscribers Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view subscribers')) echo "checked" @endphp
                                                    value="view subscribers" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add subscribers')) echo "checked" @endphp
                                                    value="add subscribers" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('edit subscribers')) echo "checked" @endphp
                                                    value="edit subscribers" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('delete subscribers')) echo "checked" @endphp
                                                    value="delete subscribers" name="permissions[]" />
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
                                    <td class="text-gray-800">Bank Accounts Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view bankAccounts')) echo "checked" @endphp
                                                    value="view bankAccounts" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add bankAccounts')) echo "checked" @endphp
                                                    value="add bankAccounts" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('edit bankAccounts')) echo "checked" @endphp
                                                    value="edit bankAccounts" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('delete bankAccounts')) echo "checked" @endphp
                                                    value="delete bankAccounts" name="permissions[]" />
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
                                    <td class="text-gray-800">Bank Payments Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view bankPayments')) echo "checked" @endphp
                                                    value="view bankPayments" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add bankPayments')) echo "checked" @endphp
                                                    value="add bankPayments" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('edit bankPayments')) echo "checked" @endphp
                                                    value="edit bankPayments" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('delete bankPayments')) echo "checked" @endphp
                                                    value="delete bankPayments" name="permissions[]" />
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
                                    <td class="text-gray-800">Consolidator Payments Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view ConsolidatorPayments')) echo "checked" @endphp
                                                    value="view ConsolidatorPayments" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add ConsolidatorPayments')) echo "checked" @endphp
                                                    value="add ConsolidatorPayments" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('edit ConsolidatorPayments')) echo "checked" @endphp
                                                    value="edit ConsolidatorPayments" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('delete ConsolidatorPayments')) echo "checked" @endphp
                                                    value="delete ConsolidatorPayments" name="permissions[]" />
                                                <span class="form-check-label">Delete</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Cash Payments Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    value="view cashpayment" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    value="add cashpayment" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    value="edit cashpayment" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    value="delete cashpayment" name="permissions[]" />
                                                <span class="form-check-label">Delete</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Credit Card Charge Requests</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    value="view cardrequests" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    value="add cardrequests" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    value="edit cardrequests" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    value="delete cardrequests" name="permissions[]" />
                                                <span class="form-check-label">Delete</span>
                                            </label>

                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    value="charge cardrequests" name="permissions[]" />
                                                <span class="form-check-label">Charge</span>
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
                                    <td class="text-gray-800">User Notes</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('view usernotes')) echo "checked" @endphp
                                                    value="view usernotes" name="permissions[]" />
                                                <span class="form-check-label">View</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('add usernotes')) echo "checked" @endphp
                                                    value="add usernotes" name="permissions[]" />
                                                <span class="form-check-label">Add</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('edit usernotes')) echo "checked" @endphp
                                                    value="edit usernotes" name="permissions[]" />
                                                <span class="form-check-label">Edit</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    @php if($roles->hasPermissionTo('delete usernotes')) echo "checked" @endphp
                                                    value="delete usernotes" name="permissions[]" />
                                                <span class="form-check-label">Delete</span>
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
