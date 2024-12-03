@extends('base')
@section('content')
<style>
    .about-button{
        background-color: black !important;
        padding: 0.75rem 1rem !important;
        margin-right: 0.2rem !important;
        border-radius: 0.5rem !important;;
        color: white !important;
    }
    .about-button:hover{
        background-color: white !important;
        color: black !important;
    }


</style>
<section class="inner-page" id="contact-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>درباره ما</h1>
                            <p>با ما بیشتر آشنا شوید.</p>
                            <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">درباره ما</li>
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
                        <div class="col-12 col-lg-7">
                            <div class="title">معرفی فروشگاه</div>
                            <p>این یک متن آزمایشی است که به زودی توسط نویسنده این سایت، تکمیل یا حذف خواهد شد. اگر شما نویسنده‌ی این سایت هستید، برای حذف یا ویرایش این صفحه، کافی است از طریق مرکز مدیریت سایت خود وارد بخش مربوطه شده و محتوای این صفحه را ویرایش یا حذف کنید.</p>
                            <p>صفحات و محتوای آزمایشی همیشه بخشی از محتوای پیش‌نمایش قالب و افزونه های وب هستند که شما بتوانید ارتباط درستی با پیش نمایش قالب گرفته و تصمیم مناسبی بگیرید. این صفحات معمولا برای اطلاعات کلی در مورد سایت مثل «درباره ما»، «تماس با ما»، «فهرست» یا «نظرات شما» مفید هستند.</p>
                            <p>بنابراین نگران ویرایش و بروزرسانی محتوای این نوع صفحات نباشید. شما می‌توانید به سادگی و تنها با چند کلیک وارد ناحیه مدیریت وب‌سایت خود شده و مطلب مربوطه را ویرایش کنید.<br>
                            این یک متن آزمایشی است که به زودی توسط نویسنده این سایت، تکمیل یا حذف خواهد شد. اگر شما نویسنده‌ی این سایت هستید، برای حذف یا ویرایش این صفحه، کافی است از طریق مرکز مدیریت سایت خود وارد بخش مربوطه شده و محتوای این صفحه را ویرایش یا حذف کنید.</p>
                        </div>
                        <div class="col-12 col-lg-5 align-self-center h-100">
                            <img src="assets/images/about-us.jpg" alt="">
                        </div>
                    </div>
                    <!-- Team -->

                    <!-- Team -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- <section class="inner-page" id="contact-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>درباره ما</h1>
                            <p>با ما بیشتر آشنا شوید.</p> -->
                            <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('index')}}">صفحه نخست</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">درباره ما</li>
                                </ol>
                            </nav> -->
                        <!-- </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br>
    <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6"> -->
                        <!--About Image-->
                        <!-- <div class="about-img">
                            <img  src="assets/images/Untitled.jpg" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6"> -->
                        <!--About Content-->
                        <!-- <div class="about-content mt-5">
                            <div class="about-heading">
                                <h2>درباره من</h2>
                                <h5>محمد جواد سردار</h5>
                            </div>
                            <p>برنامه‌نویس فریلنسر Back-End با تجربه چندین ساله در توسعه و پیاده‌سازی راهکارهای نرم‌افزاری با استفاده از زبان‌های برنامه‌نویسی مانند Python و php. مهارت در طراحی و بهینه‌سازی پایگاه‌های داده، ایجاد RESTful APIs و کار با فریم‌ورک‌های مختلف مانند لاراول و جنگو. توانایی کار در تیم‌های چندرشته‌ای و ارتباط موثر با سایر بخش‌ها. علاقه‌مند به مواجهه با چالش‌های جدید و به‌روز ماندن با تکنولوژی‌های نوین جهت ارائه راه‌حل‌های کارآمد و مقیاس‌پذیر.</p>
                            <p>متعهد به ارائه راه‌حل‌های باکیفیت و کارآمد با تمرکز بر نیازها و اهداف کارفرما. تجربه در توسعه سایت‌های فروشگاهی و مدیریت محتوای آنلاین با تمرکز بر عملکرد بالا و بهینه‌سازی تجربه کاربری. توانمند در انجام پروژه‌ها به صورت مستقل و همچنین در محیط‌های فریلنسری با هدف تحویل به‌موقع و ارائه نتایج مطلوب برای مشتریان</p> -->
                            <!--About Social Icons-->
                            <!-- <div class="social-icons">
                                <a class="ico" target="_blank" href="https://www.instagram.com/sardar.devloper"  ><i class="ico fab fa-instagram"></i></a>
                                <a class="ico" target="_blank" href="https://www.linkedin.com/in/mohammadjavad-sardar-48044a308"><i class="ico fab fa-linkedin"></i></a>
                                <a class="ico" target="_blank" href="https://t.me/Sardar_backend"><i class="ico fab fa-telegram"></i></a>
                                <a class="ico" target="_blank" href="https://github.com/Sardar-backend"><i class="ico fab fa-github"></i></a>


                            </div><br><br>
                            <span class="about-button">
                                <a style="color: inherit;" class="main-btn" href="{{route('download')}}">دانلود رزومه</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div><br><br>


</section> -->
