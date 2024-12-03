<!DOCTYPE html>
<html lang="fa" dir="rtl">

<!-- Mirrored from rubik-market-html.wbrk.ir/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Aug 2023 06:32:39 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <title>قالب فروشگاهی روبیک مارکت</title> -->

     {!! SEO::generate() !!}
    <!-- CSS Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/aos-master/dist/aos.css">
    <link rel="stylesheet" href="assets/plugins/hover-master/css/hover-min.css">
    <link rel="stylesheet" href="assets/css/ionicons.css">
    <link rel="stylesheet" href="assets/css/droopmenu.css">
    <link rel="stylesheet" href="assets/css/highlight.css">
    <link rel="stylesheet" href="assets/css/nouislider.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="/assets/images/logo.png" type="image/png">

    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/aos-master/dist/aos.css">
    <link rel="stylesheet" href="assets/plugins/hover-master/css/hover-min.css">
    <link rel="stylesheet" href="assets/css/ionicons.css">
    <link rel="stylesheet" href="assets/css/droopmenu.css">
    <link rel="stylesheet" href="assets/css/highlight.css">
    <link rel="stylesheet" href="assets/css/nouislider.min.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/error-404.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <!-- /CSS Styles -->
    <link rel="stylesheet" href="assets/css/error-404.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .but_s{
            background: inherit !important;
            border: 0;
        }
        @media(max-width:768){
            .but_s{
                height:1px !important;
                width: 1px !important;
            }

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
            box-shadow: 25px 25px 15px #8A8A8A;
            border-radius: 2px !important;
        }
        .oi{
            font-size: smaller !important;
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
                    <!-- <span>این سایت یک نمونه کار است و کارکرد تجاری ندارد</span> -->
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
                        @if (Auth::user()->name)

                        <div class="col-12 col-md-7 col-lg-6 text-center" id="btn-login-register">
                            <a href="">{{Auth::user()->name}}</a>
                        </div>
                        @else
                        <div class="col-12 col-md-7 col-lg-6 text-center" id="btn-login-register">
                            <a href="">{{Auth::user()->phonenumber }}</a>
                        </div>

                        @endif
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

                                                        @foreach ($categorys as $category )

                                                        <div class="droopmenu-tabsection" id="droopmenutab11">
                                                            <a class="droopmenu-tabheader" href="products?search=">{{$category->name}}</a>
                                                            <div class="droopmenu-tabcontent">
                                                                <div class="droopmenu-row">
                                                                    @foreach ($category->parentCategory as $categoryChild )

                                                                    <ul class="droopmenu-col droopmenu-col4">
                                                                        <li><h4>{{$categoryChild->name}}</h4></li>
                                                                        @foreach ($categoryChild->parentCategory as $item )

                                                                        <li><a href="Pro?search={{$item->name}}">{{$item->name}}</a></li>
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
                                                    <li><a href="checkout"">پیش فاکتور</a></li>

                                                </ul>
                                            </li>
                                            @auth
                                            <li class="droopmenu-parent" aria-haspopup="true">
                                                <a href={{route('personal')}} aria-expanded="false">پروفایل کاربری<em class="droopmenu-topanim"></em></a><div class="dm-arrow"></div>
                                                <ul style="">
                                                    <li><a href={{route('personal')}}>مشخصات کاربری</a></li>
                                                    <li><a href={{route('factors')}}>سفارشات</a></li>
                                                    <li><a href={{route('adresses')}}>آدرس ها</a></li>
                                                    <li><a href={{route('favorites')}}>علاقه مندی ها</a></li>
                                                </ul>
                                            </li>
                                            @endif
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













@yield('content')




















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
                <p>روبیک مارکت یک پلتفرم آنلاین است که انواع محصولات متنوع و باکیفیت را با قیمت‌های مناسب عرضه می‌کند. با تنوع بالا و ارسال سریع، تجربه‌ای آسان و مطمئن برای خرید آنلاین را به مشتریان ارائه می‌دهیم. هدف ما جلب رضایت مشتریان با ارائه محصولات برتر و خدمات پشتیبانی عالی است .روبیک مارکت به ارائه بهترین تجربه خرید برای کاربران و ارتقاء مهارت‌های ذهنی آن‌ها متعهد است این پلتفرم فعلا کارکرد تجاری ندارد.</p>
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
                <a href="#"><img src="assets/images/social/insta.png" alt="image"></a>
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
<!-- <script src="assets/js/pagination.js"></script> -->
<script src="assets/js/scripts.js"></script>
<script>let d =document.querySelectorAll('img');d.forEach(function (params) {params.addEventListener('contextmenu', event => event.preventDefault());});</script>
<!-- فقط برای سبد خرید  -->
<script src="assets/js/owl.carousel.min.js"></script>

<!-- فقط برای سبد خرید -->
<!-- <script src="assets/js/scripts.js"></script> -->
@include('sweetalert::alert')
@yield('Scripts')

<!-- /Scripts -->
</body>

<!-- Mirrored from rubik-market-html.wbrk.ir/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Aug 2023 06:32:42 GMT -->
</html>
