@extends('base')
@section('content')

<section class="inner-page" id="contact-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>تماس با ما</h1>
                            <p>با ما در ارتباط باشید.</p>
                            <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item active" aria-current="page">تماس با ما</li>
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
                <div class="content p-0 p-sm-3">
                    <div class="row">
                        <div class="col-12 col-lg-5 text-center" id="contact-page-info">
                            <div class="info">
                                <i class="fa fa-map-marked"></i>
                                <div class="title">آدرس فروشگاه:</div>
                                <!-- <div>ایران، تهران، جردن</div> -->
                            </div>
                            <div class="info">
                                <i class="fa fa-phone"></i>

                                <div class="title">تلفن تماس:</div>
                                <div>02112345678</div>
                                <div>09351234567</div>
                            </div>
                            <div class="info">
                                <i class="fa fa-envelope"></i>
                                <div class="title">پست الکترونیک:</div>
                                <div>email@website.com</div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 p-4"><form action="{{route('contact_post')}}" method="post">@csrf

                            <div class="title">ارسال پیام</div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else

                            <p>نظرات، پیشنهادات و انتقادات سازنده خود را از طریق فرم زیر با ما در میان بگذارید. ما در این فروشگاه اینترنتی همواره برای بهبود خدمات خود در تلاش هستیم.</p>
                            @endif

                            <div class="form-group">
                                <label for="name">نام شما :</label>
                                <input name="name"  type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="tel">تلفن تماس :</label>
                                <input name="number_phone" type="number" class="form-control" id="tel">
                            </div>
                            <div class="form-group">
                                <label for="email">پست الکترونیک :</label>
                                <input name="email" type="text" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="subject">موضوع پیام :</label>
                                <input name="subject" type="text" class="form-control" id="subject">
                            </div>
                            <div class="form-group">
                                <label for="message">متن پیام :</label>
                                <textarea name="content" class="form-control" id="message" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="ارسال پیام" class="btn btn-success">ارسال پیام</button>
                            </div>
                        </form></div>
                        <div class="col-12 mt-4 px-0">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13877.455761926274!2d52.5714962!3d29.5931048!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcc3a67871fb07f53!2z2YjYqCDYsdmI2KjbjNqpIC0gV2ViUnViaWs!5e0!3m2!1sen!2sca!4v1600581121318!5m2!1sen!2sca" width="100%" height="400" class="rounded"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let c =document.querySelector('#contact-page-info')
    console.log(c)
    c.addEventListener('contextmenu', event => event.preventDefault());
</script>


@endsection
