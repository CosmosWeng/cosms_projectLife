@extends('layouts.master')
@section('title',$post->title)
@section('content')
<!-- Page Header -->

<header>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>{{ $post->title }}</h1>
                    <hr class="small">
                    <h2>{{ $post->updated_at }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
</header>

<div id="content">
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
      <br>
      <br>
	   		<article>
	   			<div class="typography">
				{!! $post->description !!}
				  </div>
	   		</article>
            <br>
            <br>

	   		<div id="review">
	   			<h2>留言版</h2>

          @foreach ($replies as $reply)
            @if($reply['status'])
            <table>
              <tr>{{$reply['created_at']}}</tr>
              <tr>
                <td>{{$reply['name']}} :</td>
                <td>{{$reply['description']}}</td>
              </tr>
              @if(!empty($reply['reply']))
              <tr>
                <td>回覆:</td>
                <td> {{$reply['reply']}}</td>
              </tr>
              @endif
            </table>
            <br>
            <br>
            @endif
          @endforeach
     
	   			
	   		</div>
                
                
	   		<div class="col-md-8" id="tab-review">
         @include('layouts.partials.notification')

               <form action="{{route('message.store')}}" method="POST" class="form-horizontal" id="form-review">
                {{ csrf_field()}}
                <input type="hidden" name="caid" value="{{$post->id}}">
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label" for="input-name">姓名</label>
                    <input type="text" name="name" value="" id="input-name" class="form-control" />
                  </div>
                </div>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label" for="input-review">內容</label>
                    <textarea name="description" rows="5" id="input-review" class="form-control"></textarea>
                  </div>
                </div>


                <div class="buttons clearfix">
                  <div class="pull-right">
                  {!! app('captcha')->display(); !!}
                        <button class="btn btn-sm btn-info pull-right" style="margin:0px 0px 5px 5px;">提交</button>
                  </div>
                </div>
              
              </form>
            </div>
		</div>
    </div>
  </div>
</div>

@endsection