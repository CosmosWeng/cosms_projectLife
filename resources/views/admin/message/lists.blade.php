@extends('layouts.app')

@section('content')

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<div class="panel-heading">留言列表</div>
                <div class="panel-body">
                
            @include('layouts.partials.notification')
           
		    @if (isset($posts))
				        <table class="table table-hover">
				          <thead>
				            <tr class="text-center">
				              <td>編號</td>
				              <td>文章編號</td>
				              <td>類型</td>
				              <td>姓名</td>
				              <td>時間</td>
				              <td>
				              <a class="btn btn-default">動作</a>
				             
				              </td>

				            </tr>
				          </thead>
				          <tbody>

				          	@foreach ($posts as $post)
				          	<tr class="text-center">
				              <td>{{$post['id']}}</td>
				              <td>{{$post['caid']}}</td>
				              <td>{{$post['type']}}</td>
				              <td>{{$post['name']}}</td>
				              <td>{{$post['updated_at']}}</td>
				              <td>
				              	<a href="{{ route('message.edit',$post['id']) }}" class="btn btn-success">编辑</a>
				              	<form id="delform" action="{{ route('message.destroy',$post['id']) }}" method="POST" style="display: inline;">
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