<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use Auth;
use App\Models\ArticleExtend;

class CommentsController extends Controller
{
    //存储评论
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $comment = Comments::create([
            'user_id' => Auth::id(),
            'article_id' => $request->article_id,
            'content' => $request->content,
        ]);

        //更新评论量
        ArticleExtend::update_comment($request->article_id);

        //发送邮件通知
        $data['article_id'] = $request->article_id;
        //Mail::to(User::findOrFail(1))->send(new NewComment($data));

        session()->flash('success', '评论成功');
        return back();
    }
}
