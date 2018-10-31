<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //所有视频
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    //添加视频
    public function addVideo($video)
    {
        $videoModel = new Video();
        $videoModel->title = $video->title;
        $videoModel->path = $video->path;
        return $this->videos()->save($videoModel);
    }

    //删除视频
    public function delVideo()
    {
        return $this->videos()->delete();
    }
}
