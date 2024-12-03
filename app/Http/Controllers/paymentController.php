<?php

namespace App\Http\Controllers;

use App\Helpers\Cart\Cart;
use App\Jobs\MonitorPendingOrderJob;
use App\Models\adresse;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use RealRashid\SweetAlert\Facades\Alert;
use Shetabit\Multipay\Drivers\Payping\Payping;
// use Shetabit\Payment\Facade\Payment;
// use Rasulian\ZarinPal\Payment;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
class paymentController extends Controller
{

    protected $zarinPal;
    public function __construct(Payment $zarinPal){
        $this->zarinPal = $zarinPal;
    }
    public function checkout(Request $request){
        $this->seo()->setTitle('پیش فاکتور')
        ->setDescription('پیش فاکتور خود را اینجا مشاهده کنید')
        ->opengraph()->setTitle('پیش فاکتور')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);
        $all=Cart::all();
        $adrres = adresse::where('is_selected',1)->first();
        $totalPrice=Cart::all()->sum(function($cart){
            return $cart['price'] * $cart['quantity'];
        });
        $totalDiscust =Cart::all()->sum(function($cart){return ((  $cart['discount_percent'] ?:  $cart['product']->discust)/100 * $cart['price'])* $cart['quantity'];});
        $FinalPrice = $totalPrice - $totalDiscust;
        $orders=request()->user()->orders();
        $all=$orders->get()->last()->products()->with('gallery')->get();
        if (!$adrres) {
            Alert::warning('هشدار','شما آدرسی برای سفارشات منتخب نکرده اید');
            return redirect('/Addresses');
        }
        if (!$all) {
            Alert::warning('هشدار','شما سفارشی ندارید');
            return redirect('/');
        }
    return view('checkout',compact('all','adrres','totalPrice','totalDiscust','FinalPrice'));
    }











    public function checkout_post(Request $request){
        $adrres = adresse::where('is_selected',1)->first();

        $All = Cart::all();
        $totalPrice=Cart::all()->sum(function($cart){
            return $cart['price'] * $cart['quantity'];
        });
        $totalDiscust =Cart::all()->sum(function($cart){return ((  $cart['discount_percent'] ?:  $cart['product']->discust)/100 * $cart['price'])* $cart['quantity'];});
        $FinalPrice = $totalPrice - $totalDiscust;
        $orders=request()->user()->orders();
        if ($orders) {
            $orderitem =$All->mapWithKeys(function($cart){
                return [$cart['product']->id => [ 'quantity' => $cart['quantity']]];
            });
            $order=$orders->create([
                'status' => 'unpaid',
                'price' => $FinalPrice
            ])->get()->last();
            $products = $order->products();
            $products->sync($orderitem);
            return redirect()->route('checkout');
        }

        $all=$orders->get()->last()->products()->get();
        $listOrder = $all->pluck('id')->toArray();
        $listCart = $All->pluck('product.id')->toArray();
        $notOrderedProducts = array_diff($listCart, $listOrder);
        $notOrderedProducts = collect($notOrderedProducts)->mapWithKeys(function($cart_id) use($All){
            $cart = $All->firstwhere('product.id',$cart_id);
            return [$cart['product']->id => [ 'quantity' => $cart['quantity']]];
        });
        if (count($notOrderedProducts)) {
            $products = $orders->products();
            $products->attach($notOrderedProducts);
            $commonProducts = array_intersect($listCart, $listOrder);
            // foreach ($commonProducts as $key => $id) {
            //      Cart::delete($id);
            // }
        }else {
            if (!$adrres) {
                Alert::warning('هشدار','شما آدرسی برای سفارشات منتخب نکرده اید');
                return redirect('/Addresses');
            }
            $orderitem =$All->mapWithKeys(function($cart){
                return [$cart['product']->id => [ 'quantity' => $cart['quantity']]];
            });
            $order=$orders->create([
                'status' => 'unpaid',
                // 'address_id'=>$adrres->id,
                'price' => $FinalPrice
            ])->get()->last();
            MonitorPendingOrderJob::dispatch($order)->delay(5400);
            $products = $order->products();
            $products->sync($orderitem);

        }
        session()->forget('cart');
        return redirect()->route('checkout');
    }
























    public function pay()
    {
    $FinalPrice =Cart::all()->sum(function($cart){  return $cart['price'] * $cart['quantity'];})  -  Cart::all()->sum(function($cart){return (($cart['product']->discust)/100 * $cart['price'])* $cart['quantity'];});

    $amount = $FinalPrice ; // مبلغ پرداخت به تومان
    $invoice = Payment::purchase(
        (new Invoice)->amount($amount),
        function($driver='payping', $transactionId) {
            // ذخیره اطلاعات تراکنش در دیتابیس
        }
    )->pay()->toJson();

    return $invoice; // نمایش اطلاعات پرداخت
    }



    public function callback(Request $request)
{
    try {
        $FinalPrice =Cart::all()->sum(function($cart){  return $cart['price'] * $cart['quantity'];})  -  Cart::all()->sum(function($cart){return (($cart['product']->discust)/100 * $cart['price'])* $cart['quantity'];});

        $receipt = Payment::amount($FinalPrice )->transactionId($request->transaction_id)->verify();
        // پرداخت موفقیت‌آمیز بود
        return 'پرداخت موفقیت‌آمیز بود';
    } catch (\Shetabit\Multipay\Exceptions\InvalidPaymentException $exception) {
        // پرداخت ناموفق بود
        return 'خطا در پرداخت: ' . $exception->getMessage();
    }
}
}
