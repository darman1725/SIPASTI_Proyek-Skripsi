<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('backend.setting.index', compact('setting'));
    }

    public function store(SettingRequest $request)
    {
        $attr = $request->validated();
        $id = $request->id;
        Setting::updateOrCreate(['id' => $id], $attr);
        return redirect()->route('settings.index')->with('success', __('Settings updated successfully.'));
    }
}