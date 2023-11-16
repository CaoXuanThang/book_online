<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('client.profile', compact('user'));
    }
    public function update(ProfileRequest $request)
    {
        $params = $request->except('_token');
        $user = User::find(Auth::id());
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            if ($user->avatar != 'images/default-user.jpg') {
                $resultDL = Storage::delete('/public/' . $user->avartar);
                if ($resultDL) {
                    $params['avatar'] = uploadFile('images', $request->file('avatar'));
                } else {
                    $params['avatar'] = $user->avatar;
                }
            }else{
                $params['avatar'] = uploadFile('images', $request->file('avatar'));
            }
        }
        User::where('id', Auth::id())->update($params);
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('client.profile');
    }
}
