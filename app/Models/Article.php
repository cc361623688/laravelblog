<?php
// 文章表模型文件

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleExtend;

class Article extends Model
{
    //数据表名称
    protected $table = 'articles';
    //public $timestamps = false;


    //动态流-最新文章
    static public function new()
    {
        $articles = Article::where('hidden', false)->orderBy('created_at','desc')->take(5)->get();
        return $articles;
    }
    public function extends(){
        return $this->hasOne('App\Models\ArticleExtend');
    }

    //更新浏览量
    static public function update_view($id)
    {
        ArticleExtend::update_browser($id);
    }

    public function comments(){
        return $this->hasMany('App\Models\Comments');
    }

}
