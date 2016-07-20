@extends('layouts.master')

@section('title', '關於本站')

@section('content')


<header>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li><a href="{{ route('home.index') }}">首頁</a></li>
            <li><a href="#">關於</a></li>
          </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>關於</h1>
                    <hr class="small">
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10">
          <p><span style="font-size:22px">關於 About Me!</span></p>

          <p>
            <span style="font-size:18px">
              <span style="line-height:35.2px">此Blog是由 Cosmo 本人我為了練習PHP所做的網站,採用Laravel框架構成,前台樣板</span>
              <span style="line-height:35.2px">修改自OpenCart後臺,目前功能在逐漸增加中...</span><br><br>
              <span style="line-height:35.2px">宅宅一個,所以網站某些地方會出現 ACG 相關的東西! 若傷眼了先在此鞠躬致歉<(_ _)></span><br>
              <span style="line-height:35.2px">若有任何問題,可使用以下方式:</span>
            </span>
          </p>

          <hr class="small">
          <p>&nbsp;</p>

          <p><span style="font-size:22px">聯絡方式</span></p>

          <p><span style="font-size:18px">請使用 <a href="mailto:cosmos-s@hotmail.com.tw">電子信箱 </a> 或 站內信(<a href="{{ route('contacts.create') }}">聯絡方式</a>)!!</span></p>
          <hr class="small">
          <p>&nbsp;</p>
          <p><span class="pull-right" style="font-size:22px">謝謝 &nbsp;&nbsp;<sub>2016/07/20</sub></span></p>
          
      </div>
    </div>
</div>

@endsection