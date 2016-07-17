@extends('layouts.master')
@section('title',$post->title)
@section('content')
<!-- Page Header -->
<div id="content">

  <div class="page-header">
    <div class="container-fluid">
      <ul class="breadcrumb">
      	<li><a href="{{ route('home.index') }}">首頁</a></li>
        <li><a href="{{ route('article.list') }}">文章列表</a></li>
        <li><a href="{{ route('article.detail', $post->id) }}">{{ $post->title }}</a></li>
        
      </ul>
    </div>
  </div>

  
  <div class="container-fluid">
  
    <div class="row">
    	<div class="nav pull-left col-md-2">
	       	<ul class="nav navbar-left" role="tablist" >
		   		<li ><a href="{{ route('article.list') }}" >All<span class="badge pull-right">{{DB::table('article')->count()}}</span></a></li>
				@foreach ($category_info as $info)
					<li role="presentation" class="<?php if(isset($_GET['caid'])){if($info['id']==$_GET['caid']){echo "active";}}?>"> 
						<a href="{{ route('article.list','caid='.$info['id']) }}">{{$info['name']}}
						<span class="badge pull-right">{{DB::table('article')->where('category','=',$info['id'])->count()}}</span>
						</a>
					</li>
				@endforeach
			</ul>
		</div>
		<a type="bottun" class="btn btn-primary" href="{{ route('article.list') }}">返回</a>
		<div class="col-md-10 pull-right">
	   		<div>

	   			<h1>{{ $post->title }}</h1>
	   			<h2>{{ $post->updated_at }}</h2>
	   		</div>

	   		<article>
	   			<div class="typography">
				{!! $post->description !!}
				</div>
	   		</article>
		</div>

    </div>
  </div>
</div>

@endsection