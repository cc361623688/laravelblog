<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Comments;
use App\Models\Reply;
use App\Models\ArticleExtend;

class ReplysController extends Controller
{
    //存储回复
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $reply = Reply::create([
            'user_id' => Auth::id(),
            'comment_id' => $request->comment_id,
            'content' => $request->content,
        ]);

        //更新评论量
        $article_id = Comments::findOrFail($request->comment_id)->article->id;
        ArticleExtend::update_comment($article_id);

        //发送邮件通知
        $data['article_id'] = $article_id;
        //Mail::to(User::findOrFail(1))->send(new NewComment($data));

        //session()->flash('success', '回复成功');
        //return back();
    }
}
