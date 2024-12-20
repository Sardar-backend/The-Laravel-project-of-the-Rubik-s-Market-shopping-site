@extends('base')
@section('content')

<section class="inner-page" id="checkout-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>پیش فاکتور</h1>
                            <p>با تکیمل پرداخت فاکتور، خرید خود را تکمیل کنید.</p>
                            <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">پیش فاکتور</li>
                                </ol>
                            </nav> -->
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
                        <div class="col-12 col-lg-9">
                            <!-- Choose Address -->
                            <section id="choose-address">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 py-3">
                                            <div class="pb-1 title">آدرس تحویل سفارش</div>
                                            <div class="row">
                                                <div class="col-12 col-md-9 pl-0" id="address-detail">
                                                    <div class="p-3 ml-3 mb-2 mb-md-0 ml-md-0 address-to-send">
                                                        <div class="address-title">
                                                            <span id="province-title">{{$adrres->ostan}}</span>،
                                                            <span id="city-title">{{$adrres->city}}</span>،
                                                            <span id="address">{{$adrres->adress}}</span>،
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-4">کدپستی: {{$adrres->adress}}</div>
                                                            <div class="col-12 col-md-8">تحویل گیرنده: {{$adrres->tahvil}} | {{$adrres->number}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <div class="row">
                                                        <div class="col-6 col-md-12 pl-2 px-md-3">
                                                            <a href="{{route('adresses')}}"><div class="btn btn-light w-100">تغییر آدرس</div></a>
                                                        </div>
                                                        <div class="col-6 col-md-12 pr-2 px-md-3">
                                                            <a href="{{route('adresses')}}"><div class="btn btn-outline-dark mt-0 mt-md-1 w-100">افزودن آدرس جدید</div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- /Choose Address -->

                            <!-- Orders List -->
                            <section class="mt-3" id="orders">
                                <div class="container mt-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="pb-1 title">سفارشات شما</div>
                                            <div class="row">

                                                @foreach ($all as $pro)

                                                <!-- Order Product Record -->
                                                <span class="col-6 col-sm-4 col-lg-3 px-0">
                                                    <a href="product-{{$pro['product']->id ?? $pro->id}}" target="_blank">
                                                        <div class="encode4326654321vfb">
                                                            <div class="image" style="background-image: url({{optional($pro['product'] ?? $pro)->gallery()->first()->image}})"></div>
                                                            <div class="text-center px-1 px-sm-3">
                                                                <a href="product.html" target="_blank"><h2>{{$pro['product']->name ?? $pro->name}}</h2></a>
                                                                <div class="number">تعداد: {{$pro['quantity']}} عدد</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </span>
                                                <!-- /Order Product Record -->
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- /Orders List -->

                            <!-- Choose Date To Send -->
                            <!-- <section class="mt-3" id="select-receive-date">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="container px-0">
                                                <div class="row">
                                                    <div class="col-12 px-0">
                                                        <div class="row py-2 px-3">
                                                            <div class="col-12">
                                                                <div class="pادامه ثبت سفارش-1 title">انتخاب تاریخ تحویل</div>
                                                                <div class="row">

                                                                    <div class="col-6 col-sm-4 col-lg-2 pt-3 pt-md-0 pl-2">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input valid-order-date" id="date1">
                                                                            <label class="receive-date" for="date1">دوشنبه<br><span class="date">20 تیر 1400</span></label>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-6 col-sm-4 col-lg-2 pt-3 pt-md-0 pl-2">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input valid-order-date" id="date2">
                                                                            <label class="receive-date" for="date2">سه شنبه<br><span class="date">21 تیر 1400</span></label>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-6 col-sm-4 col-lg-2 pt-3 pt-md-0 pl-2">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input valid-order-date" id="date3">
                                                                            <label class="receive-date" for="date3">چهارشنبه<br><span class="date">22 تیر 1400</span></label>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-6 col-sm-4 col-lg-2 pt-3 pt-md-0 pl-2">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input valid-order-date" id="date4">
                                                                            <label class="receive-date" for="date4">پنج شنبه<br><span class="date">23 تیر 1400</span></label>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-6 col-sm-4 col-lg-2 pt-3 pt-md-0 pl-2">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input valid-order-date" id="date5">
                                                                            <label class="receive-date" for="date5">پنج شنبه<br><span class="date">24 تیر 1400</span></label>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-6 col-sm-4 col-lg-2 pt-3 pt-md-0 pl-2">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input valid-order-date" id="date6">
                                                                            <label class="receive-date" for="date6">جمعه<br><span class="date">25 تیر 1400</span></label>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section> -->
                            <!-- /Choose Date To Send -->
                        </div>
                        <div class="col-12 col-lg-3 mt-2 mt-lg-0 pr-3 pr-lg-0">
                            <div id="factor">
                                <div class="container">
                                    <div class="row py-2">
                                        <div class="col-6">
                                            <div>جمع کل فاکتور:</div>
                                        </div>
                                        <div class="col-6">
                                            <div>{{$totalPrice}} تومان</div>
                                        </div>
                                    </div>
                                    <div class="row py-2 bg-light">
                                        <div class="col-6">
                                            <div>جمع تخفیف:</div>
                                        </div>
                                        <div class="col-6">
                                            <div>{{$totalDiscust}} تومان</div>
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-6">
                                            <div>هزینه ارسال:</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="small">درب منزل با مشتری</div>
                                        </div>
                                    </div>
                                    <div class="row py-2" id="total">
                                        <div class="col-6">
                                            <div>مبلغ قابل پرداخت:</div>
                                        </div>
                                        <div class="col-6">
                                            <div>{{$FinalPrice}} تومان</div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="container">
                                    <!-- <div class="row py-2">
                                        <div class="col-12">
                                            <div>انتخاب نحوه پرداخت</div>
                                        </div>
                                    </div> -->
                                    <div class="row pb-2">
                                        <!-- <div class="col-12 pb-2">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="payment_type" checked>پرداخت آنلاین
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="payment_type">ثبت فیش پرداخت/کارت به کارت
                                                </label>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-12 pb-2" id="rules">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="accept_rules" value="1"><a href="#" target="_blank">قوانین و مقررات</a> را خواندم و قبول دارم.
                                                </label>
                                            </div>
                                        </div> -->
                                        <div class="col-12">
                                            <form action="" method="get">
                                                <input type="hidden" name="info" value="g">
                                            <button type="submit" value="پرداخت و تکمیل خرید" class="btn btn-success w-100">پرداخت و تکمیل خرید</button></form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
