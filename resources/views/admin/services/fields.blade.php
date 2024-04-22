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
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                        value="{{ $services->title ? $services->title : old('title') }}">
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


            <div class="row">
                <!-- Category ID -->
                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="" >Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $services->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>

                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('category_id'))
                            {{ $errors->first('category_id') }}
                        @endif
                    </div>
                </div>

                <!-- Link -->
                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Link</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="Link"
                        value="{{ $services->link ? $services->link : old('link') }}">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('link'))
                            {{ $errors->first('link') }}
                        @endif
                    </div>
                </div>

                <!-- Start Time -->
                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Start Time</label>
                    <input type="text" class="form-control" name="start_time" id="start_time" placeholder="Start Time"
                        value="{{ $services->start_time ? $services->start_time : old('start_time') }}">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('start_time'))
                            {{ $errors->first('start_time') }}
                        @endif
                    </div>
                </div>

                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="active" {{ $services->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $services->status == 'inactive' ? 'selected' : '' }}>Inactive</option>

                    </select>

                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('status'))
                            {{ $errors->first('status') }}
                        @endif
                    </div>
                </div>

            </div>
            <div class="row">
                <!-- Speed Per Day -->
                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Speed Per Day</label>
                    <input type="text" class="form-control" name="speed_per_day" id="speed_per_day" placeholder="Speed Per Day"
                        value="{{ $services->speed_per_day ? $services->speed_per_day : old('speed_per_day') }}">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('speed_per_day'))
                            {{ $errors->first('speed_per_day') }}
                        @endif
                    </div>
                </div>

                <!-- Average Time -->
                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Average Time</label>
                    <input type="text" class="form-control" name="average_time" id="average_time" placeholder="Average Time"
                        value="{{ $services->average_time ? $services->average_time : old('average_time') }}">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('average_time'))
                            {{ $errors->first('average_time') }}
                        @endif
                    </div>
                </div>

                <!-- Refill -->
                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Refill</label>
                    <input type="text" class="form-control" id="refill" name="refill" placeholder="Refill"
                        value="{{ $services->refill ? $services->refill : old('refill') }}">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('refill'))
                            {{ $errors->first('refill') }}
                        @endif
                    </div>
                </div>
                <!-- Refill -->
                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price"
                        value="{{ $services->price ? $services->price : old('price') }}">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('price'))
                            {{ $errors->first('price') }}
                        @endif
                    </div>
                </div>

                <!-- Description -->

                <!--begin::Col-->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2"> Description</label>
                    <!--end::Label-->
                    <!--begin::Input-->

                    <textarea  class="form-control" id="description" name="description" placeholder="Description">{{$services->description ? $services->description : old('description')}}</textarea>


                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('description'))
                            {{ $errors->first('description') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->


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
