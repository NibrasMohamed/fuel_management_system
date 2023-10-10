@extends('layouts.app')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Token</h3>
                </div>

                {{-- <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>My Tokens</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form id="token_request_form" data-parsley-validate="" class="form-horizontal form-label-left"
                                novalidate="" action="" method="POST">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="vehicle_reg_no">Vehicle
                                        Number
                                        {{-- <span class="required">*</span> --}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="vehicle_reg_no" required="required"
                                            value="{{ $token->vehicle->registration_number }}" class="form-control"
                                            name="vehicle_reg_no" disabled>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="vehicle_type">Vehicle
                                        Type
                                        {{-- <span class="required">*</span> --}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="vehicle_type" name="vehicle_type"
                                            value="{{ $token->vehicle->type->type_name }}" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="quota">Quota
                                        {{-- <span>*</span> --}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="input-group">
                                            <input type="text" id="quota" name="quota" required="required"
                                            value="{{ $token->vehicle->type->quota }}" class="form-control" disabled>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Liters</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    @error('user_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <hr>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="date"> Date </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" id="date" name="date" class="form-control" value="{{ $token->date }}" disabled>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="time"> Time </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="time" id="time" name="time" class="form-control" value="{{ $token->expected_time }}" disabled>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="request-fuel">Required
                                        Liters
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="input-group">
                                            <input type="number" value="{{ $token->fuel_quantity }}" id="request-fuel" name="request-fuel" required="required"
                                            class="form-control" disabled>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Liter</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <span class="text-danger" id="quota_validation"></span>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="amount">Amount <span
                                            class="required">*</span>
                                    </label>
                                    <div class="input-group col-md-6 col-sm-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rs.</span>
                                        </div>
                                        <input type="text" id="amount" name="amount" required="required"
                                            class="form-control" value="{{ $token->fuel_quantity * 400 }}" disabled>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="amount">QR Code <span
                                            class="required">*</span>
                                    </label>
                                    <div class="input-group col-md-6 col-sm-6">
                                        <img src="{{ url('/view-qr/'.$token->qr_code) }}" alt="" srcset="">
                                    </div>
                                </div>
                                <div class="item form-group text-center">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <a href="/pay/{{$token->id}}" type="submit" class="btn btn-success submit-btn">Make Payment</a>
                                    </div>
                                </div>
                                

                                &nbsp;
                                <div class="in-solid"></div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {


        });
    </script>
@endsection
