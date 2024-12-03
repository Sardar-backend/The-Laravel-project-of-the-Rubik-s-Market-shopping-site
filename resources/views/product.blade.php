<!DOCTYPE html>
<html lang="fa" dir="rtl">

<!-- Mirrored from rubik-market-html.wbrk.ir/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Aug 2023 06:32:39 GMT -->
<head>

    <!-- <title>قالب فروشگاهی روبیک مارکت</title> -->

     {!! SEO::generate() !!}
    <!-- CSS Styles -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>قالب فروشگاهی روبیک مارکت</title>
    <!-- CSS Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/aos-master/dist/aos.css">
    <link rel="stylesheet" href="assets/plugins/hover-master/css/hover-min.css">
    <link rel="stylesheet" href="assets/css/ionicons.css">
    <link rel="stylesheet" href="assets/css/droopmenu.css">
    <link rel="stylesheet" href="assets/css/highlight.css">
    <link rel="stylesheet" href="assets/css/nouislider.min.css">
    <link rel="icon" href="/assets/images/logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/product-gallery.css">
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css" />
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css" />

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .but_s{
            background: inherit !important;
            border: 0;
        }
        .post-image{
            pointer-events: none;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
        .cca{
            justify-content: center !important;
            align-items: center !important;
        }
        .fgf:hover{
            color: #AEBA22 !important;
        }
        .ico{
            color: black !important;
            width: 4% !important;
            height: 4% !important;
            margin: 0 2px 0 2px !important;
        }
        .about-img{
            box-shadow: 20px 20px 15px #8A8A8A;
        }

    </style>
</head>
<body>
<!-- Header -->
<section id="header">
    <!-- Top NavBar -->
    <div id="encode4325436">
        <div class="container">
            <div class="row">
                <div class="col-8 d-none d-md-block">
                    <ul>
                        <li><a href="{{route('index')}}">صفحه نخست</a></li>
                        <li><a href="{{route('about')}}">درباره ما</a></li>
                        <li><a href="{{route('contact')}}">تماس با ما</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 text-center text-md-end" id="top-encode43vfbb65gtabfb">
                    <span>این سایت یک نمونه کار است و کارکرد تجاری ندارد</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /Top NavBar -->
    <!-- Search NavBar -->
     @php
        use App\Helpers\Cart\Cart;
        $count =(Cart::all()->count()==0)?null:Cart::all()->count();

        $categorys=App\Models\productcategory::where('parent',0)->get();

     @endphp
    <div id="encode43254bvfb">
        <div class="container pt-1">
            <div class="row py-3 align-content-center">
                <div class="col-12 col-md-3 col-xl-2 text-center text-md-start pb-2" id="encode4326523bvfb">
                    <a href={{route('index')}}>
                        <img src="assets/images/logo.png" alt="image"> روبیک مارکت
                    </a>
                </div>
                <div class="col-12 col-md-5 col-xl-6">
                    <form action="{{route('products')}}" method="get">
                    <div id="search-bar">
                        <button class="but_s" type="submit"><i class="fa fa-search"></i></button>
                        <input name="search" type="text" placeholder="جستجو کنید...">
                    </div></form>
                </div>
                <div class="col-12 col-md-4">
                    <div class="row">
                        @guest
                        <div class="col-12 col-md-7 col-lg-6 text-center" id="btn-login-register">
                            <a href="{{route('login')}}">ورود</a> /
                            <a href="{{route('login')}}">عضویت</a>
                        </div>
                        @else
                        <div class="col-12 col-md-7 col-lg-6 text-center" id="btn-login-register">
                            <a href="">{{Auth::user()->name}}</a>
                        </div>
                        @endguest
                        <div class="col-12 col-md-5 col-lg-6">
                            <a href={{route('cart')}}>
                                <div class="btn btn-warning w-100"><i class="fa fa-shopping-cart"></i>&nbsp;<span class="d-md-none d-lg-inline-block">سبد خرید</span> {{$count}}</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Search NavBar -->
    <!-- Main NavBar -->
    <div id="main-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="droopmenu-navbar dmarrow-down droopmenu-horizontal dmpos-top dmfade">
                        <div class="droopmenu-inner">
                            <div class="droopmenu-header">
                                <a href="#" class="droopmenu-toggle"><i class="dm-burg"></i></a>
                                <span class="d-md-none">منوی فروشگاه</span>
                            </div>
                            <!-- Header Mega Menu-->
                            <div class="droopmenu-nav">
                                <div class="droopmenu-nav-wrap">
                                    <div class="droopmenu-navi">
                                        <ul class="droopmenu">
                                            <li class="droopmenu-parent" aria-haspopup="true">
                                                <a href="#" aria-expanded="false"><i class="fa fa-bars"></i>&nbsp;&nbsp;گروه های محصولات<em class="droopmenu-topanim"></em></a><div class="dm-arrow"></div>
                                                <ul class="droopmenu-grid droopmenu-grid-9">
                                                    <li class="droopmenu-tabs droopmenu-tabs-vertical">
                                                    @foreach ($categorys as $categor )

                                                    <div class="droopmenu-tabsection" id="droopmenutab11">
                                                        <a class="droopmenu-tabheader" href="products?search=">{{$categor->name}}</a>
                                                        <div class="droopmenu-tabcontent">
                                                            <div class="droopmenu-row">
                                                                @foreach ($categor->parentCategory as $categoryChild )

                                                                <ul class="droopmenu-col droopmenu-col4">
                                                                    <li><h4>{{$categoryChild->name}}</h4></li>
                                                                    @foreach ($categoryChild->parentCategory as $item )

                                                                    <li><a href="products?search={{$item->name}}">{{$item->name}}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                                @endforeach

                                                                <!-- <ul class="droopmenu-col droopmenu-col4 d-none d-lg-inline-block">
                                                                    <li><img src="assets/images/megamenu/megamenu-image2.png" alt="image"></li>
                                                                </ul> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href={{route('about')}}>درباره ما<em class="droopmenu-topanim"></em></a></li>

                                            <li class="droopmenu-parent" aria-haspopup="true">
                                                <a href={{route('contact')}} aria-expanded="false">تماس با فروشگاه<em class="droopmenu-topanim"></em></a><div class="dm-arrow"></div>
                                                <ul style="">
                                                    <li><a href={{route('faq')}}>سوالات متداول</a></li>
                                                    <li><a href={{route('contact')}}>تماس با ما</a></li>
                                                </ul>
                                            </li>
                                            <li class="droopmenu-parent" aria-haspopup="true">
                                                <a href="{{route('blog_list')}}" aria-expanded="false">بلاگ آموزشی<em class="droopmenu-topanim"></em></a><div class="dm-arrow"></div>

                                            </li>
                                            <li class="droopmenu-parent" aria-haspopup="true">
                                                <a href="#" aria-expanded="false">سایر صفحات<em class="droopmenu-topanim"></em></a><div class="dm-arrow"></div>
                                                <ul style="">

                                                    <li><a href="cart">سبد خرید</a></li>
                                                    <li><a href="checkout">پیش فاکتور</a></li>

                                                </ul>
                                            </li>
                                            <li class="droopmenu-parent" aria-haspopup="true">
                                                <a href={{route('personal')}} aria-expanded="false">پروفایل کاربری<em class="droopmenu-topanim"></em></a><div class="dm-arrow"></div>
                                                <ul style="">
                                                    <li><a href={{route('personal')}}>مشخصات کاربری</a></li>
                                                    <li><a href={{route('factors')}}>سفارشات</a></li>
                                                    <li><a href={{route('adresses')}}>آدرس ها</a></li>
                                                    <li><a href={{route('favorites')}}>علاقه مندی ها</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /Header Menu Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main NavBar -->
</section>
<!-- /Header -->

@php
$quantity=(Cart::get($product)==null)? 0:Cart::get($product)['quantity'];

$colorMap = [
    'قرمز' => 'red',
    'سبز' => 'green',
    'زرد' => 'yellow',
    'آبی' => 'blue',
    'نارنجی' => 'orange',
    'بنفش' => 'purple',
    'صورتی' => 'pink',
    'قهوه‌ای' => 'brown',
    'خاکستری' => 'gray',
    'سیاه' => 'black',
    'سفید' => 'white',
    'آبی تیره' => 'darkblue',
    'آبی روشن' => 'lightblue',
    'سبز تیره' => 'darkgreen',
    'سبز روشن' => 'lightgreen',
    'قرمز تیره' => 'darkred',
    'قرمز روشن' => 'lightcoral',
    'زرد تیره' => 'goldenrod',
    'زرد روشن' => 'lightyellow',
    'نارنجی تیره' => 'darkorange',
    'نارنجی روشن' => 'lightsalmon',
    'بنفش تیره' => 'darkviolet',
    'بنفش روشن' => 'plum',
    'صورتی تیره' => 'deeppink',
    'صورتی روشن' => 'lightpink',
    'قهوه‌ای تیره' => 'sienna',
    'قهوه‌ای روشن' => 'burlywood',
    'خاکستری تیره' => 'dimgray',
    'خاکستری روشن' => 'lightgray',
    'فیروزه‌ای' => 'turquoise',
    'لاجوردی' => 'navy',
    'لیمویی' => 'lime',
    'کاربنی' => 'midnightblue',
    'شفقی' => 'orangered',
    'آبی کبود' => 'steelblue',
    'لاجوردی روشن' => 'skyblue',
    'سبز فسفری' => 'chartreuse',
    'خردلی' => 'gold',
    'کاهویی' => 'greenyellow',
    'ارکیده‌ای' => 'orchid',
    'رزگلد' => 'rosybrown',
    'سرخابی' => 'fuchsia',
    'آبی فیروزه‌ای' => 'cyan',
    'سبز دریایی' => 'seagreen',
    'سرمه‌ای' => 'teal',
    'زرد طلایی' => 'gold',
    'زرشکی' => 'maroon',
    'یاسی' => 'lavender',
    'قرمز آتشی' => 'firebrick',
    'آبی نفتی' => 'cadetblue',
    'آبی اقیانوسی' => 'aquamarine',
    'کرمی' => 'beige',
    'گلبهی' => 'coral',
    'نیلی' => 'indigo',
    'زیتونی' => 'olive',
    'خاکی' => 'khaki',
    'نقره‌ای' => 'silver',
    'مسی' => 'copper',
    'آبی آسمانی' => 'skyblue',
    'خرمایی' => 'chocolate',
    'پسته‌ای' => 'palegreen',
    'بادمجانی' => 'rebeccapurple',
    'شامپاینی' => 'champagne',
    'آبی سلطنتی' => 'royalblue',
    'زرد موزی' => 'banana',
    'سبز پسته‌ای' => 'mintcream',
    'قرمز گیلاسی' => 'cherry',
    'آبی کاربنی' => 'prussianblue',
    'صورتی چرک' => 'thistle',
    'آبی کارولینایی' => 'carolina',
    'قرمز عنابی' => 'crimson',
    'سبز یشمی' => 'jade',
    'آبی یخی' => 'aliceblue',
    'کبود' => 'cornflowerblue',
    'سبز سدری' => 'darkolivegreen',
    'سبز زیتونی' => 'darkseagreen',
    'آبی کمرنگ' => 'paleturquoise',
    'نقره‌ای مات' => 'darkgray',
    'زرد نخودی' => 'cornsilk',
    'خاکی روشن' => 'palegoldenrod',
    'ارغوانی' => 'magenta',
    'آبی ملوانی' => 'navyblue',
    'بنفش شاه‌توتی' => 'blueviolet',
    'قرمز آجری' => 'brick',
    'سبز لجنی' => 'darkkhaki',
    'آبی دریایی' => 'lightseagreen',
    'لیمویی روشن' => 'lightgoldenrodyellow',
    'آبی تند' => 'deepskyblue',
    'زرد چمنی' => 'lightgoldenrod',
    'صورتی چرک' => 'palevioletred',
    'آبی درباری' => 'dodgerblue',
    'سبز مایل به آبی' => 'darkcyan',
    'آبی سیر' => 'deepblue',
    'زرد کاهی' => 'moccasin',
    'بژ' => 'beige',
    'آبی کبریتی' => 'powderblue',
    'سبز مغزپسته‌ای' => 'palegreen',
    'آبی سربی' => 'slateblue',
    'سرخ آبی' => 'slategray',
    'سبز زرد' => 'yellowgreen',
    'سبز چمنی' => 'forestgreen',
    'آبی درخشان' => 'lightcyan',
    'زرشکی روشن' => 'lightcoral',
    'کرم خاکی' => 'wheat',
    'خرمایی روشن' => 'peru',
    'طلایی مات' => 'darkgoldenrod',
    'سبز سدری روشن' => 'palegreen',
    'نارنجی چرک' => 'sandybrown',
    'طلایی روشن' => 'goldenrod',
    'گندمی' => 'tan',
    'آبی کدر' => 'steelblue',
    'سبز زمردی' => 'emerald',
    'قرمز گوجه‌ای' => 'tomato',
    'بنفش ملایم' => 'mediumorchid',
    'صورتی چرکی' => 'mediumvioletred',
    'آبی فیروزه‌ای' => 'mediumturquoise',
    'زرشکی تیره' => 'darkred',
    'صورتی شاد' => 'mediumviolet',
    'سبز مرجانی' => 'lightgreen',
    'صورتی مات' => 'mistyrose',
    'کاهی روشن' => 'linen',
    'نیلی کمرنگ' => 'plum',
    'قهوه‌ای بژ' => 'sienna',
    'بنفش دودی' => 'slateblue',
    'سبز روشن مات' => 'springgreen',
    'نارنجی قرمز' => 'orangered',
    'سبز پررنگ' => 'darkgreen',
    'آبی دریاچه‌ای' => 'darkturquoise',
    'نقره‌ای مات' => 'darkslategray',
    'طلایی پررنگ' => 'darkgoldenrod',
    'گندمی' => 'burlywood',
    'نارنجی ملایم' => 'bisque',
    'زرد کم‌رنگ' => 'lemonchiffon',
    'آبی سنگی' => 'lightslategray',
    'آبی مهتابی' => 'lightsteelblue',
    'یاسی کم‌رنگ' => 'lightpurple',
    'خاکی ملایم' => 'moccasin',
    'آبی نیلی' => 'darkorchid',
    'قرمز مات' => 'indianred',
    'قهوه‌ای سوخته' => 'rosybrown',
    'نارنجی سوخته' => 'darkorange',
    'آبی آرام' => 'skyblue',
    'سبز تازه' => 'lawngreen',
    'بنفش شاه بلوطی' => 'orchid',
    'صورتی کمرنگ' => 'lightcoral',
    'نیلی آبی' => 'mediumslateblue',
    'سبز ملایم' => 'palegreen',
    'نارنجی روشن' => 'papayawhip',
    'سبز پسته‌ای' => 'seagreen',
    'کاهویی روشن' => 'greenyellow',
    'خاکستری' => 'gray',
    'آبی شفاف' => 'powderblue',
];

@endphp
<section class="inner-page" id="product-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>{{$product->name}}</h1>
                            <p>مرکز خرید روبیک مارکت</p>

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
                        <div class="col-12 col-lg-5 px-lg-0">
                            <div class="swiper-container gallery-top">
                                <!-- Additional required wrapper -->
                                <ul class="swiper-wrapper">
                                    <!-- Slides -->
                                     @foreach ($product->gallery()->get() as $item)

                                     <li id="1" class="swiper-slide">
                                         <a href="assets/images/products/p100.png" itemprop="contentUrl" data-size="900x710">
                                             <img src="{{$item->image}}" itemprop="thumbnail" alt="گوشی موبایل سامسونگ مدل Galaxy A21s" />
                                         </a>
                                     </li>
                                     @endforeach

                                    <!-- /Slides -->
                                </ul>
                                <!-- If we need navigation buttons -->
                                <div title="قبلی" class="swiper-button-prev swiper-button-white"></div>
                                <div title="بعدی" class="swiper-button-next swiper-button-white"></div>
                            </div>

                            <!-- Swiper -->
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                @foreach ($product->gallery()->get() as $item)
                                    <div class="swiper-slide" style="background-image:url('{{$item->image}}')"></div>
                                @endforeach
                                    <!-- <div class="swiper-slide" style="background-image:url('assets/images/products/p101.png')"></div>
                                    <div class="swiper-slide" style="background-image:url('assets/images/products/p102.png')"></div>
                                    <div class="swiper-slide" style="background-image:url('assets/images/products/p103.png')"></div> -->
                                </div>
                            </div>

                            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="pswp__bg"></div>
                                <div class="pswp__scroll-wrap">
                                    <div class="pswp__container">
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                    </div>
                                    <div class="pswp__ui pswp__ui--hidden">
                                        <div class="pswp__top-bar">
                                            <div class="pswp__counter"></div>
                                            <button class="pswp__button pswp__button--close" title="بستن (Esc)"></button>
                                            <button class="pswp__button pswp__button--fs" title="تمام صفحه"></button>
                                            <button class="pswp__button pswp__button--zoom" title="بزرگنمایی"></button>
                                            <div class="pswp__preloader">
                                                <div class="pswp__preloader__icn">
                                                    <div class="pswp__preloader__cut">
                                                        <div class="pswp__preloader__donut"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="pswp__button pswp__button--arrow--left" title="قبلی"></button>
                                        <button class="pswp__button pswp__button--arrow--right" title="بعدی"></button>
                                        <div class="pswp__caption">
                                            <div class="pswp__caption__center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 mt-5 mt-lg-0 pl-lg-0" id="product-intro">

                                <h1>{{$product->name}}</h1>

                            <div class="stars-container">
                                @for ( $i=0; $i < $product->stars; $i++ )
                                <i class="fa fa-star"></i>

                                @endfor
                                <!-- <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i> -->
                                <a href="#tabs-panel"><span>(نقد و بررسی)</span></a>
                            </div>
                            <div class="encode4365gbf265g43d-container py-2">
                                <span class="pre-encode4365gbf265g43d">{{$product->price}}</span>
                                <span class="encode4365gbf265g43d">{{$product->price * (100-$product->discust)/100}} <span>تومان</span></span>
                                <div class="badge badge-danger font-weight-light m-1 py-1 px-2">10%</div>
                            </div>
                            <p>{!! nl2br(e($product->discription)) !!}</p>
                            <hr>
                            <div class="variables">
                                <div class="title">گزینه های موجود:</div>
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <div class="variable">
                                            <div class="sub-title pt-2 pb-3">رنگ</div>
                                            @foreach ($product->attribute()->where('name','رنگ')->get() as $attribute)
                                            <span onclick="let c = document.querySelector('#color').value ='{{$attribute->pivot->value->value}}'" class="color-variable"><a style="background-color:{{$colorMap[$attribute->pivot->value->value]}};"  ></a></span>

                                            @endforeach
                                            <!-- <span class="color-variable"><a href="#" class="yellow"></a></span>
                                            <span class="color-variable"><a href="#" class="blue"></a></span>
                                            <span class="color-variable"><a href="#" class="black"></a></span> -->
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <div class="variable">
                                            <div class="sub-title pt-2 pb-2">گارانتی </div>
                                            <option class="mt-2">{{$product->garant}}</option>
                                            <!-- <select name="" class="form-select">
                                                <option value="">بدون گارانتی</option>
                                                <option value="">گارانتی 6 ماهه</option>
                                                <option value="">گارانت 12 ماهه</option>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-3">
                                    @if ($quantity< $product->count)
                                        <div class="variable">
                                            <div class="sub-title pt-2 pb-2 ">تعداد</div>
                                            <div class="d-flex" >
                                            <button type="button" class="form-control" onclick="decreaseValue()">-</button>
                                            <input type="number" id="quantity" min="1" max="{{$product->count}}" class="form-control bnb" value="1">
                                            <button type="button" class="form-control" onclick="increaseValue()">+</button></div>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <form id="formlike{{$product->id}}" action="{{route('like_post')}}" method="post">@csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            </form>
                            <form id="formdislike{{$product->id}}" action="{{route('dislike_post' )}}" method="post">@csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            </form>
                            <div class="cta-container pt-3 pt-md-5">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{route('add_to_card',[$product->id])}}" method="post" id="cart" >
                                        <input type="hidden" name="quantity" id="quantityy" min="1" max="{{$product->count}}" value="1" >
                                        <input type="hidden" name="color" id="color"  value="unimportant" >
                                             @csrf
                                        </form>
                                        <!-- <a href="cart.html"> -->

                                            @if ($quantity< $product->count)

                                            <div onclick="let formcartadd = document.querySelector('#cart').submit()" class="btn btn-success px-4 px-lg-2 px-xl-4 btn-add-to-basket"><i class="fa fa-shopping-cart"></i> افزودن به سبد خرید</div>
                                            @else
                                            <div  class="btn btn-danger px-4 px-lg-2 px-xl-4 btn-add-to-basket "> محصول موجود نیست</div>

                                            @endif
                                        <!-- </a> -->
                                        <br class="d-sm-none">


                                        @guest
                                        <div onclick="let cdsdsn = document.querySelector('#formlike{{$product->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                                        @else
                                        @if (Auth::user()->favorite()->where('product_id',$product->id)->get()->first())
                                            <div style="background-image: url('assets/images/icons/favorited.png'); background-repeat:no-repeat;  background-position:center;" onclick="let dsdn = document.querySelector('#formdislike{{$product->id}}').submit()" class="btn btn-outline-secondary "></div>
                                        @else
                                        <div onclick="let cdssn = document.querySelector('#formlike{{$product->id}}').submit()" class="btn btn-outline-secondary encode43243d"></div>
                                        @endif
                                        @endif
                                        <!-- <a href="#"><div class="btn btn-outline-secondary encode43bf243d mt-1 mt-sm-0" data-toggle="tooltip" data-placement="top" title="مقایسه"></div></a> -->
                                    </div>
                                </div>
                            </div>
                            <!-- Share Links -->
                            <div class="pt-5" id="share-links">
                                <span>اشتراک گذاری: </span>
                                <!-- <a href="#" target="_blank"><span class="share-link"><img src="assets/images/social/insta.png" alt="اینستاگرام" width="18px"></span></a> -->
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text=این+محصول+را+ببینید!" target="_blank"><span class="share-link"><img src="assets/images/social/twitter.png" alt="توئیتر" height="25px"> </span></a>
                                                <a href="https://t.me/share/url?url={{ urlencode(Request::fullUrl()) }}&text=این+محصول+را+ببینید!" target="_blank"><span class="share-link"><img style="width: 2% !important;" src="assets/images/social/telgrampng.parspng.com_.png" alt="فیس بوک" height="25px"></span></a>
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::fullUrl()) }}&title={{$product->name}}&summary={{$product->discription}}" target="_blank"><span class="share-link"><img src="assets/images/social/linkedin.png" alt="لینکدین" height="25px"> </span></a>
                            </div>
                            <!-- Share Links -->
                        </div>

                        <!-- Nav Tabs -->
                            <div class="col-12">
                                <div id="product-nav-tabs">
                                    <div class="row pt-3 px-md-3">
                                        <div class="col-12">
                                            <div id="tabs-panel">
                                                <button class="tab-item tablink px-3 bmv selected" onclick="openTab(event,'html-tab')">نقد و بررسی</button>
                                                <button class="tab-item tablink px-3" onclick="openTab(event,'details-tab')">جدول مشخصات</button>
                                                <button class="tab-item tablink px-3 bvb" onclick="openTab(event,'comments-tab')">دیدگاه کاربران @if ($product->comment->count())

                                                ({{$product->comment->count()}})
                                                @endif
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 pt-2 px-0 px-lg-0">
                                                <!-- HTML Tab -->
                                                <div id="html-tab" class="tabs-container text-justify p-0 p-md-3 nhhn">
                                                    <p>{!! nl2br(e($product->Criticism)) !!}</p>
                                                </div>
                                                <!-- /HTML Tab -->

                                                <!-- Details Tab -->
                                                <div id="details-tab" class="tabs-container px-0 px-md-3 pb-0 pb-md-3" style="display:none">
                                                    <!-- Detail Section -->
                                                    <div class="row">
                                                        <div class="col-12 my-2">
                                                            <span class="detail-title"><i class="fa fa-chevron-left small"></i> مشخصات کلی</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-12 col-md-3 font-weight-bold"><div class="bg-light p-2">طول</div></div>
                                                        <div class="col-12 col-md-9 pr-md-0"><div class="bg-light p-2">{{$product->with}} سانتی متر</div></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-12 col-md-3 font-weight-bold"><div class="bg-light p-2">عرض</div></div>
                                                        <div class="col-12 col-md-9 pr-md-0"><div class="bg-light p-2">{{$product->length}} سانتی متر</div></div>
                                                    </div>
                                                    <!-- <div class="row mb-2">
                                                        <div class="col-12 col-md-3 font-weight-bold"><div class="bg-light p-2">ارتفاع</div></div>
                                                        <div class="col-12 col-md-9 pr-md-0"><div class="bg-light p-2"> سانتی متر</div></div>
                                                    </div> -->
                                                    <!-- /Detail Section -->
                                                    <!-- Detail Section -->

                                                    <div>
                                                        <div class="row">
                                                            <div class="col-12 my-2">
                                                                <span class="detail-title"><i class="fa fa-chevron-left small"></i> مشخصات جزئی</span>
                                                            </div>
                                                        </div>
                                                        @foreach ($product->attribute()->where('name', '!=', 'رنگ')->get() as $attribute)
                                                    <div class="row mb-2">
                                                        <div class="col-12 col-md-3 font-weight-bold"><div class="bg-light p-2">{{$attribute->name}}</div></div>
                                                        <div class="col-12 col-md-9 pr-md-0"><div class="bg-light p-2">
                                                            <!-- @foreach ($attribute->pivot as $value)
                                                                <span>{{$value}}</span>
                                                            @endforeach -->
                                                            <span>{{$attribute->pivot->value->value }}</span>

                                                        </div></div>
                                                    </div>
                                                    @endforeach
                                                    <!-- <div class="row mb-2">
                                                        <div class="col-12 col-md-3 font-weight-bold"><div class="bg-light p-2">صفحه نمایش لمسی</div></div>
                                                        <div class="col-12 col-md-9 pr-md-0"><div class="bg-light p-2">بله</div></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-12 col-md-3 font-weight-bold"><div class="bg-light p-2">بازه‌ی اندازه صفحه نمایش</div></div>
                                                        <div class="col-12 col-md-9 pr-md-0"><div class="bg-light p-2">6.0 اینچ و بزرگتر</div></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-12 col-md-3 font-weight-bold"><div class="bg-light p-2">نسبت صفحه‌نمایش به بدنه</div></div>
                                                        <div class="col-12 col-md-9 pr-md-0"><div class="bg-light p-2">87.4 درصد</div></div>
                                                    </div> -->
                                                    </div>
                                                </div>
                                                <!-- /Details Tab -->

                                                <!-- Comments Tab -->
                                                <div id="comments-tab" class="tabs-container px-0 px-md-3 pb-0 pb-md-2 bbbb" style="display:none">
                                                    <div class="row">
                                                        <div class="col-12 text-justify" id="comments">
                                                            @foreach ($comments as $r)
                                                        <div class="comments-container">
                                                                <div class="container px-0">
                                                                    <div class="row">
                                                                        <div class="col-12 pt-2">
                                                                            <!-- Show Comments -->
                                                                            <div class="comment p-3 my-2">
                                                                                <div class="sender-details">
                                                                                    <div class="row">
                                                                                        <div class="col-3 col-sm-2 col-md-1 pl-md-0 pl-lg-2 pl-xl-3">
                                                                                        @if ($r->user->image)

                                                                                        <img src="/storage/{{$r->user->image}}" class="rounded" alt="g">
                                                                                        @else

                                                                                        <img src="assets/images/user-no-image.jpg" alt="image" class="rounded">
                                                                                        @endif
                                                                                        </div>
                                                                                        <div class="col-9 col-sm-10 col-md-11 pr-0 pr-md-2 pr-xl-0 pt-0 pt-lg-1">
                                                                                            <div class="name">{{$r->user->name}}</div>
                                                                                            <div class="date">ارسال شده در {{jdate($r->failed_at)->ago()}}</div>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <p>{{$r->content}}</p>
                                                                                            <!-- <form action="">
                                                                                            <input type="hidden" name="p" value="{{$r->id}}">
                                                                                             <button style="background-color: inherit !important; border:0;" class="reply bb nn" type="submit">ارسال پاسخ<img class="ml-5" src="assets/images/comment-reply.png" id="{{$r->id}}" alt="image"></button>
                                                                                             <span class="reply bb" id="{{$r->id}}"> ارسال پاسخ</span>
                                                                                        </form> -->
                                                                                            <span class="reply" onclick="let parent_id = document.querySelector('.parent_id').value={{$r->id}};"><img src="assets/images/comment-reply.png" alt="image"> ارسال پاسخ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Comment Reply -->
                                                                                 @foreach ($r->child->where('status',1) as $child)
                                                                                <div class="row justify-content-end">
                                                                                    <div class="col-11 pt-2 pr-0">
                                                                                        <div class="comment p-3">
                                                                                            <div class="sender-details">
                                                                                                <div class="row">
                                                                                                    <div class="col-3 col-sm-2 col-md-1 pl-md-0 pl-lg-2 pl-xl-3">
                                                                                                    @if ($r->user->image)

                                                                                                    <img src="/storage/{{$child->user->image}}" class="rounded" alt="g">
                                                                                                    @else

                                                                                                    <img src="assets/images/user-no-image.jpg" alt="image" class="rounded">
                                                                                                    @endif
                                                                                                    </div>
                                                                                                    <div class="col-9 col-sm-10 col-md-11 pr-0 pr-md-2 pr-xl-0 pt-0 pt-lg-1">
                                                                                                        <div class="name">{{$child->user->name}}</div>
                                                                                                        <div class="date">ارسال شده در {{jdate($r->failed_at)->ago()}}</div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <p>{{$child->content}}</p>                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                 @endforeach

                                                                                <!-- /Comment Reply -->
                                                                            </div>
                                                                            <!-- /Show Comments -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @endforeach


                                                <!-- /Comments Tab -->
                                                                <!-- Send Comment Form -->

                                                                <div class="comments-container">
                                                                <div class="row pt-4">
                                                                    <div class="col-12"><h2>دیدگاه خود را ارسال کنید</h2></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 py-3">@guest

                                                                    <p>برای ارسال نظر باید وارد شوید</p>
                                                                    @else
                                                                        <form method="post" action="{{route('create_comment')}}">
                                                                            @csrf
                                                                            <input type="hidden" class="parent_id"  name="parent_id"id="">
                                                                            <input type="hidden" name="user_id" value="{{request()->user()->id }}">
                                                                            <input type="hidden" name="commenttable_id" value="{{$product->id}}">
                                                                            <input type="hidden" name="commenttable_type" value="{{get_class($product)}}">
                                                                            <div id="send-comment-form">



                                                                                <p>نظر خود را برای این مطلب ارسال کنید. نشانی ایمیل شما منتشر نخواهد شد.</p>
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="form-group my-1">
                                                                                            <textarea name="content" class="form-control" required oninvalid="this.setCustomValidity('لطفا نظر خود را وارد کنید')" oninput="setCustomValidity('')" rows="5" placeholder="متن دیدگاه"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group my-1">
                                                                                            <button type="submit" class="btn btn-success px-5">ارسال دیدگاه</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </form>
                                                                    </div>@endif
                                                                </div>
                                                            </div>

                                                            <!-- /Send Comment Form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    </div>
                        <!-- /Nav Tabs -->

                        <!-- Suggested Products -->
                        <div class="col-12 pt-5" id="suggested-products">
                            <div class="title py-3 text-center">محصولات مرتبط</div>
                            <div class="owl-carousel products-carousel">
                                <!-- Product Item -->
                                 @foreach ($category as $item)
                                    <div class="encode4326654321vfb item">
                                    <a href="{{route('product',['id'=>$item->id])}}"><div class="image" style="background-image: url({{$item->gallery()->first()->image}})"></div></a>
                                    <div class="details p-3">
                                        <div class="category">
                                            <a href="/products?search={{$item->category()->first()->name}}">{{$item->category()->first()->name}}</a>
                                            &nbsp;/&nbsp;
                                            <a href="/products?search={{$item->Brand}}">{{$item->Brand}}</a>
                                        </div>
                                        <a href="{{route('product',['id'=>$item->id])}}"><h2>{{$item->name}}</h2></a>
                                        <div class="encode4365gbf265g43d">{{$item->price}} تومان</div>
                                        <div class="rate">
                                        @for ( $i=0; $i < $item->stars; $i++ )
                                        <i class="fa fa-star"></i>

                                        @endfor


                                            <span class="encode43bf265g43d">@if($item->comment->count())( ({{$item->comment->count()}}) رای دهنده)@endif</span>
                                        </div>
                                    </div>
                                    </div>
                                @endforeach
                                <!-- /Product Item -->
                                <!-- Product Item -->

                                <!-- /Product Item -->
                            </div>
                        </div>
                        <!-- /Suggested Products -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<section class="pt-4 pb-3" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="title">دسترسی سریع</div>
                <ul>
                    <li><a href="blog.html">بلاگ آموزشی</a></li>
                    <li><a href={{route('faq')}}>راهنمای خرید</a></li>
                    <li><a href={{route('faq')}}>شیوه های پرداخت</a></li>
                    <!-- <li><a href={{route('contact')}}>پیگیری سفارش</a></li> -->
                    <li><a href={{route('faq')}}>سوالات متداول</a></li>
                    <li><a href={{route('about')}}>درباره ما</a></li>
                    <li><a href={{route('contact')}}>تماس با ما</a></li>
                </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="title">گروه های محصولات</div>
                <ul>

                    @foreach ($categorys as $cat)
                    <div class="form-group">
                    <form id="ssf{{$cat->id}}" action="{{route('products')}}" method="get">
                    <input type="hidden" name="search" value="{{$cat->name}}"></form>
                     <li onclick="let f = document.querySelector('#ssf{{$cat->id}}').submit()" class="fgf" >{{$cat->name}}</li>
                    @endforeach
                    <!-- <li><a href="products.html">گوشی موبایل</a></li>
                    <li><a href="products.html">جانبی موبایل</a></li>
                    <li><a href="products.html">ساعت هوشمند</a></li>
                    <li><a href="products.html">جانبی کامپیوتر</a></li>
                    <li><a href="products.html">دوربین</a></li>
                    <li><a href="products.html">لپ تاپ</a></li> -->
                </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-2 d-none d-sm-inline-block">
                <div class="title">ناحیه کاربری</div>
                <ul>
                    <li><a href="{{route('login')}}">ورود به سایت</a></li>
                    <li><a href="{{route('login')}}">عضویت در سایت</a></li>
                    <li><a href="{{route('cart')}}">سبد خرید</a></li>
                    <!-- <li><a href="checkout.html">پیش فاکتور</a></li> -->
                </ul>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <hr class="d-lg-none">
                <img src="assets/images/logo.png" alt="image"> روبیک مارکت
                <p>روبیک مارکت یک پلتفرم آنلاین است که انواع محصولات متنوع و باکیفیت را با قیمت‌های مناسب عرضه می‌کند. با تنوع بالا و ارسال سریع، تجربه‌ای آسان و مطمئن برای خرید آنلاین را به مشتریان ارائه می‌دهیم. هدف ما جلب رضایت مشتریان با ارائه محصولات برتر و خدمات پشتیبانی عالی است .روبیک مارکت به ارائه بهترین تجربه خرید برای کاربران و ارتقاء مهارت‌های ذهنی آن‌ها متعهد است.</p>
                <div class="row">
                    <div class="col-12 col-md-6 text-center p-2" id="encode43vfbb65gtabfb">
                        <div>7 روز هفته، 24 ساعت شبانه روز</div>
                        <div>پاسخگوی شما هستیم</div>
                        <div>09351234567</div>
                    </div>
                    <div class="col-12 col-md-6 pt-2 pt-md-0" id="encode43vfbbbfb">
                        <div class="row">
                            <div class="col-4 text-center">
                                <!-- <a href="#"><img src="assets/images/encode43vfbbbfb/enamad.html" alt="image"></a> -->
                            </div>
                            <div class="col-4 text-center">
                                <!-- <a href="#"><img src="assets/images/encode43vfbbbfb/samandehi.html" alt="image"></a> -->
                            </div>
                            <div class="col-4 text-center">
                                <!-- <a href="#"><img src="assets/images/encode43vfbbbfb/etehadiye.html" alt="image"></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Footer -->

