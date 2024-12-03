@extends('base')
@section('content')
    <script>
        $(document).ready(function() {
        // زمانی که دکمه افزایش کلیک می‌شود
        $('.btn-plus').click(function() {
            var productId = $(this).data('product-id');
            var currentQty = parseInt($('#order-number-' + productId).val());
            var newQty = currentQty + 1;

            // ارسال درخواست AJAX برای افزایش تعداد
            updateCart(productId, newQty);
        });

        // زمانی که دکمه کاهش کلیک می‌شود
        $('.btn-minus').click(function() {
            var productId = $(this).data('product-id');
            var currentQty = parseInt($('#order-number-' + productId).val());
            if (currentQty > 1) {  // مطمئن می‌شویم که تعداد از 1 کمتر نشود
                var newQty = currentQty - 1;

                // ارسال درخواست AJAX برای کاهش تعداد
                updateCart(productId, newQty);
            }
        });

        // تابع AJAX برای ارسال درخواست
        function updateCart(productId, newQty) {
            $.ajax({
                url: '/update-cart',  // آدرس API که به سرور ارسال می‌شود
                method: 'POST',  // یا 'PUT' بسته به روش شما
                data: {
                    product_id: productId,
                    quantity: newQty,
                    _token: '{{ csrf_token() }}'  // برای لاراول (در صورتی که از لاراول استفاده می‌کنید)
                },
                success: function(response) {
                    // در صورت موفقیت، تعداد جدید را در اینپوت نمایش می‌دهیم
                    $('#order-number-' + productId).val(newQty);
                    alert('Cart updated successfully!');
                },
                error: function(xhr) {
                    alert('Error updating cart.');
                }
            });
        }
    });
    </script>

