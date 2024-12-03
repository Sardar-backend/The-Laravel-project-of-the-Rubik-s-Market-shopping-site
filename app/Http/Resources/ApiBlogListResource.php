<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

/**
* @OA\Schema(
    *       schema = "BlogListResource",
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
            *               example= "آیفون ۱۳، محصول جدید اپل، با طراحی زیبا و مشخصات فنی بهبود یافته به بازار عرضه شده است. این دستگاه با صفحه‌نمایش Super Retina XDR، تجربه بصری فوق‌العاده‌ای را به کاربران ارائه می‌دهد. چیپست A۱۵ Bionic، که به عنوان قلب تپنده آیفون ۱۳ عمل می‌کند، عملکرد بی‌نظیری را در اجرای برنامه‌ها و بازی‌های سنگین فراهم می‌سازد. دوربین‌های دوتایی ۱۲ مگاپیکسلی در پشت دستگاه با قابلیت‌های عکاسی پیشرفته مانند حالت شب و Smart HDR ۴، عکس‌ها و ویدیوهایی با کیفیت بالا ثبت می‌کنند."
       
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
class ApiBlogListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'count_view' => $this->count_view,
            'content' =>mb_substr(strip_tags($this->content), 0, 462, 'UTF-8') ,
            'image' => Storage::url(  $this->image),
            'failed_at' => jdate($this->failed_at)->format('%B %d، %Y')
        ];
    }
}
