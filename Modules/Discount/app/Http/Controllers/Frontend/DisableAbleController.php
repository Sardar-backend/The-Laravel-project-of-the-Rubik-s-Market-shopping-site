<?php

namespace Modules\Discount\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Nwidart\Modules\Facades\Module;

class DisableAbleController extends Controller
{
    /**
     * Disable the Discount module.
     *
     * @return RedirectResponse
     */
    public function disable()
    {
        // Find the 'Discount' module
        $module = Module::find('Discount');

        // Check if the module is enabled, then disable it
        if ($module && $module->isEnabled()) {
            $module->disable();
        }

        // Redirect to the admin page
        return redirect('/admin')->with('success', 'Discount module disabled successfully.');
    }

    /**
     * Enable the Discount module.
     *
     * @return RedirectResponse
     */
    public function able()
    {
        // Find the 'Discount' module
        $module = Module::find('Discount');

        // Check if the module is disabled, then enable it
        if ($module && $module->isDisabled()) {
            $module->enable();
        }

        // Redirect to the discount page
        return redirect('/discount')->with('success', 'Discount module enabled successfully.');
    }
}
