@extends('base')
@section('content')

<section class="inner-page blog-inner-page" id="blog-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>آموزش نصب قالب وردپرسی روبیک مارکت</h1>
                            <!-- <p>در این آموزش یاد میگیرید که چگونه قالب وردپرسی روبیک مارکت را نصب کنید.</p> -->
                            <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>
                                    <li class="breadcrumb-item"><a href="blog.html">بلاگ آموزشی</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">آموزش وردپرس</li>
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
                                        <div class="row pt-2 px-3" id="post-title">
                                            <div class="col-12 col-md-8">
                                                <h1>{{$blog->title}}</h1>
                                            </div>
                                            <div class="col-12 col-md-4 text-start text-md-end"><span class="date">ارسال شده {{jdate($blog->failed_at)->format('%B %d، %Y')}}</span></div>
                                        </div>
                                        <hr>
                                        <div class="row py-0 px-3" id="post-details">
                                            <div class="col-8">
                                                <!-- <span>دسته بندی: <a href="blog.html">آموزش وردپرس</a></span> -->
                                            </div>
                                            <div class="col-4 text-end"><span>{{$blog->count_view}} بازدید | {{$blog->comment->count()}} نظر</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 pt-2 text-justify" id="post-html">
                                                <div class="text-center pt-2 pb-3"><img src="{{$blog->image}}" alt="آموزش نصب قالب وردپرسی روبیک مارکت"></div>
                                                <p>{!! nl2br(e($blog->content)) !!}</p>
                                                <!-- <p>این یک متن آزمایشی است که به زودی توسط نویسنده این سایت، تکمیل یا حذف خواهد شد. اگر شما نویسنده‌ی این سایت هستید، برای حذف یا ویرایش این صفحه، کافی است از طریق مرکز مدیریت سایت خود وارد بخش مربوطه شده و محتوای این صفحه را ویرایش یا حذف کنید.</p>
                                                <p>صفحات و محتوای آزمایشی همیشه بخشی از محتوای پیش‌نمایش قالب و افزونه های وب هستند که شما بتوانید ارتباط درستی با پیش نمایش قالب گرفته و تصمیم مناسبی بگیرید. این صفحات معمولا برای اطلاعات کلی در مورد سایت مثل «درباره ما»، «تماس با ما»، «فهرست» یا «نظرات شما» مفید هستند.</p>
                                                <p>بنابراین نگران ویرایش و بروزرسانی محتوای این نوع صفحات نباشید. شما می‌توانید به سادگی و تنها با چند کلیک وارد ناحیه مدیریت وب‌سایت خود شده و مطلب مربوطه را ویرایش کنید.</p>
                                                <p>این یک متن آزمایشی است که به زودی توسط نویسنده این سایت، تکمیل یا حذف خواهد شد. اگر شما نویسنده‌ی این سایت هستید، برای حذف یا ویرایش این صفحه، کافی است از طریق مرکز مدیریت سایت خود وارد بخش مربوطه شده و محتوای این صفحه را ویرایش یا حذف کنید. بنابراین نگران ویرایش و بروزرسانی محتوای این نوع صفحات نباشید. شما می‌توانید به سادگی و تنها با چند کلیک وارد ناحیه مدیریت وب‌سایت خود شده و مطلب مربوطه را ویرایش کنید.</p>
                                                <p>این یک متن آزمایشی است که به زودی توسط نویسنده این سایت، تکمیل یا حذف خواهد شد. اگر شما نویسنده‌ی این سایت هستید، برای حذف یا ویرایش این صفحه، کافی است از طریق مرکز مدیریت سایت خود وارد بخش مربوطه شده و محتوای این صفحه را ویرایش یا حذف کنید.</p> -->
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                                <div id="keywords">
                                                    <span>دسته بندی ها:</span>
                                                    @foreach ($blog->category()->get() as $category)
                                                        <!-- <form id="xx{{$category->name}}" action="{{route('products')}}" method="get"> <input type="hidden" name="search" value="{{$category->name}}"></form> -->
                                                        <!-- <a onclick="let cc = document.querySelector('#xx{{$category->name}}').submit()" ><span class="keyword">{{$category->name}}</span></a> -->
                                                        <a href="{{route('blog_category',['category'=>$category->name])}}" ><span class="keyword">{{$category->name}}</span></a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pt-3 pb-4 pb-lg-0">
                                            <div class="col-12" id="share-links">
                                                <span>به اشتراک بگذارید در:</span><br class="d-md-none">
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text=این+مقاله+را+ببینید!" target="_blank"><span class="share-link"><img src="assets/images/social/twitter.png" alt="توئیتر" height="25px"> توئیتر</span></a>
                                                <a href="https://t.me/share/url?url={{ urlencode(Request::fullUrl()) }}&text=این+مقاله+را+ببینید!" target="_blank"><span class="share-link"><img style="width: 2% !important;" src="assets/images/social/telgrampng.parspng.com_.png" alt="فیس بوک" height="25px">تلگرام</span></a>
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::fullUrl()) }}&title=عنوان+مقاله&summary=خلاصه+مقاله" target="_blank"><span class="share-link"><img src="assets/images/social/linkedin.png" alt="لینکدین" height="25px"> لینکدین</span></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- Comments -->
                                        <div class="row pt-3 pb-4 pb-lg-0">
                                            <div class="col-12 text-justify" id="comments">
                                                <h2>نظرات کاربران</h2>
                                                <div class="comments-container">
                                                    <div class="container px-0">
                                                        <div class="row">
                                                            <div class="col-12 pt-2">
                                                                <!-- Show Comments -->

                                                                 <!-- {{$comments}} -->

                                                                 @if (!$comments->first())
                                                                     <p>اولین نفری باشید که نظری ارسال میکنید</p>

                                                                 @endif
                                                                @foreach ($comments as $comment)
                                                                <div class="comment p-3 my-2">
                                                                    <div class="sender-details">
                                                                        <div class="row">
                                                                            <div class="col-3 col-sm-2 col-md-1 pl-md-0 pl-lg-2 pl-xl-3">
                                                                                <img oncontextmenu="function d (event){ event.preventDefault()}" style="pointer-events: none;"  src="{{$comment->user->image}}" alt="image" class="rounded">
                                                                            </div>
                                                                            <div class="col-9 col-sm-10 col-md-11 pr-0 pr-md-2 pr-xl-0 pt-0 pt-lg-1">
                                                                                <div class="name">{{$comment->user->name}}</div>
                                                                                <div class="date">ارسال شده در {{jdate($comment->failed_at)->ago()}}</div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <p>{{$comment->content}}</p>
                                                                                <span onclick="let parent_id = document.querySelector('.parent_id').value={{$comment->id}};" class="reply"><img  src="assets/images/comment-reply.png" alt="image"> ارسال پاسخ</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <script>
                                                                        let t =document.querySelector('.rounded')
                                                                    t.addEventListener('contextmenu', event => event.preventDefault());</script>
                                                                    <!-- Comment Reply -->
                                                                    @foreach ($comment->child->where('status',1) as $child )


                                                                    <div class="row justify-content-end">
                                                                        <div class="col-11 pt-2 pr-0">
                                                                            <div class="comment p-3">
                                                                                <div class="sender-details">
                                                                                    <div class="row">
                                                                                        <div class="col-3 col-sm-2 col-md-1 pl-md-0 pl-lg-2 pl-xl-3">
                                                                                            <img src="{{$child->user->image}}" alt="image" class="rounded">
                                                                                        </div>
                                                                                        <div class="col-9 col-sm-10 col-md-11 pr-0 pr-md-2 pr-xl-0 pt-0 pt-lg-1">
                                                                                            <div class="name">{{$child->user->name}}</div>
                                                                                            <div class="date">ارسال شده در {{jdate($child->failed_at)->ago()}}</div>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <p>{{$child->content}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   @endforeach
                                                                    <!-- /Comment Reply -->
                                                                </div>

                                                                @endforeach
                                                                <!-- /Show Comments -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Send Comment Form -->
                                                <div class="comments-container">
                                                    <div class="row pt-4">
                                                        <div class="col-12"><h2>دیدگاه خود را ارسال کنید</h2></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 py-3">
                                                            <form method="post" action="{{route('create_comment')}}" >
                                                                @csrf
                                                                <div id="send-comment-form">
                                                                    <p>نظر خود را برای این مطلب ارسال کنید. نشانی ایمیل شما منتشر نخواهد شد.</p>
                                                                    <div class="row">
                                                                    <input type="hidden" class="parent_id"  name="parent_id" value="0"  id="">
                                                                    <input type="hidden" name="user_id" value="{{request()->user()->id}}">
                                                                    <input type="hidden" name="commenttable_id" value="{{$blog->id}}">
                                                                    <input type="hidden" name="commenttable_type" value="{{get_class($blog)}}">
                                                                    <div class="col-12 px-3">
                                                                        <div class="form-group my-1">
                                                                            <textarea name="content" class="form-control" id="" rows="4" placeholder="متن دیدگاه"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group my-1">
                                                                            <button type="submit" value="ارسال دیدگاه" class="btn btn-success px-5">ارسال دیدگاه</button>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Send Comment Form -->
                                            </div>
                                        </div>
                                        <!-- /Comments -->
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
<script>

</script>




@endsection
