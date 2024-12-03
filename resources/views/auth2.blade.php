@extends('base')
@section('content')
<section class="inner-page" id="contact-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>فعال سازی احراز هویت دو مرحله ای</h1>
                            <p>برای امنیت بیشتر حساب خود احراز هویت دو مرحله ای فعال کنید</p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('index')}}">صفحه نخست</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">بازیابی رمز عبور</li>
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
                            <img src="assets/images/1.png" alt="image">
                        </div>

                        <div class="col-12 col-lg-7 pt-5 pt-md-0 align-self-center">
                        <form action={{route('postauth2')}} method="post">
                            @csrf
                            <div class="title">فعال سازی احراز هویت دو مرحله ای</div>
                            <p>برای فعال سازی احراز هویت دو مرحله ای،  شماره همراه خود را وارد کنید.</p>
                            @guest
                            <div class="form-group">
                                <label for="email">شماره همراه :</label>
                                <input type="email"  class="form-control" id="email">
                            </div>
                            @else
                            <div class="form-group">
                                <label for="email">شماره همراه :</label>
                                <input name="phonenumber" value="0{{Auth::user()->phonenumber}}"" class="form-control" id="email">
                            </div>
                            @endguest
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">ارسال پیامک احراز هویت</button>
                            </div></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
