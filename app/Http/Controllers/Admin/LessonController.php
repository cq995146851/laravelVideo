<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lesson;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::withCount('videos')->get();
        return view('admin.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'preview' => 'required',
            'click_count' => 'required',
        ], [
            'title.required' => '课程标题不能为空',
            'desc.required' => '课程描述不能为空',
            'preview.required' => '课程预览图不能为空',
            'click_count.required' => '课程点击数不能为空'
        ]);
        //逻辑
        $lesson = new Lesson();
        $lesson->title = $request->input('title');
        $lesson->desc = $request->input('desc');
        $lesson->preview = $request->input('preview');
        $lesson->is_commend = $request->input('is_commend');
        $lesson->is_hot = $request->input('is_hot');
        $lesson->click_count = $request->input('click_count');
        $lesson->save();
        $videos = json_decode($request->input('videos'));
        foreach ($videos as $video) {
            $lesson->addVideo($video);
        }
        //渲染
        return redirect()->route('admin.lesson.index')->with('success', '添加成功');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $videos = $lesson->videos;
        return view('admin.lesson.edit', compact('lesson', 'videos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //验证
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'preview' => 'required',
            'click_count' => 'required',
        ], [
            'title.required' => '课程标题不能为空',
            'desc.required' => '课程描述不能为空',
            'preview.required' => '课程预览图不能为空',
            'click_count.required' => '课程点击数不能为空'
        ]);
        //逻辑
        $lesson->delVideo();
        $lesson->title = $request->input('title');
        $lesson->desc = $request->input('desc');
        $lesson->preview = $request->input('preview');
        $lesson->is_commend = $request->input('is_commend');
        $lesson->is_hot = $request->input('is_hot');
        $lesson->click_count = $request->input('click_count');
        $lesson->save();
        $videos = json_decode($request->input('videos'));
        foreach ($videos as $video) {
            $lesson->addVideo($video);
        }
        //渲染
        return redirect()->route('admin.lesson.index')->with('success', '修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        if($lesson->delete() && $lesson->delVideo()){
            return [
                'errno' => 0,
                'msg' => '删除成功'
            ];
        } else {
            return [
                'errno' => 1,
                'msg' => '删除失败'
            ];
        }

    }

    public function upload(Request $request)
    {
        $dirName = 'lesson@' . date('Y-m-d', time());
        $path = $request->file('preview')->storePublicly($dirName);
        return asset('/storage/' . $path);
    }
}
