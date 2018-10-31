<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * 登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->back()->with('warning', '您已经登录过了，请不要重复登录');
        }
        return view('admin.login.login');
    }

    /**
     * 登录逻辑
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        //验证
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ], [
            'name.required' => '名称必须填写',
            'password.required' => '密码必须填写',
        ]);
        //逻辑
        if(Auth::guard('admin')->attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ])){
           return redirect()->route('admin.home.index')->with('success', '欢迎来到后台');
        }else{
           return redirect()->back()->withErrors('用户名密码不匹配');
        }
        //渲染
    }

    /**
     * 登出逻辑
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', '成功退出');
    }
}
