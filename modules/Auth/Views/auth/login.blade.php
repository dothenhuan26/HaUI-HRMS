@extends('Layout::auth.login')

@section("body")
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="account-content">
            <a href="job-list.html" class="btn btn-primary apply-btn">{{__("Apply Job")}}</a>
            <div class="container">

                <!-- Account Logo -->
                <div class="account-logo">
                    <a href="index.html"><img src="https://i.pinimg.com/736x/59/55/4a/59554a996be754a93d61581ae15167f7.jpg" alt="nhuan"></a>
                </div>
                <!-- /Account Logo -->

                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">{{__("Login")}}</h3>
                        <p class="account-subtitle">{{__("Access to our dashboard")}}</p>

                        <!-- Account Form -->
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>{{__("Email Address")}}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-auto">
                                        <a class="text-muted" href="forgot-password.html">
                                            Forgot password?
                                        </a>
                                    </div>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Account Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection

