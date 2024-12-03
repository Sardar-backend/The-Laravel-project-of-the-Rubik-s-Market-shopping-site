@extends('base')



@section('content')
<section class="inner-page" id="contact-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>ورود به ناحیه کاربری</h1>
                            <p>وارد ناحیه کاربری خود در روبیک مارکت شوید.</p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ورود</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-2 py-md-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1">
                <div class="content">
                    <div class="row">
                        <div class="col-12 col-lg-5 text-center">
                            <img src="assets/images/login.png" alt="">
                        </div>
                        <div class="col-12 col-lg-7 pt-5 pt-md-0 align-self-center">
                            <div class="title">وارد شوید</div>
                            <p>با عضویت در سایت از همه امکانات سایت بهره مند شوید.</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">پست الکترونیک :</label>
                                <input name="email" type="email @error('email') is-invalid @enderror" class="form-control" id="email" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">رمز عبور :</label>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" >
                                <div class="g-recaptcha  @error('g-recaptcha-response') is-invalid @enderror" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"></div>
                                @error('g-recaptcha-response')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('مرا به خاطر بسپار') }}
                                    </label>
            <br><br><a href="{{ route('auth.google') }}"><div>
            <svg width="25" height="19" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.52391 18.8209H6.34174V9.54903L0.887695 5.4585V17.1847C0.887695 18.0901 1.62126 18.8209 2.52391 18.8209Z" fill="#4285F4"></path>
                <path d="M19.4297 18.8209H23.2475C24.1529 18.8209 24.8837 18.0873 24.8837 17.1847V5.4585L19.4297 9.54903" fill="#34A853"></path>
                <path d="M19.4297 2.45921V9.54947L24.8837 5.45894V3.27732C24.8837 1.25387 22.5739 0.100341 20.9568 1.31386" fill="#FBBC04"></path>
                <path d="M6.34766 9.54924V2.45898L12.8925 7.36762L19.4374 2.45898V9.54924L12.8925 14.4579" fill="#EA4335"></path>
                <path d="M0.886719 3.27732V5.45894L6.34076 9.54947V2.45921L4.81363 1.31386C3.19378 0.100341 0.886719 1.25387 0.886719 3.27732Z" fill="#C5221F"></path>
            </svg>
            <span class="">
                ورود با گوگل
            </span></div></a>

                                </div><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">ورود به ناحیه کاربری </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('گذرواژه خود را فراموش کرده اید ؟') }}
                                    </a>
                                @endif
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('Scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
@endsection
