@extends('base')
@section('content')

<style>
    ul.px-3 {
    list-style: none;

}

ul.px-3 li {
    display: inline-block;
}





</style>


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
                            <!-- Factors Count -->
                            <div class="custom-container" id="orders-status">
                                <div class="container nowrap">
                                    <div class="row py-2">
                                        <div class="col-12 px-0">
                                        <ul class="px-3">
                                            <li>
                                                <a href="#" class="tab-link active" data-tab="1">
                                                    <span>در انتظار پرداخت</span>
                                                    @if (count($unpaid))
                                                    <div class="badge badge-secondary">{{count($unpaid)}}</div>
                                                    @endif
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="tab-link" data-tab="2">
                                                    <span>پرداخت شده</span>
                                                    @if (count($paid))
                                                    <div class="badge badge-secondary">{{count($paid)}}</div>
                                                    @endif
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="tab-link" data-tab="3">
                                                    <span>ارسال شده</span>
                                                    @if (count($posted))
                                                    <div class="badge badge-secondary">{{count($posted)}}</div>
                                                    @endif
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="tab-link" data-tab="4">
                                                    <span>تکمیل شده</span>
                                                    @if (count($recieved))
                                                    <div class="badge badge-secondary">{{count($recieved)}}</div>
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Factors Count -->

                            <!-- Factors List -->
                            <div class="tab-panel" id="tab-1" >
                            @foreach ($unpaid as $order)
                            <div class="custom-container mt-2 order " >
                                <div class="row pt-2 px-3">
                                    <div class="col-12 col-sm-6"><h2>سفارش شماره #12lllll34</h2></div>
                                    <div class="col-12 col-sm-6 text-sm-end"><span>{{jdate($order->updated_at)->format('%B %d، %Y')}}</span> - <span> در انتظار پرداخت</span></div>
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
                                                        <!-- Order Record -->
                                                        @foreach ($order->products as $product)

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
                            @endforeach
                            </div>
                            <!-- /Factors List -->
                            <!-- Factors List -->
                            <div class="tab-panel" style="display: none;" id="tab-2">
                            @foreach ($paid as $order)

                                <div class="custom-container mt-2 order "  >
                                    <div class="row pt-2 px-3">
                                        <div class="col-12 col-sm-6"><h2>سفارش شماره #134</h2></div>
                                        <div class="col-12 col-sm-6 text-sm-end"><span>20 مرداد 1400</span> - <span>پرداخت شده</span></div>
                                    </div>
                                    <hr>
                                    <div class="container">
                                        <div class="row py-2">
                                            <div class="col-12">
                                                <div>
                                                    <div class="header">
                                                        <div class="total py-1"><span>مبلغ کل:</span> 3.000.000 تومان</div>
                                                    </div>
                                                    <div class="container products px-0">
                                                        <div class="row">
                                                            @foreach ($order->products as $product)
                                                            <!-- Order Record -->
                                                            <span class="col-12 col-sm-6 col-lg-4 col-xl-3 px-1">
                                                                <a href="../product.html" target="_blank">
                                                                    <div class="encode4326654321vfb">
                                                                        <div class="image" style="background-image: url('../assets/images/products/p100.png')"></div>
                                                                        <div class="text-center px-1 px-sm-3">
                                                                            <h2>گوشی موبایل سامسونگ مدل Galaxy A21s</h2>
                                                                            <div class="number">تعداد: 1 عدد</div>
                                                                            <div class="encode4365gbf265g43d">مبلغ: 3.000.000 عدد</div>
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
                            @endforeach
                            </div>
                            <!-- /Factors List -->
                            <!-- Factors List posted -->
                            <div class="tab-panel" style="display: none;" id="tab-3">
                            @foreach ($posted as $order)

                            <div class="custom-container mt-2 order "  >
                                <div class="row pt-2 px-3">
                                    <div class="col-12 col-sm-6"><h2>سفارش شماره #1234</h2></div>
                                    <div class="col-12 col-sm-6 text-sm-end"><span>{{jdate($order->updated_at)->format('%B %d، %Y')}}</span> - <span> ارسال شده  </span></div>
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
                                                        <!-- Order Record -->
                                                        @foreach ($order->products as $product)

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
                            @endforeach
                            </div>

                            <!-- /Factors List -->
                            <!-- Factors List -->
                            <div class="tab-panel" style="display: none;" id="tab-4">
                            @foreach ($recieved as $order)

                            <div class="custom-container mt-2 order tab-panel"  style="display: none;" id="tab-4">
                                <div class="row pt-2 px-3">
                                    <div class="col-12 col-sm-6"><h2>سفارش شماره #1234</h2></div>
                                    <div class="col-12 col-sm-6 text-sm-end"><span>{{jdate($order->updated_at)->format('%B %d، %Y')}}</span> - <span> تکمیل شده  </span></div>
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
                                                        <!-- Order Record -->
                                                        @foreach ($order->products as $product)

                                                        <span class="col-12 col-sm-6 col-lg-4 col-xl-3 px-1">
                                                            <a href="../product.html" target="_blank">
                                                                <div class="encode4326654321vfb">
                                                                    <div class="image" style="background-image: url('{{$product->gallery()->first()->image}}')"></div>
                                                                    <div class="text-center px-1 px-sm-3">
                                                                        <h2>{{$product->name}}</h2>
                                                                        <div class="number">تعداد: {{$product->pivot->quantity}} عدد</div>
                                                                        <div class="encode4365gbf265g43d">مبلغ: {{$product->pivot->quantity * (($order['discount_percent'] ?: $product->discust)/100 * $product->price)}} عدد</div>
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
                            @endforeach
                            </div>
                            <!-- /Factors List -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.tab-link').forEach(tab => {
    tab.addEventListener('click', function (event) {
        event.preventDefault();

        // حذف کلاس active از همه تب‌ها
        document.querySelectorAll('.tab-link').forEach(t => t.classList.remove('active'));

        // اضافه کردن کلاس active به تب کلیک شده
        this.classList.add('active');

        // پنهان کردن تمام محتوای تب‌ها
        document.querySelectorAll('.tab-panel').forEach(panel => {
            panel.style.display = 'none';
        });

        // نمایش محتوای تب مربوطه
        const targetTab = this.getAttribute('data-tab');
        document.getElementById(`tab-${targetTab}`).style.display = 'block';
    });
});

</script>



@endsection
