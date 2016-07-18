@extends('layouts.master')
@section('title', '文章列表')
@section('content')
<!-- Page Header -->

<header>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
          <ul class="breadcrumb">
           	<li><a href="{{ route('home.index') }}">首頁</a></li>
        	<li><a href="{{ route('article.list') }}">文章列表</a></li>
          </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>文章列表</h1>
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
		<div class="nav table-striped pull-left col-md-2">
			<ul class="nav navbar-left" role="tablist" >
				<li ><a href="{{ route('article.list') }}" class="btn">All<span class="badge pull-right">{{DB::table('article')->count()}}</span></a></li>
					@foreach ($category_info as $info)
					<li role="presentation" class="<?php if(isset($_GET['caid'])){if($info['id']==$_GET['caid']){echo "active";}}?>"> 
						<a href="{{ route('article.list','caid='.$info['id']) }}">{{$info['name']}}
						<span class="badge pull-right">{{DB::table('article')->where('category','=',$info['id'])->count()}}</span>
						</a>
					</li>
					@endforeach
			</ul>
	
		</div>
		<div class="col-md-10 pull-right">
			<div>
			<section class="widget news news-4 ">						
					

					<table class="table table-striped">
						<thead>
							<td>標題</td>
							<td>時間</td>
						</thead>
						<tbody>
						@foreach ($article_info as $info)
							<tr>
								<td><h3><a href="{{ route('article.detail',$info['id']) }}">{{$info['title']}}</a></h3></td>
								<td><div>{{$info['updated_at']}}</div></td>
							</tr>
							
		                @endforeach
		                </tbody>
		            </table>
			</section>
		<div class="text-center">
		        {!! $article_info->render() !!}
		    </div>
		</div>
		</div>
    </div>
  </div>
</div>
@endsection



