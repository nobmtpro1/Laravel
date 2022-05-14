<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'username' => 'required',
                'password' => 'required|string',
            ]);

            if (\Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {

                $request->session()->regenerate();

                return redirect()->route('cms.dashboard');
            } else {
                return back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác')->withInput($request->all());
            }
        }
        return view('cms.login');
    }

    public function logout(Request $request)
    {
        \Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('cms.login');
    }

    public function changePassword(Request $request)
    {
        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'old_password' => 'required',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->all()[0]], 500);
            }

            if (\Hash::check($request->old_password, \Auth::user()->password)) {
                $user = User::find(\Auth::user()->id);
                $user->password = bcrypt($request->new_password);
                $user->save();
                return response()->json([], 200);
            } else {
                return response()->json(['message' => $validator->errors()->add('password', 'Mật khẩu cũ không chính xác')->all()[0]], 500);
            }
        }

        $title = 'Change password';
        return view('cms.change_password', compact('title'));
    }
}
