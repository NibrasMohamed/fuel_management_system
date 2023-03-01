<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fuel In | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ url('login') }}" method="POST" id="login_form">
                        @csrf
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="user_name"
                                required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                required="" />
                        </div>
                        @error('user_name')
                            {{-- {{dd('in')}} --}}
                        @enderror
                        <div>
                            <button class="btn btn-default submit" type="submit" id="login_form">Log in</button>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-empire"></i> Fuel In!</h1>
                                {{-- <p>©2016 All Rights Reserved. FuelIn! is a Bootstrap 4 template. Privacy and Terms</p> --}}
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">

                    <form action="{{ url('/register-customer') }}" method="POST" name="register-customer-form"
                        id="register-customer-form">
                        @csrf
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="user_name"
                                required="" />
                        </div>
                        @error('user_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div>
                            <input type="text" class="form-control" placeholder="Name" name="name"
                                required="" />
                        </div>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                required="" />
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- <div>
                <select name="station" class="form-control" id="station">
                     @foreach ($stations as $station)
                         <option value="{{ $station->id }}"> {{ $station->station_name }} </option>
                     @endforeach
                </select>
               </div> --}}

                        <div>
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone_no"
                                required="" />
                        </div>
                        @error('phone_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div>
                            <input type="text" class="form-control" placeholder="Address" name="address"
                                required="" />
                        </div>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                required="" />
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div>
                            <input type="text" class="form-control" placeholder="Vehcicle Reg.No" name="reg_no"
                                required="" />
                        </div>
                        @error('reg_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div>
                            <select name="vehicle_type" class="form-control" id="vehicle_type">
                                @foreach ($vehicle_types as $vehicle_type)
                                    <option value="{{ $vehicle_type->id }}"> {{ $vehicle_type->type_name }} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('vehicle_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="mt-4 mb-4">
                            <select name="station" class="form-control" id="station" required>
                                @foreach ($stations as $station)
                                    <option value="{{ $station->id }}"> {{ $station->station_name }} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('station')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- <div>
                <a class="btn btn-default submit" type="submit" id="register-customer-form">Submit</a>
              </div> --}}
                        <button class="btn btn-default submit" type="submit" id="register-customer-form"> Submit
                        </button>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-empire"></i> FuelIn</h1>
                                <p>©2016 All Rights Reserved. FuelIn is a Bootstrap 4 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>


</html>
