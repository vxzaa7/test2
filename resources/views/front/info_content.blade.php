@extends('layouts.app2')
@section('title',"《黑色契約CABAL Online》遊戲公告")
@section('link')
<link rel="stylesheet" href="/css/home_page/info_content_style.css?v1.0">
@endsection
@section('main_title',"遊戲公告")
@section('content')
<div class="date">{{ date('Y/m/d H:i', strtotime($page->created_at)) }}</div>
<div class="content_box">
<div class="title">{{$page->title}}</div>
<div class="title_line"></div>
<div class="text_box">
    {!! $page->content !!}
</div>
</div>
@endsection