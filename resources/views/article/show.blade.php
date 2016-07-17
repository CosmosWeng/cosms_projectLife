@extends('layouts.master')

@section('content')
<!-- Page Header -->
<div id="content">

  <div class="page-header">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li><a href="#">test</a></li>
        <li><a href="{{ route('article.list') }}">返回</a></li>
      </ul>
    </div>
  </div>

  
  <div class="container-fluid">
    <div class="row">
    	<div class="nav">
	       	<ul class="nav navbar-left" role="tablist" >
		   		<li ><a href="{{ route('home.index') }}" >All<span class="badge pull-right">{{DB::table('article')->count()}}</span></a></li>
				@foreach ($category_info as $info)
					<li role="presentation" class="<?php if(isset($_GET['caid'])){if($info['id']==$_GET['caid']){echo "active";}}?>"> 
						<a href="{{ route('home.index','caid='.$info['id']) }}">{{$info['name']}}
						<span class="badge pull-right">{{DB::table('article')->where('category','=',$info['id'])->count()}}</span>
						</a>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="span9 col-md-10 col-md-offset-2">
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