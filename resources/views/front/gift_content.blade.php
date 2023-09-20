@extends('layouts.app2')
@section('title', '《黑色契約CABAL Online》領獎專區')
@section('link')
    <link rel="stylesheet" href="/css/home_page/gift_style.css?v1.0">
@endsection
@section('main_title', '領獎專區')
@section('content')
    <p>達成活動條件後，可以在此頁面登入並領取活動獎勵。</p>
    <div class="line"></div>
    <div class="select_box">
        <select class="section" name="select_year">
            <option class="option" value="0">年</option>
            <option class="option" value="2023">2023</option>
            <option class="option" value="2024">2024</option>
        </select>
        <select class="section" name="select_month">
            <option class="option" value="0">月</option>
            <option class="option" value="1">1</option>
            <option class="option" value="2">2</option>
            <option class="option" value="3">3</option>
            <option class="option" value="4">4</option>
            <option class="option" value="5">5</option>
            <option class="option" value="6">6</option>
            <option class="option" value="7">7</option>
            <option class="option" value="8">8</option>
            <option class="option" value="9">9</option>
            <option class="option" value="10">10</option>
            <option class="option" value="11">11</option>
            <option class="option" value="12">12</option>
        </select>
        <input type="text" placeholder="輸入活動關鍵字" class="input" />
        <div class="login">搜尋</div>
    </div>
    <div class="content_box">
        <table>
            <tr class="tab_head_s">
                <td>活動名稱</td>
                <td>領獎時間</td>
            </tr>
            @foreach ($list as $value)
                <tr>
                    <td><a href="" class="event">{{ $value['title'] }}</a></td>
                    <td>{{ $value['start'] }}　～　{{ $value['end'] }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{-- 頁碼 --}}
    {!! $list->links() !!}

    <div class="event_gift_box">
        <div class="title">{{ $giftCreate['title'] }}</div>
        <div class="line"></div>



        @if (isset($_COOKIE['StrID']) && isset($_COOKIE['StrID']) != null)
            <form id="logout-form" action="https://www.digeam.com/logout" method="POST" style="display: none;">
                <input type="hidden" name="return_url" id="return_url"
                    value={{ base64_encode('https://cbo.digeam.com/gift') }}>
            </form>
            <div class="logout_box">
                <div class="name">Hi! 目前登入的帳號是 ：{{ $_COOKIE['StrID'] }}</div>
                <div class="logout">登出</div>
            </div>
        @else
            <div class="login_box">
                <div class="login_text">請先登入</div>
                <div class="login">登入</div>
            </div>
        @endif


        <table>
            <tr class="tab_head_s">
                <td>活動名稱</td>
                <td>活動獎勵</td>
                <td>說明</td>
                <td>領取狀態</td>
            </tr>

            @foreach ($giftGroup as $value)
                {{-- @dd($value) --}}
                {{-- 道具不只一個 --}}
                @if ($value['rows'] > 1)
                @foreach($value['item'] as $key => $value_2)
                <tr>
                    @if($key == 0)
                    <td rowspan={{$value['rows']}}>{{$value['title']}}</td>
                    @endif
                    <td>{{ $value['item'][$key]['title']}}</td>
                    <td>{{ $value['item'][$key]['description']}}</td>
                    <td>
                        @if (isset($_COOKIE['StrID']) && isset($_COOKIE['StrID']) != null)
                        <div class="btn_s">領取</div>
                        @else
                        <div class="btn_s_gray">領取</div>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                    {{-- 道具只有一個 --}}
                    <tr>
                        <td>{{ $value['title'] }}</td>
                        <td>{{ $value['item'][0]['title'] }}</td>
                        <td>{{ $value['item'][0]['description'] }}</td>
                        <td>
                            @if (isset($_COOKIE['StrID']) && isset($_COOKIE['StrID']) != null)
                            <div class="btn_s">領取</div>
                            @else
                            <div class="btn_s_gray">領取</div>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach




        </table>
    </div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        // 登出
        $('.logout').on('click', function() {
            $('#logout-form').submit()
        })
        // 登入
        $('.login').on('click', function() {
            location.href = 'https://digeam.com/login'
        })

    </script>
@endsection