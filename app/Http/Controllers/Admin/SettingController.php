<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        return view('admin.setting.index',compact('setting'));
    } 

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'webName' => 'required|max:255',
            'logo' => 'nullable',
            'favicon' => 'nullable', 
            'description' => 'nullable',
            'metaTitle' => 'required|max:255',
            'metaKeyword' => 'nullable',
            'metaDescription' => 'nullable'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        
        $setting = Setting::where('id','1')->first();

        if($setting)
        {
            $setting->website_name = $request->webName;
            $setting->logo = $request->logo;

            if($request->hasfile('favicon')){
                $destination = 'uploads/settings/'.$setting->favicon;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
             $file = $request->file('favicon');
             $filename = time(). '.' . $file->getClientOriginalExtension();
             $file->move('uploads/settings/',$filename);
             $setting->favicon = $filename;
             }
 
 
            $setting->description = $request->description;
            $setting->meta_title = $request->metaTitle;
            $setting->meta_keyword = $request->metaKeyword;
            $setting->meta_description = $request->metaDescription;
            $setting->save();
 
            return redirect('admin/settings')->with('massage','Setting Updated');
        }
        else
        {
           $setting = new Setting;
           $setting->website_name = $request->webName;
           $setting->logo = $request->logo;


           if($request->hasfile('favicon')){
            $file = $request->file('favicon');
            $filename = time(). '.' . $file->getClientOriginalExtension();
            $file->move('uploads/settings/',$filename);
            $setting->favicon = $filename;
            }

           $setting->description = $request->description;
           $setting->meta_title = $request->metaTitle;
           $setting->meta_keyword = $request->metaKeyword;
           $setting->meta_description = $request->metaDescription;
           $setting->save();

           return redirect('admin/settings')->with('massage','Setting added');

        }
    }
}
