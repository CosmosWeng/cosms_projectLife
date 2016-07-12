@extends('layouts.app')

@section('content')

<!-- Main Content -->
<div class="container">

    <div class="row">

		<div class="span3 bs-docs-sidebar">
			<ul class="nav nav-list bs-docs-sidenav affix">
				<li class="list-group-item"><a href="{{ route('article.index')}}">All</a></li>
			@foreach($categries as $category)
				<li class="list-group-item"><a href="{{ route('article.index','caid='.$category['id'])}}">{{$category['name']}}</a></li>

			@endforeach
			</ul>
		</div>


        <div class="span9 col-md-10 col-md-offset-2">

			<div class="panel-heading">文章列表</div>
                <div class="panel-body">
                
            @include('layouts.partials.notification')
           
		    @if (isset($posts))
				        <table class="table table-hover">
				          <thead>
				            <tr class="text-center">
				              <td>編號</td>
				              <td>類別</td>
				              <td>標題</td>
				              <td>時間</td>
				              <td>
				              <a class="btn btn-default">動作</a>
				              <a href="{{ route('article.create') }}" class="btn btn-primary">新增</a>
				              </td>

				            </tr>
				          </thead>
				          <tbody>

				          	@foreach ($posts as $post)
				          	<tr class="text-center">
				              <td>{{$post['id']}}</td>
				              <td>{{$post['category']}}</td>
				              <td>{{$post['title']}}</td>
				              <td>{{$post['updated_at']}}</td>
				              <td>
				              	<a href="{{ route('article.edit',$post['id']) }}" class="btn btn-success">编辑</a>
				              	<form id="delform" action="{{ route('article.destroy',$post['id']) }}" method="POST" style="display: inline;">
		                            {{ method_field('DELETE') }}
		                            {{ csrf_field() }}
				              		<button id="delbtn" type="submit" class="btn btn-danger">刪除</button>
				              	</form>
				              	
				              </td>
				            </tr>
							@endforeach
				          </tbody>
				        </table>
				        <!-- Pager -->
	            <div class="text-center">
	                {!! $posts->render() !!}
	            </div>
		    @endif
		    	</div>
        	</div>
        </div>
    </div>
</div>



@endsection