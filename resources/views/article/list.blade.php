@extends('layouts.master')

@section('content')
<!-- Page Header -->
<div id="content">

  <div class="page-header">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li><a href="#">test</a></li>

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
		<div class="col-lg-3 col-md-3 col-sm-6 col-md-offset-2">
			<div>
			<section class="widget news news-4 ">						
					<div class="grid">
					<table class="table">
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
					</div>
					
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