<section class="inner-page" id="cart-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>سبد خرید</h1>
                            <p>مدیریت و خرید همزمان چند محصول</p>
                            <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
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
                            <div id="cart-products">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 py-3">
                                            <div class="pb-3" id="return-to-shop">می‌خواهید محصولات دیگری اضافه کنید؟ <a href="{{route('products')}}">بازگشت به فروشگاه</a></div>
                                            <div class="d-none d-md-block">
                                                <div class="row my-2" id="heading">
                                                    <div class="col-4">
                                                        <div>کالا</div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div>قیمت واحد</div>
                                                    </div>
                                                    <div class="col-2 pl-4">
                                                        <div>تعداد</div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div>تخفیف</div>
                                                    </div>
                                                    <div class="col-2 pr-0">
                                                        <div class="pr-3">قیمت نهایی</div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                            use App\Helpers\Cart\Cart;
                                            @endphp
                                            @if (! Cart::all()->count())
                                            <p>سبد خرید شما خالی است</p>
                                            @endif
                                            <!-- Order Product Record -->
                                             @foreach (Cart::all() as $cart )
                                             @if (isset($cart['product']))
                                             @php
                                             $product = $cart['product'];
                                             @endphp
                                             <div class="row product">
                                                 <div class="col-12 col-md-4">
                                                     <div class="row">
                                                         <div class="col-2 col-md-4 pl-0">
                                                             <img src="{{$product->gallery()->first()->image}}" alt="image">
                                                         </div>
                                                         <div class="col-10 col-md-8">
                                                             <a href="{{route('product',['id'=>$product->id])}}" target="_blank"><div class="title pt-2">{{$product->name}}</div></a>

                                                             @if ($cart['color']=='unimportant')

                                                             <a ><div class="title pt-2">رنگ : دلخواه</div></a>
                                                             <!-- <a ><div class="title pt-2" >{{$cart['id']}}</div></a> -->
                                                             @else

                                                             <a ><div class="title pt-2">رنگ :{{$cart['color']}}</div></a>
                                                             <!-- <a ><div class="title pt-2" >{{$cart['id']}}</div></a> -->
                                                             @endif
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-6 col-md-2">
                                                     <div class="d-md-none font-weight-bold">قیمت</div>
                                                     <div class="pt-1"><span class="product-encode4365gbf265g43d">{{$product->price}}</span> <span>تومان</span></div>
                                                 </div>
                                                 <div class="col-6 col-md-2 pl-4 pr-0 pr-md-3">
                                                     <div class="d-md-none font-weight-bold">تعداد</div>
                                                     <div class="input-group mb-3 order-number">
                                                         <!-- <div class="input-group-prepend">
                                                             <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
                                                         </div> -->
                                                         <input type="text" name="order-number[]"  max="10" value="{{$cart['quantity']}}" class="form-control text-center order-number" readonly>
                                                         <!-- <div class="input-group-prepend">
                                                             <button class="btn btn-outline-secondary btn-minus" type="button">_</button>
                                                         </div> -->
                                                     </div>
                                                 </div>
                                                 <div class="col-6 col-md-2">
                                                     <div class="d-md-none font-weight-bold">تخفیف</div>
                                                     <div class="pt-1"><span class="product-discount">{{($cart['discount_percent'] ?: $product->discust)/100 * $product->price}}</span> <span>تومان</span></div>
                                                 </div>
                                                 <div class="col-6 col-md-2 pr-0">
                                                     <div class="d-md-none font-weight-bold">قیمت نهایی</div>
                                                     <div class="pt-1 pr-2 bg-light"><span class="product-total" >{{(100 -($cart['discount_percent'] ?: $product->discust))/100 * $product->price}}</span> <span>تومان</span></div>
                                                     <form id="fo{{$product->id}}" action="{{route('delete_cart',['product'=>$product])}}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                    </form>
                                                     <a onclick="let deleter = document.querySelector('#fo{{$product->id}}').submit()" class="product-remove btn-remove-from-basket" data-id=""><div class="small pl-2"><i class="fa fa-times"></i> حذف</div></a>
                                                 </div>
                                             </div>
                                             <hr>
                                             @endif
                                             @endforeach
                                            <!-- Order Product Record -->
                                            <!-- Order Product Record -->

                                            <!-- Order Product Record -->
                                            @if (Cart::all()->count())

                                            <div class="row product">
                                                <form id="all" action="{{route('delete_cart_All')}}" method="post">
                                                    @csrf
                                                </form>
                                                <div class="col-12">
                                                    <a onclick="let all = document.querySelector('#all').submit()" class="product-remove btn-remove-from-basket" data-id="all"><div class="float-end small pl-2 font-weight-bold">خالی کردن سبد</div></a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Cart::all()->count())
                        <div class="col-12 col-lg-3 mt-2 mt-lg-0 pr-3 pr-lg-0">
                            <div id="factor">
                                <div class="container">
                                    <form action="{{route('checkout_post')}}" method="post">
                                        @csrf
                                    <div class="row py-2">
                                        <div class="col-6">
                                            <div>جمع کل فاکتور:</div>
                                        </div>
                                        <div class="col-6">
                                            <div><span id="factor-total-encode4365gbf265g43d"></span>{{$totalPrice}} تومان</div>
                                            <input type="hidden" name="totalPrice" id="input" class="form-control" value="{{$totalPrice}}">

                                        </div>
                                    </div>
                                    <div class="row py-2 bg-light">
                                        <div class="col-6">
                                            <div>جمع تخفیف:</div>
                                        </div>
                                        <div class="col-6">
                                            <div><span id="factor-total-discount">{{$totalDiscust}}</span> تومان</div>
                                            <input type="hidden" name="totalDiscust" id="input" class="form-control" value="{{$totalDiscust}}">
                                        </div>
                                    </div>
                                    <div class="row py-2" id="total">
                                        <div class="col-6">
                                            <div>مبلغ قابل پرداخت:</div>
                                        </div>
                                        <div class="col-6">
                                            <div><span id="factor-total">{{$FinalPrice}}</span> تومان</div>
                                            <input type="hidden" name="FinalPrice" id="input" class="form-control" value="{{$FinalPrice}}">
                                        </div>
                                    </div>

                                    <div class="row py-2">
                                        <div class="col-12">
                                            <input type="submit" value="ادامه ثبت سفارش" class="btn btn-success w-100">
                                        </div>
                                    </div>
                                    </form></div>
                            </div><br>
                            @if ($module->isEnabled())
                            <div id="factor">
                                <form action="{{route('discount.check')}}" class="d-flex" method="post">
                                <div class="container">


                                    <div class="row py-2" id="total">
                                            @csrf
                                        <div class="col-5">
                                            <div>کد تخفیف:</div>
                                        </div>
                                        <div class="col-7">
                                                <input type="hidden" name="cart" value="cart-roocket">
                                                <!-- <span id="factor-total">{{$FinalPrice}}</span> تومان -->
                                                 <input class="col-12" name="discount" type="text">

                                        </div>

                                            @if ($errors->has('discount'))
                                                <div class="text-danger text-sm mt-2 oi" >{{$errors->first('discount')}}</div>
                                            @endif
                                    </div>

                                    <div class="row py-2">
                                        <div class="col-12">
                                            <a ><input type="submit" value="اعمال کد تخفیف" class="btn btn-success w-100"></a>
                                        </div></div></form>
                                    </div>
                                    @endif
                                </div>
                                </div>
                            </div>
                        </div>
                        @endif




                        <!-- Suggested Products -->
                        <div class="col-12 pt-5" id="suggested-products">
                            <div class="title py-3 text-center">سایر محصولات پیشنهادی</div>
                            <div class="owl-carousel products-carousel">
                                @foreach ($products as $product )

                                <!-- Product Item -->
                                <div class="encode4326654321vfb item">
                                    <a href="{{route('product',['id'=>$product->id])}}"><div class="image" style="background-image: url('{{$product->gallery()->first()->image}}')"></div></a>
                                    <div class="details p-3">
                                    <div class="category">
                                            <a href="/Pro?search={{$product->category()->first()->name}}">{{$product->category()->first()->name}}</a>
                                            &nbsp;/&nbsp;
                                            <a href="/products?search={{$product->Brand}}">{{$product->Brand}}</a>
                                    </div>
                                        <a href="{{route('product',['id'=>$product->id])}}""><h2>{{$product->name}}</h2></a>
                                        <div class="encode4365gbf265g43d">{{$product->price}} تومان</div>
                                        <div class="rate">
                                        @for ( $i=0; $i < $product->stars; $i++ )
                                        <i class="fa fa-star"></i>

                                        @endfor
                                            <span class="encode43bf265g43d">@if($product->comment->count())( ({{$product->comment->count()}}) رای دهنده)@endif</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Product Item -->
                                @endforeach
                            </div>
                        </div>
                        <!-- /Suggested Products -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
