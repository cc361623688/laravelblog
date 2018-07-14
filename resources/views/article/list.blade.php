@extends('layouts.app_2columns')

@section('title', '文章')

@section('content-left')
    <!-- 文章列表 -->
    <div class="z-panel">
        <div class="z-panel-header" style="text-align: left;">
            文章列表
        </div>
        <div class="z-panel-body">
            @each('shared.article_little', $articles, 'article')
        </div>
    </div>
    {{ $articles->render() }}

@endsection