<!-- Copyright -->
<section class="py-2" id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6" id="social-links">
                <span>ما را دنبال کنید</span>
                <!-- <a href="#"><img src="assets/images/social/insta.png" alt="image"></a> -->
                <a href="#"><img src="assets/images/social/facebook.png" alt="image"></a>
                <a href="#"><img src="assets/images/social/linkedin.png" alt="image"></a>
                <a href="#"><img src="assets/images/social/twitter.png" alt="image"></a>
                <a href="#"><img src="assets/images/social/youtube.png" alt="image"></a>
            </div>
            <div class="col-12 col-sm-6 text-sm-end pt-2 pt-sm-0">
                <span>کلیه حقوق و مادی معنوی محفوط است.</span>
            </div>
        </div>
    </div>
</section>
<!-- Copyright -->

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/fontawesome/js/all.min.js"></script>
<script src="assets/plugins/aos-master/dist/aos.js"></script>
<script src="assets/js/droopmenu.js"></script>
<script src="assets/js/nouislider.min.js"></script>
<script src="assets/js/pagination.js"></script>

<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/nav-tabs.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="../cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js"></script>
<script src="../cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js"></script>
<script src="assets/js/product-gallery.js"></script>
@if (request()->p)
        <script>
            let nvn =document.querySelector('.nhhn')
            let bbbb = document.querySelector('.bbbb')
            let bmv =document.querySelector('.bmv')
            let nbn = document.querySelector('.bvb')
            nbn.setAttribute('class', 'tab-item tablink px-3 selected')
            bmv.className = 'tab-item tablink px-3'
            bbbb.setAttribute('style','display:block')
            nvn.setAttribute('style','display:none')
            window.scrollTo(0,1850)
        </script>
@endif
<script src="assets/js/scripts.js"></script>
<script>
    let bb =document.querySelector('.bb')
    let parentid =document.querySelector('.parent_id')

    bb.addEventListener('click' , function () {
        console.log(bb);

        parentid.value = 12
        // console.log(parentid.value);

    })

</script>
<script>
function increaseValue() {
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 1 : value;
    if (value < {{$product->count}}) {
        value++;
        document.getElementById('quantity').value = value;
        document.getElementById('quantityy').value = value;
    }
}

function decreaseValue() {
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 1 : value;
    value = value > 1 ? value - 1 : 1;
    document.getElementById('quantity').value = value;
    document.getElementById('quantityy').value = value;
}
</script>
@include('sweetalert::alert')
<!-- /Scripts -->
</body>

<!-- Mirrored from rubik-market-html.wbrk.ir/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Aug 2023 06:32:55 GMT -->
</html>
