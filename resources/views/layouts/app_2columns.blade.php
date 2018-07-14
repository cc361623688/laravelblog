{{-- 这是两栏布局视图模板：包含了导航栏、巨幕、作者信息侧栏、底部信息栏 --}}
@extends('layouts.app_imax')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <!-- 文章信息 -->
            @yield('content-left')
        </div>

        <div class="col-md-3">
            <!-- 作者信息 -->
            @include('shared.author_info')

        <!-- 热门文章 -->


        <!-- 最新留言 -->


        <!-- 友情链接 -->


        <!-- 广告位 -->

        </div>
    </div>
@endsection