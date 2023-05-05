<?php

namespace App\Http\Controllers\Information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Step1Request;
use App\Http\Requests\Step2Request;
use App\Http\Requests\Step3Request;
use App\Models\Information\DataProfile;

class DataProfileController extends Controller
{
    public function index()
    {
        return view('information.data_profile.step1');
    }

    public function step1(Step1Request $request)
    {
        $user = new DataProfile();
        $user->nama = $request->nama;
        $user->save();

        // simpan ID dari objek DataProfile yang baru saja disimpan ke dalam session
        $request->session()->put('user_id', $user->id);

        return view('information.data_profile.step2');
    }

    public function step2(Step2Request $request)
    {
    $user = DataProfile::findOrFail($request->session()->get('user_id'));
    $user->phone = $request->phone;
    $user->save();

    return view('information.data_profile.step3');
    }

    public function step3(Step3Request $request)
    {
        $user = DataProfile::findOrFail($request->session()->get('user_id'));
        $user->address = $request->address;
        $user->save();

        $request->session()->forget('user_id');

        return redirect('/information/data_profile')->with('success', 'Form berhasil disubmit!');
    }

}
