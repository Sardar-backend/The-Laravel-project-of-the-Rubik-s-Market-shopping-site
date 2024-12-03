
@extends('base')
@section('content')
<section class="inner-page" id="contact-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>ویرایش کاربری</h1>
                            <!-- <p>با عضویت در سایت از همه امکانات روبیک مارکت بهره مند شوید.</p> -->
                            <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">عضویت</li>
                                </ol>
                            </nav> -->
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
                            <img src="assets/images/login.png" alt="image">
                        </div>
                        <div class="col-12 col-lg-7 pt-5 pt-md-0 align-self-center">
                            <form action="{{route('aaaaaaaaaa' , ['id'=>request()->user()->id] )}}" enctype="multipart/form-data" method="POST">

                                 @method('PATCH')
                                 @csrf
                            <div class="title">ویرایش اطلاعات</div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                            <p>با ورود به ناحیه کاربری خود از همه امکانات سایت بهره مند شوید.</p>
                            @endif
                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی :</label>
                                <input name="name" type="text" class="form-control"  value="{{request()->user()->name}}" >
                            </div>
                            <div class="form-group">
                                <label for="email">پست الکترونیک :</label>
                                <input name="email" type="email" class="form-control"  value="{{request()->user()->email}}" >
                            </div>
                            <div class="form-group">
                                <label for="email">عکس پروفایل  :</label>
                                <input name="image" accept="image/*" type="file" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label for="email">شماره تلفن همراه  :</label>
                                <input name="phonenumber" type="number" class="form-control"  value="{{request()->user()->phonenumber}}" >
                            </div>
                            <div class="form-group">
                                <label for="email">کدملی  :</label>
                                <input name="meli_code" type="number" class="form-control"  value="{{request()->user()->meli_code}}" >
                            </div>
                            <div class="form-group">
                                <label for="email">تلفن ثابت  :</label>
                                <input  name="home_number" type="number" class="form-control"  value="{{request()->user()->home_number}}" >
                            </div>
                            <div class="form-group">
                                <label for="email">تاریخ تولد  :</label>
                                <input name="birthday" type="date" class="form-control"  value="{{ \Carbon\Carbon::parse(request()->user()->birthday)->format('Y-m-d')}}" >
                            </div>
                            <div class="form-group">
                                <label for="email"> شماره کارت جهت مرجوع وجه  :</label>
                                <input name="cart_number" type="cart_number" class="form-control"  value="{{ request()->user()->cart_number}}">
                            </div>
                            <!-- <div class="form-group">
                                <label for="password">رمز عبور :</label>
                                <input name="password" type="password" class="form-control" id="password" >
                            </div>
                            <div class="form-group">
                                <label for="password">تائید رمز عبور :</label>
                                <input name="password_confirmation" type="password" class="form-control" id="password">
                            </div> -->
                            <div class="form-group">
                                <button type="submit" value="تکمیل عضویت" class="btn btn-success">تکمیل ویرایش</button>
                        </div>
                            </form></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
