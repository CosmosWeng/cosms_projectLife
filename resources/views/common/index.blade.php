@extends('layouts.master')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<!-- Main Content -->
<div class="container">
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
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @include('layouts.partials.notification')
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


@endsection