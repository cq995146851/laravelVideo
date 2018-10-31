<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyController extends Controller
{
    /**
     * 重置密码页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.my.reset_password');
    }

    /**
     * 重置密码逻辑
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(Request $request)
    {
        //验证
        $this->validate($request, [
           'old_password' => 'sometimes|required',
           'password' => 'sometimes|required|confirmed',
        ], [
            'old_password.required' => '原始密码不能为空',
            'password' => '原始密码不能为空',
            'password.confirmed' => '两次密码不一致',
        ]);
        //逻辑
        if(!Hash::check($request->input('old_password'), Auth::guard('admin')->user()->password)){
            return redirect()->back()->withErrors('原密码不正确');
        }
        $me = Auth::guard('admin')->user();
        $me->password = bcrypt($request->input('password'));
        $me->save();
        Auth::guard('admin')->logout();
        //渲染
        return redirect()->route('admin.login')->with('success', '密码修改成功,请重新登录');
    }
}
