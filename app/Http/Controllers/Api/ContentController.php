<?php

namespace App\Http\Controllers\Api;

use App\Models\Lesson;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends CommonController
{
    /**
     * 标签列表
     *
     * @return array
     */
    public function tags()
    {
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return $this->response($tags);
    }

    /**
     * 课程列表
     *
     * @param $tag_id
     * @return array
     */
    public function lessons($tag_id = null)
    {
        if ($tag_id) {
            $tag = Tag::find($tag_id);
            $lessons = $tag->lessons;
        } else {
            $lessons = Lesson::all();
        }
        return $this->response($lessons);
    }

    /**
     * 推荐课程
     *
     * @param $row
     * @return array
     */
    public function commendLessons($row = 10)
    {
        $commendLessons = Lesson::where('is_commend', 1)->take(10)->get();
        return $this->response($commendLessons);
    }

    /**
     * 热门课程
     *
     * @param $row
     * @return array
     */
    public function hotLessons($row = 10)
    {
        $hotLessons = Lesson::where('is_hot', 1)->take(10)->get();
        return $this->response($hotLessons);
    }

    /**
     * 视频列表
     *
     * @param $lesson_id
     * @return array
     */
    public function videos($lesson_id)
    {
        $videos = Video::where('lesson_id', $lesson_id)->get();
        return $this->response($videos);
    }
}
