@include('admin/partials/head')

<body class="auth-page sign-in">
    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>

    <div class="connect-container align-content-stretch d-flex flex-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="auth-form">
                        <div class="row">
                            <div class="col">
                                <div class="logo-box"><a href="#" class="logo-text">Connect</a></div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                        name="password" required autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control" 
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Re-Type Password">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-block btn-submit">Sign Up</button>
                                    <div class="auth-options">
                                        <div class="custom-control custom-checkbox form-group">
                                            <input type="checkbox" class="custom-control-input">
                                        </div>
                                        <a href="admin/login" class="forgot-link">Already have an account?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block d-xl-block">
                    <div class="auth-image"></div>
                </div>
            </div>
        </div>
    </div>

    @include('admin/partials/script')
</body>
<html>
