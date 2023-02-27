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
                            <h2>Request Token</h2>
                            {{-- <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul> --}}
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form id="token_request_form" data-parsley-validate="" class="form-horizontal form-label-left"
                                novalidate="" action="/request-token/{{ $vehicle->id }}" method="POST">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="vehicle_reg_no">Vehicle
                                        Number
                                        {{-- <span class="required">*</span> --}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="vehicle_reg_no" required="required"
                                            value="{{ $vehicle->registration_number }}" class="form-control"
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
                                            value="{{ $vehicle->type->type_name }}" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="quota">Quota
                                        {{-- <span>*</span> --}}
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="input-group">
                                            <input type="text" id="quota" name="quota" required="required"
                                            value="{{ $vehicle->type->quota }}" class="form-control" disabled>
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
                                        <input type="date" id="date" name="date" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="time"> Time </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="time" id="time" name="time" class="form-control">
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="request-fuel">Required
                                        Liters
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="input-group">
                                            <input type="number" id="request-fuel" name="request-fuel" required="required"
                                            class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Liter    </span>
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
                                            class="form-control" disabled>
                                        {{-- <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div> --}}
                                    </div>

                                    {{-- <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="amount" name="amount" required="required"
                                            class="form-control" disabled>
                                    </div> --}}
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                

                                &nbsp;
                                <div class="ln_solid"></div>
                                <div class="item form-group text-center">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success submit-btn">Reqeust</button>
                                    </div>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {


            $('#request-fuel').keyup(function() {

                var quota = $('#quota').val()
                var price = 400;
                quota = +quota
                var request = +$(this).val();
                var amount = request * price
                console.log('[out]', quota, request);
                if (request > quota) {
                    console.log($('#quota_validation').text());

                    $('#quota_validation').text('Your fuel request is above yout vehicle quota!');
                    $('#quota_validation').fadeIn();
                    $('.submit-btn').fadeOut();
                    $('#amount').val(" ");
                } else {
                    amount = amount.toString()
                    $('#amount').val(amount + "/=");
                    $('#quota_validation').hide()
                    $('.submit-btn').fadeIn();

                }
            })
        });
    </script>
@endsection
