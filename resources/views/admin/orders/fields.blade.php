<div class="card">
    <!--begin::Card body-->
    <div class="card-body">

        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll">

            <!--begin::Input group-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2"> Category</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="category" id="category" class="form-control form-control-solid">
                        @foreach ($categories as $t)
                            @if (old('category') == $t)
                                <option value={{ $t->id }} selected data-category="{{ $t->id }}">
                                    {{ $t->title }}</option>
                            @else
                                <option value={{ $t->id }} data-category="{{ $t->id }}">
                                    {{ $t->title }}</option>
                            @endif
                        @endforeach
                    </select>


                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('category'))
                            {{ $errors->first('category') }}
                        @endif
                    </div>
                </div>
                <!--end::Col-->

            </div>
            <!--end::Input group-->


            <div class="row">
                <!-- Category ID -->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2">Service </label>
                    <select name="service_id" id="service_id" class="form-control form-control-solid">
                        @foreach ($services as $t)
                            @if (old('category') == $t)
                                <option value={{ $t->id }} selected data-category="{{ $t->id }}">
                                    {{ $t->title }}</option>
                            @else
                                <option value={{ $t->id }} data-service="{{ $t->category_id }}">
                                    {{ $t->title }}</option>
                            @endif

                        @endforeach
                    </select>
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('service_id'))
                            {{ $errors->first('service_id') }}
                        @endif
                    </div>
                </div>
                @foreach ($services as $t)

                <div style="display: none;" id="s_{{$t->id}}">
                    <div class="row">
                        <div class="col-12">
                            <label class="col-lg-12 mb-0 text-muted">Title</label>
                            <hr class="m-0" />
                            <div class="col-lg-12">
                                <span class="fw-bold fs-6 text-gray-800">{{ $t->title }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="col-lg-12 mb-0 text-muted">Example Link</label>
                            <hr class="m-0" />
                            <div class="col-lg-12">
                                <span class="fw-bold fs-6 text-gray-800">{{ $t->link }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="col-lg-12 mb-0 text-muted">Start time</label>
                            <hr class="m-0" />
                            <div class="col-lg-12">
                                <span class="fw-bold fs-6 text-gray-800">{{ $t->start_time }}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-lg-12 mb-0 text-muted">Speed Per Day</label>
                            <hr class="m-0" />
                            <div class="col-lg-12">
                                <span class="fw-bold fs-6 text-gray-800">{{ $t->speed_per_day }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="col-lg-12 mb-0 text-muted">Average Time</label>
                            <hr class="m-0" />
                            <div class="col-lg-12">
                                <span class="fw-bold fs-6 text-gray-800">{{ $t->average_time }}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-lg-12 mb-0 text-muted">Refill</label>
                            <hr class="m-0" />
                            <div class="col-lg-12">
                                <span class="fw-bold fs-6 text-gray-800">{{ $t->refill }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="col-lg-12 mb-0 text-muted">Details</label>
                            <hr class="m-0" />
                            <div class="col-lg-12">
                                <span class="fw-bold fs-6 text-gray-800">{{ $t->description }}</span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="price_s_{{$t->id}}" value="{{ $t->price }}" />
                </div>
            @endforeach
                <!-- Link -->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Link</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="Link"
                        value="{{ $orders->link ? $orders->link : old('link') }}">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('link'))
                            {{ $errors->first('link') }}
                        @endif
                    </div>
                </div>
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Quantity</label>
                    <input type="number" min="0" max="10000" class="form-control" name="quantity" id="quantity" placeholder="Quantity"
                        value="{{ $orders->quantity ? $orders->quantity : old('quantity') }}">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('quantity'))
                            {{ $errors->first('quantity') }}
                        @endif
                    </div>
                </div>
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Special Instructions</label>
                    <input type="number" min="0" max="10000" class="form-control" name="special_instructions" id="special_instructions" placeholder=" Special Instructions"
                        value="{{ $orders->special_instructions ? $orders->special_instructions : old('special_instructions') }}">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('special_instructions'))
                            {{ $errors->first('special_instructions') }}
                        @endif
                    </div>
                </div>

                <hr />
                <div class="col-md-12 fv-row fv-plugins-icon-container" id="t_block" style="display: none;">
                    <label class="required fs-5 fw-semibold mb-2"> Total:</label>
                    <label class="required fs-5 fw-semibold mb-2" id="t_block_p">0</label>
                </div>




            </div>







        </div>


        <input type="hidden" name="price" id="sel_price" />
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
