<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * 标签列表页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * 创建标签页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * 新增标签逻辑
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //验证
        $this->validate($request, [
            'name' => 'required'
        ],[
            'name.required' => '标签名称不能为空'
        ]);
        //逻辑
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->save();
        //渲染
        return redirect()->route('admin.tag.index')->with('success','添加成功');
    }

    /**
     * 修改视图
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * 修改逻辑
     * @param Request $request
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Tag $tag)
    {
        //验证
        $this->validate($request, [
            'name' => 'required'
        ],[
            'name.required' => '标签名称不能为空'
        ]);
        //逻辑
        $tag->name = $request->input('name');
        $tag->save();
        //渲染
        return redirect()->route('admin.tag.index')->with('success','修改成功');
    }

    /**
     * 删除逻辑
     * @param Tag $tag
     * @return array
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        if($tag->delete()){
            return [
                'errno' => 0,
                'msg' => '删除成功'
            ];
        }else {
            return [
                'errno' => 1,
                'msg' => '删除失败'
            ];
        }

    }
}
