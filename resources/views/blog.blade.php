
@extends('base')
@section('content')
<section class="inner-page" id="blog-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>بلاگ</h1>
                            <p>بلاگ آموزشی روبیک مارکت</p>
                            <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">بلاگ آموزشی</li>
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="blog-container">
                                        <div class="row py-2 px-3">
                                            <div class="col"><h1 class="title">مرکز آموزش روبیک مارکت</h1></div>
                                        </div>
                                        <div class="container px-2 pb-3">
                                            <div class="row row-cols-1 row-cols-md-2">
                                                <!-- Blog Post -->
                                                 @foreach ($blogs as $blog)
                                                <div class="col">
                                                    <div class="encode43bdsf23da" data-aos="fade-up" data-aos-duration="1000">
                                                        <a href={{route('blog_single',$id=$blog->id)}}><div  class="post-image" style="background-image: url('{{$blog->image}}')"></div></a>
                                                        <div class="details py-3 px-4">
                                                            <div class="post-date">ارسال شده در {{jdate($blog->failed_at)->format('%B %d، %Y')}}</div>
                                                            <a href="{{route('blog_single',$id=$blog->id)}}">
                                                                <h2 class="post-title">{{$blog->title}}</h2>
                                                            </a>
                                                            <a href="{{route('blog_single',$id=$blog->id)}}">
                                                                <div class="encode43bbfb">{{substr(strip_tags($blog->content),0,462)}}...</div>
                                                            </a>
                                                            <div class="read-more"><a href="{{route('blog_single',$id=$blog->id)}}" class="hvr-icon-back">بیشتر خوانید <i class="fa fa-arrow-left hvr-icon"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 @endforeach

                                                <!-- Blog Post -->
                                                <!-- Blog Post -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="container">

                                <div class="row">
                                    <div class="col-12">
                                        <div id="pagination-bg">
                                            <ul class="pagination justify-content-center pagination-sm">
                                                <li class="page-item" id="previous-page"><a class="page-link" href="javascript:void(0)"><svg class="svg-inline--fa fa-angle-double-right fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-double-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z"></path></svg><!-- <i class="fas fa-angle-double-right"></i> Font Awesome fontawesome.com --></a></li>
                                                <!-- <li class="page-item current-page active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                                <li class="page-item current-page"><a class="page-link" href="javascript:void(0)">2</a></li>
                                                <li class="page-item current-page"><a class="page-link" href="javascript:void(0)">3</a></li>
                                                <li class="page-item current-page"><a class="page-link" href="javascript:void(0)">4</a></li>
                                                <li class="page-item" id="next-page"><a class="page-link" href="javascript:void(0)"><svg class="svg-inline--fa fa-angle-double-left fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-double-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M223.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L319.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L393.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34zm-192 34l136 136c9.4 9.4 24.6 9.4 33.9 0l22.6-22.6c9.4-9.4 9.4-24.6 0-33.9L127.9 256l96.4-96.4c9.4-9.4 9.4-24.6 0-33.9L201.7 103c-9.4-9.4-24.6-9.4-33.9 0l-136 136c-9.5 9.4-9.5 24.6-.1 34z"></path></svg><!-- <i class="fas fa-angle-double-left"></i> Font Awesome fontawesome.com --></a></li>
                                            <!-- </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                    <div class="cca card-footer d-flex">
                                        <div class="cca cart d-flex">
                                            {{$blogs->render()}}
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @include('layouts/last_blogs&products')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
