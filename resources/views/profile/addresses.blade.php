@extends('base')
@section('content')

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
                            <!-- New Address Form -->
                            <div class="custom-container mb-2" id="new-address">
                                <div class="row pt-2 px-3">
                                    <div class="col-12"><h1>افزودن آدرس جدید</h1></div>
                                </div>
                                <hr>
                                <div class="container">
                                    <div class="row">
                                        <form action="{{route('adresses_post')}}" method="post">@csrf



                                        <div class="col-12 pt-3">
                                            <div class="row">
                                            <div class="col-12 col-md-4 pl-2">
                                                    <div class="form-group m-1">
                                                        <label for="province">استان:</label>
                                                        <select name="province" id="province" class="form-control">
                                                            <option value="">انتخاب کنید</option>
                                                            <option value="tehran">تهران</option>
                                                            <option value="alborz">البرز</option>
                                                            <option value="esfahan">اصفهان</option>
                                                            <option value="fars">فارس</option>
                                                            <option value="khorasan_razavi">خراسان رضوی</option>
                                                            <option value="khorasan_shomali">خراسان شمالی</option>
                                                            <option value="khorasan_jonubi">خراسان جنوبی</option>
                                                            <option value="sistan_baluchestan">سیستان و بلوچستان</option>
                                                            <option value="mazandaran">مازندران</option>
                                                            <option value="gilan">گیلان</option>
                                                            <option value="khuzestan">خوزستان</option>
                                                            <option value="yazd">یزد</option>
                                                            <option value="zanjan">زنجان</option>
                                                            <option value="ardebil">اردبیل</option>
                                                            <option value="qazvin">قزوین</option>
                                                            <option value="kermanshah">کرمانشاه</option>
                                                            <option value="hamedan">همدان</option>
                                                            <option value="markazi">مرکزی</option>
                                                            <option value="semnan">سمنان</option>
                                                            <option value="chaharmahal_bakhtiari">چهارمحال و بختیاری</option>
                                                            <option value="boir_ahmad">کهگیلویه و بویراحمد</option>
                                                            <option value="gilān">گلستان</option>
                                                            <option value="kurdistan">کردستان</option>
                                                            <option value="lorestan">لرستان</option>
                                                            <option value="bushehr">بوشهر</option>
                                                            <option value="hormozgan">هرمزگان</option>
                                                            <option value="ilam">ایلام</option>
                                                            <option value="qom">قم</option>
                                                            <option value="azarbayjan_gharbi">آذربایجان غربی</option>
                                                            <option value="azarbayjan_sharqi">آذربایجان شرقی</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 pl-2">
                                                    <div class="form-group m-1">
                                                        <label for="city">شهر:</label>
                                                        <select name="city" id="city" class="form-control">
                                                            <option value="">ابتدا استان را انتخاب کنید</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-8 pl-2">
                                                    <div class="form-group m-1">
                                                        <label for="address">نشانی کامل:</label>
                                                        <input type="text" name="adress" id="address" class="form-control">
                                                        <input type="hidden" name="user_id" value="{{request()->user()->id}}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 pl-2">
                                                    <div class="form-group m-1">
                                                        <label for="postal_code">کد پستی:</label>
                                                        <input type="text" name="post_number" id="postal_code" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 pl-2">
                                                    <div class="form-group m-1">
                                                        <label for="receiver">تحویل گیرنده:</label>
                                                        <input type="text" name="tahvil" id="receiver" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 pl-2">
                                                    <div class="form-group m-1">
                                                        <label for="tel">تلفن تماس:</label>
                                                        <input type="text" name="number" id="tel" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group m-1 pb-3">
                                                        <input type="submit" class="btn btn-primary px-5" value="ذخیره آدرس">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form></div>
                                </div>
                            </div>
                            <!-- /New Address Form -->

                            <!-- User Addresses -->
                            <div class="custom-container" id="addresses">
                                <div class="row pt-2 px-3">
                                    <div class="col-11"><h1>آدرس های من</h1></div>

                                </div>
                                <hr>
                                <div class="container">
                                    <div class="row">
                                        <!-- Address Record -->
                                         @foreach ($adresses as $adress )
                                        <div class="col-12 address py-2">
                                            <div class="row">
                                                <div class="col-12 col-sm-10">
                                                    <div class="title">{{$adress->ostan}}، {{$adress->adress}}</div>
                                                    <div class="sub-title">{{$adress->ostan}}، {{$adress->city}}</div>
                                                    <div class="sub-title">{{$adress->post_number}}</div>
                                                    <div class="sub-title">{{$adress->tahvil}}</div>
                                                    <div class="sub-title">{{$adress->number}}</div>
                                                </div>

                                                <div class="col-12 col-sm-2 text-lg-end">
                                                <form action="{{route('selectadresses' , ['id'=> $adress->id ])}}" id="dfd{{$adress->id}}" method="post">@csrf
                                                </form>
                                                <form id="aaa{{$adress->id}}" action="{{route('delete_adresses',['id'=>$adress->id])}}" method="post">
                                                    @csrf
                                                </form>
                                                    <a onclick="let cc = document.querySelector('#aaa{{$adress->id}}').submit()"  class="float-right float-sm-left pr-2 pl-sm-2"><i  id="iiii" class="fa fa-trash-alt font-weight-normal"></i></a>
                                                    <!-- <a href="#" class="float-right float-sm-left"><i class="fa fa-edit font-weight-normal"></i></a> -->
                                                     @if ($adress->is_selected)

                                                     <a  class="float-right float-sm-left ml-2" title=" ادرس منتخب"><i class="fa fa-check-circle" style="color: #fcb941"></i></a>
                                                     @else
                                                     <a  class="float-right float-sm-left ml-2" title="انتخاب به عنوان ادرس منتخب"><i onclick="document.querySelector('#dfd{{$adress->id}}').submit()" class="fa fa-check-circle" style="color: #999999"></i></a>

                                                     @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <script>
                                        let y = document.querySelector('#iiii');y.addEventListener('click', function() {document.querySelector('#foorm').submit();});
                                        </script> -->
                                         @endforeach

                                        <!-- Address Record -->
                                        <!-- Address Record -->

                                        <!-- Address Record -->
                                    </div>
                                </div>
                            </div>
                            <!-- /User Addresses -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const provinceSelect = document.getElementById('province');
    const citySelect = document.getElementById('city');

    // لیست کامل استان‌ها و شهرهای ایران
    const citiesByProvince = {
        tehran: ['تهران', 'اسلام‌شهر', 'ری', 'ورامین', 'شهریار', 'دماوند', 'پردیس', 'رباط‌کریم', 'بومهن', 'ملارد', 'فیروزکوه', 'قدس', 'پاکدشت', 'پرند', 'چهاردانگه', 'آبسرد', 'رودهن', 'قرچک', 'شریف‌آباد', 'وحیدیه', 'صباشهر', 'نسیم‌شهر', 'گلستان', 'باقرشهر', 'جوادآباد'],
        alborz: ['کرج', 'فردیس', 'نظرآباد', 'هشتگرد', 'اشتهارد', 'طالقان', 'ماهدشت', 'کمال‌شهر', 'گرمدره', 'مشکین‌دشت', 'تنکمان', 'چهارباغ', 'گلسار', 'آسارا'],
        esfahan: ['اصفهان', 'کاشان', 'خمینی‌شهر', 'نجف‌آباد', 'شاهین‌شهر', 'فولادشهر', 'زرین‌شهر', 'گلپایگان', 'فریدون‌شهر', 'نطنز', 'اردستان', 'سمیرم', 'خوانسار', 'چادگان', 'بویین‌ومیاندشت', 'مبارکه', 'خور و بیابانک', 'ورزنه', 'هرند', 'میمه', 'لنجان', 'تیران و کرون', 'جرقویه'],
        fars: ['شیراز', 'مرودشت', 'کازرون', 'فسا', 'جهرم', 'داراب', 'لار', 'اقلید', 'آباده', 'نی‌ریز', 'سپیدان', 'استهبان', 'قیر و کارزین', 'زرین‌دشت', 'لامرد', 'مهر', 'خرم‌بید', 'خنج', 'بوانات', 'ارسنجان', 'سروستان', 'گراش', 'بیضا'],
        khorasan_razavi: ['مشهد', 'نیشابور', 'سبزوار', 'قوچان', 'تربت حیدریه', 'فریمان', 'چناران', 'بردسکن', 'کاشمر', 'تایباد', 'گناباد', 'خواف', 'تربت جام', 'طرقبه', 'کاریز', 'درگز', 'کلات', 'جوین', 'مه ولات', 'سرخس', 'رشتخوار', 'کوهسرخ'],
        khorasan_shomali: ['بجنورد', 'شیروان', 'اسفراین', 'آشخانه', 'مانه و سملقان', 'جاجرم', 'گرمه', 'راز', 'جاجرم', 'فاروج', 'صالح‌آباد', 'دیباج', 'درق', 'بندپایین', 'حسن‌آباد', 'محسن‌آباد'],
        khorasan_jonubi: ['بیرجند', 'قائن', 'نهبندان', 'طبس', 'فردوس', 'سرایان', 'سربیشه', 'بشرویه', 'دیهوک', 'اسلامیه', 'آیسک', 'کوهبنان', 'خوسف', 'رودبار', 'فخرآباد', 'تفتان',],
        sistan_baluchestan: ['زاهدان', 'چابهار', 'زابل', 'نیکشهر', 'دلگان', 'ایرانشهر', 'خاش', 'فنوج', 'سراوان', 'سومار', 'کنگان', 'کنارک', 'قصرقند', 'میرجاوه', 'بمپور', 'مهرستان', 'نصرت‌آباد', 'بزمان', 'پشامگ',],
        mazandaran: ['ساری', 'نوشهر', 'بابل', 'آمل', 'قائم‌شهر', 'چالوس', 'تنکابن', 'رویان', 'فریدون‌کنار', 'بابلسر', 'نکا', 'دماوند', 'رامسر', 'محمودآباد', 'کیاسر', 'سوادکوه', 'پایین‌دشت', 'میرملاس', 'پلازمین', 'کیاکلا',],
        gilan: ['رشت', 'انزلی', 'لنگرود', 'تالش', 'صومعه‌سرا', 'آستارا', 'رودبار', 'فومن', 'لاهیجان', 'شفت', 'سیاهکل', 'بندرانزلی', 'بله‌سر', 'املش', 'تالش', 'آستانه اشرفیه', 'شهرستان رودسر', 'دیلمان',],
        khuzestan: ['اهواز', 'خرمشهر', 'دزفول', 'آبادان', 'ماهشهر', 'اندیمشک', 'مسجدسلیمان', 'شوش', 'شادگان', 'گتوند', 'ایذه', 'بندر امام خمینی', 'بندر ماهشهر', 'دزفول', 'اندیکا', 'بهبهان', 'حمیدیه', 'سوسنگرد', 'شوشتر', 'بروجرد',],
        kerman: ['کرمان', 'رفسنجان', 'جیرفت', 'زرند', 'سیرجان', 'بافت'],
        yazd: ['یزد', 'میبد', 'اردکان', 'اشکذر', 'بافق', 'هرات', 'تفت', 'خاتم', 'محمودآباد', 'بهاباد', 'فهرج', 'قائم‌شهر', 'طبس',],
        zanjan: ['زنجان', 'خرمدره', 'ابهر', 'طارم', 'قیدار', 'ایجرود', 'ماه‌نشان', 'هیدج', 'دندی', 'یامچی', 'آببر',],
        ardebil: ['اردبیل', 'نیر', 'مشگین‌شهر', 'پارسا', 'خلخال', 'کویری', 'بیله‌سوار', 'گرمی', 'اصلاندوز', 'بخش سبلان', 'حسن‌آباد',],
        kermanshah: ['کرمانشاه', 'اسلام‌آباد غرب', 'صحنه', 'کنگاور', 'سنقر', 'هرسین', 'بژی', 'روانسر', 'گیلانغرب', 'سرپل ذهاب', 'شهرستان هرسین', 'قصر شیرین',],
        hamadan: ['همدان', 'ملایر', 'نهاوند', 'تویکان', 'کبودرآهنگ', 'بهار', 'اسدآباد', 'رزن', 'فامنین', 'کنگاور', 'تویسرکان',],
        qazvin: ['قزوین', 'البرز', 'تاکستان', 'آبیک', 'برجک', 'شال', 'محمدیه', 'محمودآباد', 'کوهین', 'قزوین',],
        golestan: ['گرگان', 'گنبد کاووس', 'علی‌آباد کتول', 'کردکوی', 'آق‌قلا', 'کلاله', 'رامیان', 'مینودشت', 'گمیشان', 'مراوه‌تپه', 'ترکمن',],
        kurdistan: ['سنندج', 'مریوان', 'قروه', 'کامیاران', 'بیجار', 'دیواندره', 'سقز', 'بانە', 'دهگلان', 'پیرانشهر', 'حسن‌آباد', 'کانی‌دینار',],
        lorestan: ['خرم‌آباد', 'بروجرد', 'دلفان', 'کوهدشت', 'الیگودرز', 'چگنی', 'پلدختر', 'اندیمشک', 'نورآباد', 'ممن', 'دورود', 'ازنا', 'هفت‌چشمه',],
        bushehr: ['بوشهر', 'دشتی', 'دیر', 'گناوه', 'کنگان', 'جم', 'تنگستان', 'عسلویه', 'مرودشت', 'محمودآباد', 'گچساران',],
        hormozgan: ['بندرعباس', 'قشم', 'بندرلنگه', 'میناب', 'رودان', 'بندرکنگ', 'حاجی‌آباد', 'قشم', 'بستک', 'کیش', 'فاریاب', 'لار',],
        ilam: ['ایلام', 'دره‌شهر', 'مهران', 'آبدانان', 'پلدشت', 'شیروان', 'چرداول', 'هلیلان', 'موسیان', 'دربند', 'بیات',],
        chaharmahal_bakhtiari: ['شهرکرد', 'کیار', 'بروجن', 'فارسان', 'لردگان', 'اردل', 'بن', 'کوهرنگ', 'سامان', 'بهمئی',],
        boir_ahmad: ['یاسوج', 'گچساران', 'دنا', 'بهمئی', 'چیتاب', 'مارگون', 'سوق', 'لنده', 'سی‌سخت', 'دهدشت',],
        semnan: ['سمنان', 'شاهرود', 'دامغان', 'گرمسار', 'مهدیشهر', 'سرخه', 'ایوانکی', 'کوهسار', 'کاشان', 'میامی',],
        markazi: ['اراک', 'ساوه', 'کمیجان', 'محلات', 'زرندیه', 'تفرش', 'دلیجان', 'خمین', 'آشتیان', 'کمیجان', 'شازند',],
        qom: ['قم', 'کهک', 'جعفریه', 'کاشان', 'سلفچگان', 'شهرک پردیسان',],
        azarbayjan_gharbi: ['ارومیه', 'مهاباد', 'پیرانشهر', 'خوی', 'سلماس', 'چالدران', 'شاهین دژ', 'تکاب', 'بوکان', 'نقده', 'ماکو', 'اشنویه', 'زرینه', 'سردشت',],
        azarbayjan_sharqi: ['تبریز', 'مرند', 'اهر', 'بناب', 'جلفا', 'خسروشاه', 'آذرشهر', 'اسکو', 'کلیبر', 'ورزقان', 'هریس', 'باسمنج', 'کلیبر', 'میانه', 'آسوز',],
        kerman: ['کرمان', 'بم', 'رودبار', 'جیرفت', 'زرند', 'شهربابک', 'رفسنجان', 'انار', 'ریگان', 'کهنوج', 'بافت', 'فهرج', 'کوهبنان',],
    };

    // هنگامی که استان تغییر می‌کند
    provinceSelect.addEventListener('change', function () {
        const selectedProvince = provinceSelect.value;

        // پاک کردن گزینه‌های قبلی شهر
        citySelect.innerHTML = '<option value="">یک شهر را انتخاب کنید</option>';

        // اگر استان انتخاب شده معتبر است، شهرهای مربوطه را اضافه کن
        if (selectedProvince && citiesByProvince[selectedProvince]) {
            citiesByProvince[selectedProvince].forEach(city => {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                citySelect.appendChild(option);
            });
        }
    });
});

</script>

@endsection
