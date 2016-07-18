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


	   		<div id="review">
	   			<h2>訪客留言</h2>
	   			<p>test</p>
	   		</div>
                
                
	   		<div class="col-md-8" id="tab-review">
              <form class="form-horizontal" id="form-review">
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label" for="input-name">Name</label>
                    <input type="text" name="name" value="" id="input-name" class="form-control" />
                  </div>
                </div>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label" for="input-review">tes1</label>
                    <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                    <div class="help-block">test2</div>
                  </div>
                </div>
                <div class="buttons clearfix">
                  <div class="pull-right">
                    <button type="button" id="button-review" data-loading-text="" class="btn btn-primary">送出</button>
                  </div>
                </div>
              
              </form>
            </div>
		</div>
    </div>
  </div>
</div>

@endsection