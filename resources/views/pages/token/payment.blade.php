@extends('layouts.app')

@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Payment</h3>
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
                            <h2>Make Payment</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form id="token_request_form" data-parsley-validate="" class="form-horizontal form-label-left"
                                novalidate="" action="/make-payment/{{ $token->id }}" method="POST">
                                @csrf

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-md-6">
                                        <p class="lead">Payment Methods:</p>
                                        <img src="{{ asset('images/visa.png') }}" alt="Visa">
                                        <img src="{{ asset('images/mastercard.png') }}" alt="Mastercard">
                                        <img src="{{ asset('images/american-express.png') }}" alt="American Express">
                                        <img src="{{ asset('images/paypal.png') }}" alt="Paypal">
                                        <hr>
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-form-label col-md-6 col-sm-6" for="name">Card Holer
                                                    Name
                                                </label>
                                                <div class="col-md-9 col-sm-9 text-right">
                                                    <input type="text" id="name" required="required"
                                                        value="{{ $token->customer->name }}" class="form-control"
                                                        name="name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label col-md-6 col-sm-6" for="name">Card
                                                    Number</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" id="name" required="required"
                                                        value="" class="form-control" name="name">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <div class="col-md-6 col-sm-6 ">
                                                    <label class="col-form-label col-md-6 col-sm-6" for="name">Valid
                                                        through</label>

                                                    <input type="text" id="name" required="required"
                                                        placeholder="Valid Through" value="" class="form-control"
                                                        name="name" >
                                                </div>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <label class="col-form-label col-md-6 col-sm-6"
                                                        for="name">CVV</label>

                                                    <input type="text" id="name" required="required"
                                                        placeholder="cvv" value="" class="form-control" name="name"
                                                        >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <p class="lead">Date {{ Carbon::now()->format('Y-m-d') }}</p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th style="width:50%">Subtotal:</th>
                                                        <td>${{ $token->fuel_quantity * 400 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tax (9.3%)</th>
                                                        <td>$10.34</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total:</th>
                                                        <td>${{ $token->fuel_quantity * 400 + 10.34 }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" class="btn btn-success submit-btn">Pay</button>
                                        {{-- <div class="item form-group text-center">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                               
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- /.col -->
                                </div>
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
