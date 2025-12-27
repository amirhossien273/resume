<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrivacyPolicyController extends Controller
{
    public function show()
    {
        $privacyPolicy = Setting::where('key', 'privacyPolicy')->first()->value;
        return view("manage.page.privacy-policy", compact('privacyPolicy'));
    }

    public function upsert(Request $request)
    {
        DB::table('settings')->updateOrInsert(
            ['key' => 'privacyPolicy'],
            ['value' => $request->intro]
        );

        return redirect()->back()->with("success", "با موفقیت تغییر کرد.");
    }
}
