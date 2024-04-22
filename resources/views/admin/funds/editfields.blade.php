<div class="card">
    <!--begin::Card body-->
    <div class="card-body">

        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll">

            <!--begin::Input group-->
            <div class="row">
                <!-- Payment Method -->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2">Payment Method</label>
                    <select class="form-control" name="payment_method" id="payment_method" required>
                        <option value="bank" {{ (old('payment_method', $funds->payment_method) == 'bank') ? 'selected' : '' }}>
                            Bank Transfer
                        </option>
                        <option value="ep" {{ (old('payment_method', $funds->payment_method) == 'ep') ? 'selected' : '' }}>
                            Easy Paisa
                        </option>
                        <option value="jc" {{ (old('payment_method', $funds->payment_method) == 'jc') ? 'selected' : '' }}>
                            Jazz Cash
                        </option>
                    </select>
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('payment_method'))
                            {{ $errors->first('payment_method') }}
                        @endif
                    </div>
                </div>
            </div>

            <!--end::Input group-->


            <div class="row">
                <!-- Category ID -->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2">Amount </label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount"
                        value="{{ $funds->amount ? $funds->amount : old('amount') }}" required>
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('amount'))
                            {{ $errors->first('amount') }}
                        @endif
                    </div>
                </div>

                <!-- Link -->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Attachment</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Attachment"
                        value="{{ $funds->image ? $funds->image : old('image') }}">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('image'))
                            {{ $errors->first('image') }}
                        @endif
                    </div>
                </div>
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-semibold mb-2"> Status</label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="pending" {{ (old('status', $funds->status) == 'pending') ? 'selected' : '' }}>
                           Pending
                        </option>
                        <option value="approved" {{ (old('status', $funds->status) == 'approved') ? 'selected' : '' }}>
                           Approved
                        </option>
                        <option value="rejected" {{ (old('status', $funds->status) == 'rejected') ? 'selected' : '' }}>
                            Rejected
                        </option>
                    </select>

                    <div class="fv-plugins-message-container invalid-feedback">
                        @if ($errors->has('status'))
                            {{ $errors->first('status') }}
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
