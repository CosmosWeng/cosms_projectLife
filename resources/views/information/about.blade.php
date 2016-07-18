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
<div id="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6">
          網站建置中...
      </div>
    </div>
  </div>
</div>

@endsection