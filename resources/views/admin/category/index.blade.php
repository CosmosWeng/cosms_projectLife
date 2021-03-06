@extends('layouts.app')

@section('content')

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<div class="panel-heading">類別列表</div>
                <div class="panel-body">
                
            @include('layouts.partials.notification')
           
		    @if (isset($posts))
				        <table class="table table-hover">
				          <thead>
				            <tr class="text-center">
				              <td>編號</td>
				              <td>標題</td>
				              <td>時間</td>
				              <td>
				              <a class="btn btn-default">動作</a>
				              <a href="{{ route('category.create') }}" class="btn btn-primary">新增</a>
				              </td>

				            </tr>
				          </thead>
				          <tbody>

				          	@foreach ($posts as $post)
				          	<tr class="text-center">
				              <td>{{$post['id']}}</td>
				              <td>{{$post['name']}}</td>
				              <td>{{$post['updated_at']}}</td>
				              <td>
				              	<a href="{{ route('category.edit',$post['id']) }}" class="btn btn-success">编辑</a>
				              	<form id="delform" action="{{ route('category.destroy',$post['id']) }}" method="POST" style="display: inline;">
		                            {{ method_field('DELETE') }}
		                            {{ csrf_field() }}
				              		<button type="submit" class="btn btn-danger">刪除</button>
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