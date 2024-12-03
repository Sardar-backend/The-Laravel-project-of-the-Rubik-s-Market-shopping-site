@extends('base')
@section('content')

<!-- Slider Section -->
<section id="slider" class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9" data-aos="fade-zoom-in" data-aos-duration="700">
                <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/slider/slide1.jpg" class="d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/slider/slide2.jpg" class="d-block" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-3 mt-2 mt-sm-1 text-center text-sm-start" id="slider-side-banners">
                <div class="row row-cols-1 row-cols-sm-3 row-cols-md-1 h-100 gy-2 g-sm-1 g-md-0">
                    <div class="col align-self-start" data-aos="fade-top" data-aos-duration="1000">
                        <a href="/product-3">
                            <img src="assets/images/slider/side-slide1.jpg" alt="image" width="100%">
                        </a>
                    </div>
                    <div class="col align-self-center" data-aos="fade-top" data-aos-duration="1100">
                        <a href="/product-4">
                            <img src="assets/images/slider/side-slide2.jpg" alt="image" width="100%">
                        </a>
                    </div>
                    <div class="col align-self-end" data-aos="fade-top" data-aos-duration="1200">
                        <a href="/product-1">
                            <img src="assets/images/slider/side-slide3.jpg" alt="image" width="100%">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Slider Section -->

