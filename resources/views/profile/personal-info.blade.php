@extends('base')
@section('content')

<section class="inner-page" id="profile-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>ناحیه کاربری</h1>
                            <p>به ناحیه کاربری روبیک مارکت خوش آمدید.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <div class="row">
                            @include('layouts.sidbar_prof')
                        <div class="col-12 col-lg-9 pl-lg-0 pr-lg-2 mt-2 mt-lg-0">
                            <!-- Profile Fields -->
                            <div class="custom-container bg-light" id="profile-fields">
                                <div class="row pt-2 px-3 ">
                                    <div class="col-12"><h1>اطلاعات شخصی</h1></div>
                                </div>
                                <hr>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 profile-field py-2">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="title">نام و نام خانوادگی</div>
                                                    <div class="value">{{request()->user()->name}}</div>
                                                </div>
                                                <div class="col-2">
                                                    <a href="{{route('edit_user',$id=request()->user()->id)}}" class="float-left" data-toggle="modal" data-target="#fullNameModal"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 profile-field py-2">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="title">کدملی</div>
                                                    <div class="value">{{request()->user()->meli_code}}</div>
                                                </div>
                                                <div class="col-2">
                                                    <a href="{{route('edit_user',$id=request()->user()->id)}}" class="float-left" data-toggle="modal" data-target="#nationalCodeModal"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 profile-field py-2">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="title">شماره تلفن همراه</div>
                                                    <div class="value">{{request()->user()->phonenumber}}</div>
                                                </div>
                                                <div class="col-2">
                                                    <a href="{{route('edit_user',$id=request()->user()->id)}}" class="float-left" data-toggle="modal" data-target="#mobileModal"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 profile-field py-2">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="title">تلفن ثابت</div>
                                                    <div class="value">{{request()->user()->home_number}}</div>
                                                </div>
                                                <div class="col-2">
                                                    <a href="{{route('edit_user',$id=request()->user()->id)}}" class="float-left" data-toggle="modal" data-target="#telModal"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 profile-field py-2">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="title">پست الکترونیک</div>
                                                    <div class="value">{{request()->user()->email}}</div>
                                                </div>
                                                <div class="col-2">
                                                    <a href="{{route('edit_user',$id=request()->user()->id)}}" class="float-left" data-toggle="modal" data-target="#emailModal"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 profile-field py-2">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="title">تاریخ تولد</div>
                                                    <div class="value">{{jdate(request()->user()->birthday)->format('%B %d، %Y')}}</div>
                                                </div>
                                                <div class="col-2">
                                                    <a href="{{route('edit_user',$id=request()->user()->id)}}" class="float-left" data-toggle="modal" data-target="#birthdayModal"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 profile-field py-2">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="title">شماره کارت جهت مرجوع وجه</div>
                                                    <div class="value" dir="ltr">{{request()->user()->cart_number}}</div>
                                                </div>
                                                <div class="col-2">
                                                    <a href="{{route('edit_user',$id=request()->user()->id)}}" class="float-left" data-toggle="modal" data-target="#cardNumberModal"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /Profile Fields -->

                            <!-- Latest Orders -->
                            <div class="mt-2 order">
                                <div class="row pt-2 px-3">
                                    <div class="col-12"><h2>آخرین سفارش ها</h2></div>
                                </div>
                            </div>
                            <div class="custom-container mt-2 order">
                                <div class="row pt-2 px-3">
                                    <div class="col-12 col-sm-6"><h2>سفارش شماره #1234</h2></div>
                                    <div class="col-12 col-sm-6 text-sm-end"><span>{{jdate($order->updated_at)->format('%B %d، %Y')}}</span> - <span> hjhk</span></div>
                                </div>
                                <hr>
                                <div class="container">
                                    <div class="row py-2">
                                        <div class="col-12">
                                            <div>
                                                <div class="header">
                                                    <div class="total py-1"><span>مبلغ کل:</span> {{$order->price}} تومان</div>
                                                </div>
                                                <div class="container products px-0">
                                                    <div class="row">
                                                    @foreach ($order->products as $product)
                                                        <!-- Order Record -->
                                                        <span class="col-12 col-sm-6 col-lg-4 col-xl-3 px-1">
                                                            <a href="../product.html" target="_blank">
                                                                <div class="encode4326654321vfb">
                                                                    <div class="image" style="background-image: url('{{$product->gallery()->first()->image}}')"></div>
                                                                    <div class="text-center px-1 px-sm-3">
                                                                        <h2>{{$product->name}}</h2>
                                                                        <div class="number">تعداد: {{$product->pivot->quantity}} عدد</div>
                                                                        <div class="encode4365gbf265g43d">مبلغ: {{$product->pivot->quantity * ($product->price * (100 - $product->discust)/100)}} عدد</div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </span>
                                                        <!-- /Order Record -->
                                                    @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Latest Orders -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
