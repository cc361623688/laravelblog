<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //数据表名称
    protected $table = 'comments';

    //可写字段
    protected $fillable = [
        'user_id', 'article_id', 'content',
    ];

    //重写setUpdatedAt方法
    public function setUpdatedAtAttribute($value) {
        // Do nothing.
    }

    //模型关联：获取该评论的所有回复
    public function replys()
    {
        return $this->hasMany('App\Models\Reply','id','comment_id');
    }

    //模型关联：获取该评论所属的用户模型
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //模型关联：获取该评论所属的文章模型
    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }
}
