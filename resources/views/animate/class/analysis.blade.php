@extends('layouts.master')

@section('title', '選課表生成器')

@section('content')
<header>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li><a href="{{ route('home.index') }}">首頁</a></li>
            <li><a href="{{ route('animateNewLession.analysis') }}">選課表功能</a></li>
          </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>選課表功能 試做版</h1>
                    <hr class="small">
                </div>
            </div>
        </div>
    </div>
</div>
</header>


<div id="content">
  <div class="container-fluid">
    <div class="row">
        <form method="get">
          網址: <input type="text" name="html" size="64" />
          <input type="submit" value="Submit" /><br>
          <p>來源:<a href="http://www.animen.com.tw/NewsArea/NewsList/NewsListPostback?categoryId=600&tagName=%E6%96%B0%E7%95%AA%E5%88%97%E8%A1%A8">新番列表</a> </p>
          <p>範例:http://www.animen.com.tw/NewsArea/NewsItemDetail?NewsId=15697&categoryId=600&tagName=%E6%96%B0%E7%95%AA%E5%88%97%E8%A1%A8&realCategoryId=1&subCategoryId=5</p>
        </form>
        <br><br>
        <table>
            @foreach($data_array as $array)
            <tr>
               
                <td>
                    <a> {{ trim($array['0']) }} </a>
                    <img src="http://www.animen.com.tw{{trim($array['2'])}}">
                </td>
                <td>
                   <p>{{ trim($array['3']) }}</p>
                   <p>{{ trim($array['4']) }}</p>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
  </div>
</div>

    
    


@endsection