<!-- Featured Products Section -->
<section id="featured-products" class="my-5">
    <div class="container">
        <!-- Tabs -->
        <div class="row pb-2 pb-sm-4">
            <div class="col-12 text-center">
                <div class="btn-group" role="group" id="featured-products-nav">
                    <button type="button" class="btn active featured-categories" data-val="featured">محصولات منتخب</button>
                    <button type="button" class="btn featured-categories" data-val="on-sale">تخفیف خورده</button>
                    <button type="button" class="btn featured-categories" data-val="most-visited">پربازدیدترین</button>
                </div>
            </div>
        </div>
        <!-- /Tabs -->

        <!-- Products -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-md-4 featured-product featured" data-aos="fade-up" data-aos-duration="1000">
            @foreach ($pro as $p)
            <div class="col">
                <!-- Product Box -->
                <div class="col">
                    <!-- Product Box -->
                    <div class="encode4326654321vfb">
                        <a href="{{route('product',['id'=>$p->id])}}"><div class="image" style="background-image: url('{{$p->gallery()->first()->image}}')"></div></a>
                <form id="formlike{{$p->id}}" action="{{route('like_post')}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$p->id}}">
                </form>
                <form id="formdislike{{$p->id}}" action="{{route('dislike_post' )}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$p->id}}">
                </form>
                    <div class="icons">
                    @guest
                    <div onclick="let cdsds = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @else
                    @if (Auth::user()->favorite()->where('product_id',$p->id)->get()->first())
                        <div style="background-image: url('assets/images/icons/favorited.png'); background-repeat:no-repeat;  background-position:center;" onclick="let dsd = document.querySelector('#formdislike{{$p->id}}').submit()" class="btn btn-outline-secondary "></div>
                    @else
                    <div onclick="let cdss = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @endif
                    @endif
                    </div>
                        <div class="details p-3">
                            <!-- <div class="category">
                                <a href={{route('product',['id'=>$p->id])}}>گوشی موبایل</a>
                                &nbsp;/&nbsp;
                                <a href={{route('product',['id'=>$p->id])}}>سامسونگ</a>
                            </div> -->
                            <div class="category">
                                <a href="/Pro?search={{$p->category()->first()->name}}">{{$p->category()->first()->name}}</a>
                                &nbsp;/&nbsp;
                                <a href="/products?search={{$p->Brand}}">{{$p->Brand}}</a>
                            </div>
                            <a href={{route('product',['id'=>$p->id])}}><h2>{{$p->name}}</h2></a>
                            <div class="encode4365gbf265g43d">{{$p->price}} تومان</div>
                            <div class="rate">
                            @for ( $i=0; $i < $p->stars; $i++ )
                                <i class="fa fa-star"></i>

                                @endfor
                                <span class="encode43bf265g43d">@if($p->comment->count())( ({{$p->comment->count()}}) رای دهنده)@endif</span>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Box -->
                </div>
                <!-- /Product Box -->
            </div>
            @endforeach
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-md-4 featured-product on-sale">
            @foreach ($discounted as $product)
                        <div class="col">
                <!-- Product Box -->
                <div class="encode4326654321vfb">
                    <a href="{{route('product',['id'=>$product->id])}}">
                        <div class="image" style="background-image: url({{$product->gallery()->first()->image}})">
                            <!-- <span class="badge on-sale-badge">فروش ویژه</span> -->
                        </div>
                    </a>
                <form id="formlike{{$product->id}}" action="{{route('like_post')}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                <form id="formdislike{{$product->id}}" action="{{route('dislike_post' )}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                    <div class="icons">
                    @guest
                    <div onclick="let cdsdsq = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @else
                    @if (Auth::user()->favorite()->where('product_id',$p->id)->get()->first())
                        <div style="background-image: url('assets/images/icons/favorited.png'); background-repeat:no-repeat;  background-position:center;" onclick="let dsdq = document.querySelector('#formdislike{{$p->id}}').submit()" class="btn btn-outline-secondary "></div>
                    @else
                    <div onclick="let cdssq = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @endif
                    @endif
                    </div>
                    <div class="details p-3">
                        <!-- <div class="category">
                            <a href="products.html">گوشی موبایل</a>
                            &nbsp;/&nbsp;
                            <a href="products.html">سامسونگ</a>
                        </div> -->
                        <div class="category">
                                <a href="/Pro?search={{$product->category()->first()->name}}">{{$product->category()->first()->name}}</a>
                                &nbsp;/&nbsp;
                                <a href="/products?search={{$product->Brand}}">{{$product->Brand}}</a>
                        </div>
                        <a href="{{route('product',['id'=>$product->id])}}"><h2>{{$product->name}}</h2></a>
                        <div>
                            <span class="discounted">{{$product->price}} تومان</span>
                            <br class="d-sm-none">
                            <span class="encode4365gbf265g43d">{{$product->price * (100 - $product->discust)/100}} تومان</span>
                        </div>
                        <div class="rate">
                        @for ( $i=0; $i < $product->stars; $i++ )
                                <i class="fa fa-star"></i>

                        @endfor
                            <span class="encode43bf265g43d">@if($product->comment->count())( ({{$product->comment->count()}}) رای دهنده)@endif</span>
                        </div>
                    </div>
                </div>
                <!-- /Product Box -->
            </div>
            @endforeach

        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-md-4 featured-product most-visited">
            @foreach ($count_view as $product)

            <div class="col">
                <!-- Product Box -->
                <form id="formlike{{$product->id}}" action="{{route('like_post')}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                <form id="formdislike{{$product->id}}" action="{{route('dislike_post' )}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                <div class="encode4326654321vfb">
                    <a href="product-{{$product->id}}"><div class="image" style="background-image: url({{$product->gallery()->first()->image}})"></div></a>
                    <div class="icons">
                    @guest
                    <div onclick="let cdsdsn = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @else
                    @if (Auth::user()->favorite()->where('product_id',$p->id)->get()->first())
                        <div style="background-image: url('assets/images/icons/favorited.png'); background-repeat:no-repeat;  background-position:center;" onclick="let dsdn = document.querySelector('#formdislike{{$p->id}}').submit()" class="btn btn-outline-secondary "></div>
                    @else
                    <div onclick="let cdssn = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @endif
                    @endif
                    </div>
                    <div class="details p-3">
                    <div class="category">
                                <a href="/Pro?search={{$product->category()->first()->name}}">{{$product->category()->first()->name}}</a>
                                &nbsp;/&nbsp;
                                <a href="/products?search={{$product->Brand}}">{{$product->Brand}}</a>
                    </div>
                        <a href="{{route('product',['id'=>$product->id])}}"><h2>{{$product->name}}</h2></a>
                        <div class="encode4365gbf265g43d">{{$product->price}} تومان</div>
                        <div class="rate">
                        @for ( $i=0; $i < $product->stars; $i++ )
                                <i class="fa fa-star"></i>

                                @endfor
                            <span class="encode43bf265g43d">@if($product->comment->count())( ({{$product->comment->count()}}) رای دهنده)@endif</span>
                        </div>
                    </div>
                </div>
                <!-- /Product Box -->
            </div>
            @endforeach


        </div>
        <!-- /Products -->
    </div>
</section>
<!-- /Featured Products Section -->

<!-- On Sale Products -->
<section id="encode4365gbf2vfc65g43d" class="py-5 mt-5">
    <h1 class="section-title">فروش ویژه</h1>
    <div class="section-subtitle">محصولات دارای تخفیف ویژه به مدت محدود</div>
    <div class="container pt-4">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="on-sale-encode4326654321vfb h-100 p-3" data-aos="fade-zoom-in" data-aos-duration="800">
                    <div class="row h-100">
                        <div class="col-12 col-sm-4 col-lg-5">
                            <a href="{{route('product',['id'=>$product->id])}}"><div class="image h-100" style="background-image: url('{{$product->gallery()->first()->image}}')"></div></a>
                        </div>
                        <div class="col-12 col-sm-8 col-lg-7 py-3">
                            <div class="encode4365gbf2vrf">محصول ویژه امروز</div>
                            <div class="box-subtitle">فروش به مدت محدود</div>
                            <a href="{{route('product',['id'=>$product->id])}}">
                                <div class="product-title pt-4">{{$product->name}}</div>
                            </a>
                            <div class="encode4365gbf265g43d py-2">
                                <span class="discounted">{{$product->price * (100 - $product->discust)/100}} تومان</span>
                                <br class="d-sm-none">
                                <span class="pre">{{$product->price}}تومان</span>
                            </div>
                            <div class="cta pt-2">
                                <a href="{{route('product',['id'=>$product->id])}}" class="hvr-icon-back">همین حالا بخرید <i class="fa fa-arrow-left hvr-icon"></i></a>
                            </div>
                            <!-- <div class="counter mt-3">
                                <div class="time-counter">
                                    <div class="seconds count">
                                        <div class="num">30</div>
                                        <div class="label">ثانیه</div>
                                    </div>
                                    <div class="minutes count">
                                        <div class="num">59</div>
                                        <div class="label">دقیقه</div>
                                    </div>
                                    <div class="hours count">
                                        <div class="num">13</div>
                                        <div class="label">ساعت</div>
                                    </div>
                                    <div class="days count">
                                        <div class="num">38</div>
                                        <div class="label">روز</div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($special_sale as $product)

            <div class="col-12 col-sm-6 col-lg-3">
                <!-- Product Box -->
                <div class="encode4326654321vfb">
                    <a href="{{route('product',['id'=>$product->id])}}">
                        <div class="image" style="background-image: url('{{$product->gallery()->first()->image}}')">
                            <span class="badge on-sale-badge">فروش ویژه</span>
                        </div>
                    </a>
                    <div class="details p-3">
                    <div class="category">
                                <a href="/Pro?search={{$product->category()->first()->name}}">{{$product->category()->first()->name}}</a>
                                &nbsp;/&nbsp;
                                <a href="/products?search={{$product->Brand}}">{{$product->Brand}}</a>
                        </div>
                        <a href="{{route('product',['id'=>$product->id])}}"><h2>{{$product->name}}</h2></a>
                        <div>
                            <span class="discounted">{{$product->price}} تومان</span>
                            <br class="d-sm-none">
                            <span class="encode4365gbf265g43d">{{$product->price * (100 - $product->discust)/100}} تومان</span>
                        </div>
                        <div class="rate">
                        @for ( $i=0; $i < $product->stars; $i++ )
                                <i class="fa fa-star"></i>

                        @endfor
                            <span class="encode43bf265g43d">@if($product->comment->count())( ({{$product->comment->count()}}) رای دهنده)@endif</span>
                        </div>
                    </div>
                </div>
                <!-- /Product Box -->
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- /On Sale Products -->

<!-- Benefits Section -->
<section id="benefits" class="pt-4">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 gy-3 text-center">
            <div class="col" data-aos="fade-zoom-in" data-aos-duration="800">
                <img src="assets/images/benefits/benefit1.png" alt="image">
                <span>پشتیبانی 24 ساعته</span>
            </div>
            <div class="col" data-aos="fade-zoom-in" data-aos-duration="1000">
                <img src="assets/images/benefits/benefit2.png" alt="image">
                <span>ضمانت اصالت کالا</span>
            </div>
            <div class="col" data-aos="fade-zoom-in" data-aos-duration="1200">
                <img src="assets/images/benefits/benefit3.png" alt="image">
                <span>ضمانت بازگشت وجه</span>
            </div>
            <div class="col" data-aos="fade-zoom-in" data-aos-duration="1400">
                <img src="assets/images/benefits/benefit4.png" alt="image">
                <span>ارسال سریع و رایگان</span>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col">
                <hr>
            </div>
        </div>
    </div>
</section>
<!-- /Benefits Section -->

<!-- Most Sales Products -->
<section id="encode436bvf2vrf" class="pt-4">
    <h1 class="section-title">پرفروش ترین محصولات</h1>
    <div class="container pt-4">
        <!-- Tabs -->
         @php
         use App\Models\productcategory;
         @endphp
        <div class="row pb-2 pb-sm-4">
            <div class="col-12 text-center">
                <div class="btn-group" role="group" id="encode436bvf2vrf-nav">
                    <button type="button" class="btn active most-sales-categories" data-val="mobile"> {{productcategory::all()[0]->name}}</button>
                    <button type="button" class="btn most-sales-categories" data-val="laptop">{{productcategory::all()[1]->name}}</button>
                    <button type="button" class="btn most-sales-categories" data-val="computer"> {{productcategory::all()[2]->name}}</button>
                    <button type="button" class="btn most-sales-categories" data-val="camera">{{productcategory::all()[3]->name}}</button>
                </div>
            </div>
        </div>
        <!-- /Tabs -->

        <!-- Products -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-md-4 most-sales-product mobile" data-aos="fade-up" data-aos-duration="1000">
            @foreach (productcategory::all()[0]->products()->limit(8)->get() as $product )
            <div class="col">
                <!-- Product Box -->
                <div class="encode4326654321vfb">
                    <a href="{{route('product',['id'=>$product->id])}}"><div class="image" style="background-image: url({{$product->gallery()->first()->image}})"></div></a>
                    <form id="formlike{{$product->id}}" action="{{route('like_post')}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                <form id="formdislike{{$product->id}}" action="{{route('dislike_post' )}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                    <div class="icons">
                    @guest
                    <div onclick="let cdsgds = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @else
                    @if (Auth::user()->favorite()->where('product_id',$p->id)->get()->first())
                        <div style="background-image: url('assets/images/icons/favorited.png'); background-repeat:no-repeat;  background-position:center;" onclick="let dsgd = document.querySelector('#formdislike{{$p->id}}').submit()" class="btn btn-outline-secondary "></div>
                    @else
                    <div onclick="let cdsgs = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @endif
                    @endif
                    </div>
                    <div class="details p-3">
                    <div class="category">
                                <a href="/Pro?search={{$product->category()->first()->name}}">{{$product->category()->first()->name}}</a>
                                &nbsp;/&nbsp;
                                <a href="/products?search={{$product->Brand}}">{{$product->Brand}}</a>
                        </div>
                        <a href="{{route('product',['id'=>$product->id])}}"><h2>{{$product->name}}</h2></a>
                        <div class="encode4365gbf265g43d">{{$product->price}} تومان</div>
                        <div class="rate">
                        @for ( $i=0; $i < $product->stars; $i++ )
                                <i class="fa fa-star"></i>

                                @endfor
                            <span class="encode43bf265g43d">@if($product->comment->count())( ({{$product->comment->count()}}) رای دهنده)@endif</span>
                        </div>
                    </div>
                </div>
                <!-- /Product Box -->
            </div>
            @endforeach

        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-md-4 most-sales-product laptop" data-aos="fade-up" data-aos-duration="1000">
            @foreach (productcategory::all()[1]->products()->limit(8)->get() as $product)
            <div class="col">
                <!-- Product Box -->
                <div class="encode4326654321vfb">
                    <a href="{{route('product',['id'=>$product->id])}}"><div class="image" style="background-image: url({{$product->gallery()->first()->image}})"></div></a>
                    <form id="formlike{{$product->id}}" action="{{route('like_post')}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                <form id="formdislike{{$product->id}}" action="{{route('dislike_post' )}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                    <div class="icons">
                    @guest
                    <div onclick="let cdsdaas = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @else
                    @if (Auth::user()->favorite()->where('product_id',$p->id)->get()->first())
                        <div style="background-image: url('assets/images/icons/favorited.png'); background-repeat:no-repeat;  background-position:center;" onclick="let dsdaa = document.querySelector('#formdislike{{$p->id}}').submit()" class="btn btn-outline-secondary "></div>
                    @else
                    <div onclick="let cdsaas = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @endif
                    @endif
                    </div>
                    <div class="details p-3">
                    <div class="category">
                                <a href="/Pro?search={{$product->category()->first()->name}}">{{$product->category()->first()->name}}</a>
                                &nbsp;/&nbsp;
                                <a href="/products?search={{$product->Brand}}">{{$product->Brand}}</a>
                        </div>
                        <a href="{{route('product',['id'=>$product->id])}}"><h2>{{$product->name}}</h2></a>
                        <div class="encode4365gbf265g43d">{{$product->price}} تومان</div>
                        <div class="rate">
                        @for ( $i=0; $i < $product->stars; $i++ )
                                <i class="fa fa-star"></i>

                        @endfor
                            <span class="encode43bf265g43d">@if($product->comment->count())( ({{$product->comment->count()}}) رای دهنده)@endif</span>
                        </div>
                    </div>
                </div>
                <!-- /Product Box -->
            </div>
            @endforeach
            </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-md-4 most-sales-product computer" data-aos="fade-up" data-aos-duration="1000">
            @foreach (productcategory::all()[2]->products()->limit(8)->get() as $product )


            <div class="col">
                <!-- Product Box -->
                <div class="encode4326654321vfb">
                    <a href="{{route('product',['id'=>$product->id])}}"><div class="image" style="background-image: url({{$product->gallery()->first()->image}})"></div></a>
                    <form id="formlike{{$product->id}}" action="{{route('like_post')}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                <form id="formdislike{{$product->id}}" action="{{route('dislike_post' )}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                    <div class="icons">
                    @guest
                    <div onclick="let cdsdhs = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @else
                    @if (Auth::user()->favorite()->where('product_id',$p->id)->get()->first())
                        <div style="background-image: url('assets/images/icons/favorited.png'); background-repeat:no-repeat;  background-position:center;" onclick="let dsdh = document.querySelector('#formdislike{{$p->id}}').submit()" class="btn btn-outline-secondary "></div>
                    @else
                    <div onclick="let cdshs = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @endif
                    @endif
                    </div>
                    <div class="details p-3">
                    <div class="category">
                                <a href="/products?search={{$product->category()->first()->name}}">{{$product->category()->first()->name}}</a>
                                &nbsp;/&nbsp;
                                <a href="/products?search={{$product->Brand}}">{{$product->Brand}}</a>
                        </div>
                        <a href="{{route('product',['id'=>$product->id])}}"><h2>{{$product->name}}</h2></a>
                        <div class="encode4365gbf265g43d">{{$product->price}} تومان</div>
                        <div class="rate">
                        @for ( $i=0; $i < $product->stars; $i++ )
                                <i class="fa fa-star"></i>

                                @endfor
                            <span class="encode43bf265g43d">@if($product->comment->count())( ({{$product->comment->count()}}) رای دهنده)@endif</span>
                        </div>
                    </div>
                </div>
                <!-- /Product Box -->
            </div>
            @endforeach
            </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-md-4 most-sales-product camera" data-aos="fade-up" data-aos-duration="1000">
            @foreach (productcategory::all()[3]->products()->limit(8)->get() as $product)

            <div class="col">
                <!-- Product Box -->
                <div class="encode4326654321vfb">
                    <a href="{{route('product',['id'=>$product->id])}}"><div class="image" style="background-image: url({{$product->gallery()->first()->image}})"></div></a>
                    <form id="formlike{{$product->id}}" action="{{route('like_post')}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                <form id="formdislike{{$product->id}}" action="{{route('dislike_post' )}}" method="post">@csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                </form>
                    <div class="icons">
                    @guest
                    <div onclick="let cdsdos = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @else
                    @if (Auth::user()->favorite()->where('product_id',$p->id)->get()->first())
                        <div style="background-image: url('assets/images/icons/favorited.png'); background-repeat:no-repeat;  background-position:center;" onclick="let dsod = document.querySelector('#formdislike{{$p->id}}').submit()" class="btn btn-outline-secondary "></div>
                    @else
                    <div onclick="let cdsos = document.querySelector('#formlike{{$p->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                    @endif
                    @endif
                    </div>
                    <div class="details p-3">
                    <div class="category">
                                <a href="/Pro?search={{$product->category()->first()->name}}">{{$product->category()->first()->name}}</a>
                                &nbsp;/&nbsp;
                                <a href="/products?search={{$product->Brand}}">{{$product->Brand}}</a>
                        </div>
                        <a href="{{route('product',['id'=>$product->id])}}"><h2>{{$product->name}}</h2></a>
                        <div class="encode4365gbf265g43d">{{$product->price}} تومان</div>
                        <div class="rate">
                        @for ( $i=0; $i < $product->stars; $i++ )
                                <i class="fa fa-star"></i>

                                @endfor
                            <span class="encode43bf265g43d">@if($product->comment->count())( ({{$product->comment->count()}}) رای دهنده)@endif</span>
                        </div>
                    </div>
                </div>
                <!-- /Product Box -->
            </div>

            @endforeach
        </div>
        <!-- /Products -->
    </div>
</section>
<!-- /Most Sales Products -->

<!-- Promo Images -->
<div class="container" data-aos="fade-up" data-aos-duration="1200">
    <div class="row">
        <div class="col-12 col-md-4 pt-2 text-center">
            <a href="products?search=لپ‌تاپ">
                <img src="assets/images/promo-image1.png" alt="image">
            </a>
        </div>
        <div class="col-12 col-md-8 pt-2 text-center">
            <a href="products?search=موبایل">
                <img src="assets/images/promo-image2.png" alt="image">
            </a>
        </div>
    </div>
</div>
<!-- /Promo Images -->

<!-- Blog Section -->
<section id="blog" class="pt-5">
    <h1 class="section-title">جدیدترین مقالات آموزشی</h1>
    <div class="container pt-4">
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($blogs as $blog)
            <!-- Blog Post -->

            <div class="col">
                <div class="encode43bdsf23da" data-aos="fade-up" data-aos-duration="1000">
                    <a href="/blog-single-{{$blog->id}}"><div class="post-image" style="background-image: url('{{$blog->image}}')"></div></a>
                    <div class="details py-3 px-4">
                        <div class="post-date">ارسال شده در {{jdate($blog->failed_at)->ago()}}</div>
                        <a href="/blog-single-{{$blog->id}}">
                            <h2 class="post-title">{{$blog->title}}</h2>
                        </a>
                        <a href="/blog-single-{{$blog->id}}">
                            <div class="encode43bbfb">{{substr(strip_tags($blog->content),0,462)}}...</div>
                        </a>
                        <div class="read-more"><a href="{{route('blog_single' , $id=$blog->id )}}" class="hvr-icon-back">بیشتر خوانید <i class="fa fa-arrow-left hvr-icon"></i></a></div>
                    </div>
                </div>
            </div>
            <!-- Blog Post -->
             @endforeach

        </div>
    </div>
</section>
<!-- /Blog Section -->


@endsection
