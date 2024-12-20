<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ApiBlogDetialResource extends JsonResource
{
/**
* @OA\Schema(
    *       schema = "BlogDetailResource",
    *             @OA\Property(
    *              property = "id",
    *              type="integer",
    *               example=1
    *               ),
    *             @OA\Property(
    *              property = "title",
    *              type="string",
    *               example="بررسی اجمالی آیفون 13: نسل جدید قدرت و نوآوری"
    *               ),
    *             @OA\Property(
        *              property = "count_view",
        *              type="integer",
        *               example=25
        *               ),
        *             @OA\Property(
            *              property = "content",
            *              type="string",
                 *               example="سامسونگ گلکسی S21، یکی از پرچم‌داران قدرتمند سامسونگ، با طراحی زیبا و مشخصات فنی بالا، یکی از بهترین انتخاب‌ها در دنیای گوشی‌های هوشمند به شمار می‌رود. این دستگاه با صفحه‌نمایش **Dynamic AMOLED 2X** و اندازه 6.2 اینچی، تجربه‌ی بصری فوق‌العاده‌ای را برای کاربران فراهم می‌کند. کیفیت رنگ‌ها، کنتراست بالا و نرخ نوسازی 120 هرتز، تجربه کاربری روان و لذت‌بخشی را به همراه دارد.

            چیپست قدرتمند **Exynos 2100** (برای نسخه‌های جهانی) یا **Qualcomm Snapdragon 888** (برای نسخه‌های آمریکا و چین)، سرعت و قدرت فوق‌العاده‌ای برای اجرای برنامه‌ها و بازی‌های سنگین ارائه می‌دهد. با 8 گیگابایت حافظه رم و 128 یا 256 گیگابایت فضای ذخیره‌سازی، گلکسی S21 عملکردی بی‌نقص و سریع دارد. همچنین، این گوشی فاقد درگاه کارت حافظه است، اما فضای ذخیره‌سازی کافی برای اکثر کاربران فراهم می‌کند.

            دوربین‌های سه‌گانه در پشت دستگاه شامل یک لنز 12 مگاپیکسلی فوق عریض، یک لنز 12 مگاپیکسلی عریض، و یک لنز تله‌فوتو 64 مگاپیکسلی است که تجربه‌ای بی‌نظیر از عکاسی و فیلم‌برداری به ارمغان می‌آورد. قابلیت **8K video recording** و **Super Steady** در فیلم‌برداری، باعث می‌شود کاربران بتوانند ویدیوهایی با وضوح بسیار بالا و پایداری بی‌نظیر ضبط کنند.

            **باتری 4000 میلی‌آمپرساعتی** این گوشی با پشتیبانی از شارژ سریع 25 واتی، شارژ بی‌سیم 15 واتی و شارژ بی‌سیم معکوس، امکان استفاده طولانی‌مدت از گوشی بدون نگرانی از تمام شدن باتری را فراهم می‌کند. یکی دیگر از ویژگی‌های برجسته گلکسی S21، پشتیبانی از شبکه 5G است که سرعت بسیار بالایی را در اتصال به اینترنت و دانلود محتوا فراهم می‌کند.

            گلکسی S21 با **استاندارد IP68** در برابر آب و گرد و غبار مقاوم است، به این معنی که در شرایط مختلف محیطی، همچنان عملکرد خود را حفظ می‌کند. سامسونگ همچنین با ارائه تکنولوژی صوتی **Dolby Atmos** و اسپیکرهای استریو، تجربه شنیداری عالی را برای کاربران فراهم کرده است.

            سامسونگ گلکسی S21 از **One UI 3.1**، جدیدترین نسخه رابط کاربری سامسونگ بر پایه اندروید 11 بهره می‌برد که تجربه کاربری ساده، روان و شخصی‌سازی‌شده را به همراه دارد. در مجموع، این گوشی ترکیبی از قدرت، زیبایی و تکنولوژی‌های مدرن است که نیازهای کاربران حرفه‌ای و علاقه‌مندان به دنیای فناوری را به‌خوبی برآورده می‌کند."
            *               ),
            *             @OA\Property(
            *              property = "image",
            *              type="string",
            *               example="/storage/files/OIN9JWtZXPg3M9OBnVu7adsaEePPkbN0LVFOOEYgHw.jpg"
            *               ),
            *             @OA\Property(
            *              property = "failed_at",
            *              type="string",
            *               example="مهر 10، 1403"
            *               ),


    )
 */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'count_view' => $this->count_view,
            'content' =>$this->content ,
            'image' => Storage::url(  $this->image),
            'failed_at' => jdate($this->failed_at)->format('%B %d، %Y')
        ];
    }
}
