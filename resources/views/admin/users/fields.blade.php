<div class="card">
    <!--begin::Card body-->
    <div class="card-body">

        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll">

            <!--begin::Input group-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold"> Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    {{-- <input type="text" class="form-control form-control-solid" placeholder="name" id="name" --}}
                    {{-- name="name" value="{{ old('name') }}"> --}}
                    {!! Form::text('name', $users->name ? $users->name : old('name'), [
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
                <!--begin::Col-->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold">Email</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    {{-- <input type="text" class="form-control form-control-solid" placeholder="name" id="name" --}}
                    {{-- name="name" value="{{ old('name') }}"> --}}
                    {!! Form::text('email', $users->email ? $users->email : old('email'), [
                        'class' => 'form-control form-control-solid',
                        'placeholder' => '',
                    ]) !!}


                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->

            </div>
            <!--end::Input group-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold">Password: <sub>Leave it empty if don't change password.</sub></label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    {{-- <input type="text" class="form-control form-control-solid" placeholder="name" id="name" --}}
                    {{-- name="name" value="{{ old('name') }}"> --}}
                    {!! Form::text('password', $users->password ? $users->passoword : old('password'), [
                        'class' => 'form-control form-control-solid',
                        'placeholder' => '',
                    ]) !!}


                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('password'))
                            {{ $errors->first('passoword') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold">Role</label>
                    <!--end::Label-->
                    <!--begin::Input-->

                    <select name="role" id="role" class="form-control form-control-solid">
                        @foreach ($roles as $t)
                            @if (old('role') == $t)
                                <option value={{ $t->name }} selected>{{ $t->name }}</option>
                            @else
                                <option value={{ $t->name }} @php if($user_roles && ($t->name == $user_roles)) echo "selected";
                                    @endphp
                                @endphp>{{ $t->name }}</option>
                            @endif
                        @endforeach
                    </select>


                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('role'))
                            {{ $errors->first('role') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold">Nick Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    {{-- <input type="text" class="form-control form-control-solid" placeholder="name" id="name" --}}
                    {{-- name="name" value="{{ old('name') }}"> --}}
                    {!! Form::text('nick_name', $users->nick_name ? $users->nick_name : old('nick_name'), [
                        'class' => 'form-control form-control-solid',
                        'placeholder' => '',
                    ]) !!}


                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('nick_name'))
                            {{ $errors->first('nick_name') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold">User Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    {!! Form::text('user_name', $users->nick_name ? $users->user_name : old('user_name'), [
                        'class' => 'form-control form-control-solid',
                        'placeholder' => '',
                    ]) !!}



                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('user_name'))
                            {{ $errors->first('user_name') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold">Phone</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    {{-- <input type="text" class="form-control form-control-solid" placeholder="name" id="name" --}}
                    {{-- name="name" value="{{ old('name') }}"> --}}
                    {!! Form::text('phone', $users->phone ? $users->phone : old('phone'), [
                        'class' => 'form-control form-control-solid',
                        'placeholder' => '',
                    ]) !!}



                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('phone'))
                            {{ $errors->first('phone') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold">Access Level</label>
                    <!--end::Label-->
                    <!--begin::Input-->

                   <select name="access_level" id="access_level" class="form-control form-control-solid">
                    @foreach ($access_levels as $t)
                        @if (old('access_level') == $t)
                            <option value={{ $t }} selected>{{ $t }}</option>
                        @else
                            <option value={{ $t }}
                            @endphp>{{ $t }}</option>
                        @endif
                    @endforeach
                </select>


                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('access_level'))
                            {{ $errors->first('access_level') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <div class="row">

                <!--begin::Col-->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold">Address</label>
                    <!--end::Label-->
                    <!--begin::Input-->

                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                        {!! Form::text('address', $users->address ? $users->address : old('address'), [
                            'class' => 'form-control form-control-solid',
                            'placeholder' => '',
                        ]) !!}
                        <!--begin::Label-->
                        <span class="form-check-label fw-semibold text-muted" for="is_active"></span>
                        <!--end::Label-->
                    </label>


                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('address'))
                            {{ $errors->first('address') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->
            </div>

            <hr />


            <div class="row">
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold">Status</label>
                    <!--end::Label-->
                    <!--begin::Input-->

                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input" name="is_active" type="checkbox" value="1" id="is_active" {{ $users->is_active ? "checked" : "" }} >
                        <!--end::Input-->
                        <!--begin::Label-->
                        <span class="form-check-label fw-semibold text-muted" for="is_active">Activation Status</span>
                        <!--end::Label-->
                    </label>


                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('is_active'))
                            {{ $errors->first('is_active') }}
                        @endif
                    </div>
                </div>
            </div>


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
