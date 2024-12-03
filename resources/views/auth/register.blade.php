@extends('base')

@section('Scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
@endsection

@section('content')

<section class="inner-page" id="contact-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>عضویت در سایت</h1>
                            <p>با عضویت در سایت از همه امکانات روبیک مارکت بهره مند شوید.</p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">عضویت</li>
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
                            <div class="title">عضویت در روبیک مارکت</div>
                            <p>با ورود به ناحیه کاربری خود از همه امکانات سایت بهره مند شوید.</p>
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی :</label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror " id="name" required autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">پست الکترونیک :</label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email">
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
                            <div class="form-group">
                                <label for="password">تائید رمز عبور :</label>
                                <input name="password_confirmation" type="password" class="form-control" id="password">
                            </div>
                            <div class="form-group" >
                                <div class="g-recaptcha  @error('g-recaptcha-response') is-invalid @enderror" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"></div>
                                @error('g-recaptcha-response')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit"  class="btn btn-success">تکمیل عضویت</button>
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
