<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //获取课程
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'tag_lesson', 'tag_id', 'lesson_id')
            ->withPivot('lesson_id', 'tag_id');
    }
}
