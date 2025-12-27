<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Module\Media\Src\MediaUploader;

class SettingController extends Controller
{
    public function show()
    {
        $settings = DB::table('settings')
        ->whereIn('key', ['delivery', 'titleContact', 'imgContact' ,
        'titleAbute', 'imgAbute', 'titleForget', 'imgForget',
        'titleRegister' , 'imgRegister', 'titleLogin', 'imgLogin',
        'minCartPrice','exceptionDelivery'])
        ->pluck('value', 'key');

        return view('manage.page.settings', [
            'settings' => $settings
        ]);
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'delivery'          => 'nullable|string|max:255',
            'titleContact'      => 'nullable|string|max:255',
            'imgContact'        => 'nullable',
            'titleAbute'        => 'nullable|string|max:255',
            'imgAbute'          => 'nullable',
            'titleForget'       => 'nullable|string|max:255',
            'imgForget'         => 'nullable',
            'titleRegister'     => 'nullable|string|max:255',
            'imgRegister'       => 'nullable',
            'titleLogin'        => 'nullable|string|max:255',
            'minCartPrice'      => 'nullable|string|max:255',
            'exceptionDelivery' => 'nullable|string',
            'imgLogin'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        foreach ($validated as $key => $value) {

            if (str_starts_with($key, 'img') && $request->hasFile($key)) {

                $filePath = MediaUploader::source($request->file($key))
                ->useName($key)
                ->useFileName(now()->timestamp)
                ->usePatch($key)
                ->useCollection($key)
                ->upload();

                DB::table('settings')->updateOrInsert(
                    ['key' => $key],
                    ['value' => $filePath->getUrl()]
                );
            } elseif ($value !== null) {
                DB::table('settings')->updateOrInsert(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
        }

        return redirect()->back()->with('success', 'تنظیمات با موفقیت به‌روزرسانی شد.');
    }
}
