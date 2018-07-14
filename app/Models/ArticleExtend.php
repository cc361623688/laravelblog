<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleExtend extends Model
{
    //数据表名称
    protected $table = 'article_extends';

    public $timestamps = false;

    //可写字段
    protected $fillable = [
        'browser', 'collect', 'praise', 'comment',
    ];

    //更新浏览量(browser)
    static public function update_browser($id)
    {
        $articleExtend = ArticleExtend::where('article_id', $id)->first();

        $browser = $articleExtend->browser + 1;

        $articleExtend->update(['browser' => $browser,]);
    }


    //更新评论量
    static public function update_comment($id)
    {
        $articleExtend = ArticleExtend::where('article_id', $id)->first();
        $comment = $articleExtend->comment + 1;
        $articleExtend->update([
            'comment' => $comment,
        ]);
    }

}
