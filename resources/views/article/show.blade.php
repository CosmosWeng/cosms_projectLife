@extends('layouts.master')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<!-- Main Content -->
<div class="container">
	<a href="{{ route('article.list') }}" class="btn btn-primary">返回</a>
    <div class="row">
    	<div class="nav">
	       	<ul class=" navbar-left bs-docs-sidebar affix" role="tablist" >
	       	<li><a href="{{ route('home.index') }}">All<span class="badge">{{DB::table('article')->count()}}</span></a></li>
				@foreach ($category_info as $info)
					<li role="presentation" <?php if(isset($_GET['caid'])){if($info['id']==$_GET['caid']){echo "class='active'";}}?>> 
						<a href="{{ route('home.index','caid='.$info['id']) }}">{{$info['name']}}
						<span class="badge">{{DB::table('article')->where('category','=',$info['id'])->count()}}</span>
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
				{{ $post->description }}
				</div>
	   		</article>
		</div>

    </div>
</div>

@endsection