<?php
namespace App\Http\Controllers\authcontroll;
use App\Http\Controllers\Controller;
use App\Jobs\SendNotificationCodeJob;
use App\Models\User;
use App\Models\ActiveCode;
use App\Notifications\notificationCode;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class authcontorel extends Controller
{
    /**
     * Show the login page with SEO settings.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        $this->seo()
            ->setTitle('صفحه ورود')
            ->setDescription('به صفحه ورود خوش آمدید')
            ->opengraph()
            ->setTitle('صفحه ورود')
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);

        $user = User::where('id', 1)->get();
        return view('p')->with('u', $user);
    }

    /**
     * Handle phone number submission and send verification code.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function login_step1_post(Request $request)
    {
        $sessionCode = session()->get('code') ?? collect([]);
        $phoneNumber = $request->name;

        $user = User::where('phonenumber', $phoneNumber)->first();

        $userId = $user->id ?? null;

        $existingUser = User::find($userId);

        if ($existingUser) {
            $now = Carbon::now();
            $expiredAt = Carbon::parse($existingUser->activecode[0]->expired_at);

            if (isset($existingUser->activecode[0]->code) && !$expiredAt->lessThan($now)) {
                $code = $existingUser->activecode[0]->code;
                // Send notification here if needed
            } else {
                ActiveCode::where('code', $existingUser->activecode[0]->code)->delete();
                $code = ActiveCode::createCode();

                ActiveCode::create([
                    'user_id' => $existingUser->id,
                    'code' => $code,
                    'expired_at' => now()->addMinutes(10),
                ]);
            }
            // $existingUser->notify(new notificationCode($code,$phoneNumber , 'Ghasedak'));
            SendNotificationCodeJob::dispatch($code,$phoneNumber,$existingUser);
            session()->put('code', value: $code);
            $error = '';
            return view('enter2', compact('code', 'error'));
        } else {
            $newUser = User::create([
                'phonenumber' => $phoneNumber,
            ])->get();

            $code = ActiveCode::createCode();

            ActiveCode::create([
                'user_id' => $newUser->id,
                'code' => $code,
                'expired_at' => now()->addMinutes(10),
            ]);
            // $newUser->notify(new notificationCode($code,$phoneNumber , 'Ghasedak'));
            SendNotificationCodeJob::dispatch($code,$phoneNumber,$existingUser);
            session()->put('code', $code);
            $error = '';
            return view('enter2', compact('code', 'error'));
        }
    }

    /**
     * Display the verification page.
     *
     * @return \Illuminate\View\View
     */
    public function enter2()
    {
        $this->seo()
            ->setTitle('صفحه ورود')
            ->setDescription('به صفحه ورود خوش آمدید')
            ->opengraph()
            ->setTitle('صفحه ورود')
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);

        return view('enter2');
    }

    /**
     * Check if a verification code exists.
     *
     * @return bool
     */
    public function log()
    {
        $activeCode = ActiveCode::where('code', 1111)->first();
        return (bool)$activeCode;
    }

    /**
     * Verify the code and log the user in.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function mm(Request $request)
    {
        if ($request->code == session()->get('code')) {
            $activeCode = ActiveCode::where('code', $request->code)->first();

            if ($activeCode) {
                $userId = $activeCode->user->id;
                Auth::loginUsingId($userId);

                Alert::success('ورود', 'با موفقیت وارد شدید');
                return redirect('/home');
            }
        }

        $code = $request->code;
        $error = 'کد نوشته شده صحیح نمی باشد';
        return view('enter2', compact('code', 'error'));
    }

    /**
     * Log the user out and redirect to the index page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
