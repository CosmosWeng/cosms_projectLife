@extends('layouts.app')

@section('content')

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<div class="panel-heading">動畫列表列表</div>
                <div class="panel-body">
                
            @include('layouts.partials.notification')

            	<form action="{{route('animate.post')}}" method="POST">
            	{{ csrf_field() }}
            		<table>
	            		<thead>
	            			<tr>功能選單</tr>
	            		</thead>
	            		<tbody>
	            			<tr>
	            				<td><a type="button" class="btn btn-default" onclick="$('#import_cotent').attr('style','');">匯入</a></td>
	            				<td id="import_cotent" style="display:none;">
	            					<input type="text" name="html" size="64">
	            					<input type="submit">
	            					<a type="button" class="btn btn-default" onclick="$('#import_cotent').attr('style','display:none;');">X</a>
	            				</td>
	            			</tr>
	            			<tr></tr>
	            		</tbody>
	            	</table>

	            	<table>
	            		<thead>
	            			<tr>
	            				<td>年分</td>
	            				<td>季度</td>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			<tr>
	            				<td><a type="button" class="btn btn-default">2016</a></td>
	            				<td>
	            					<div class="btn-group" data-toggle="buttons">
									  <label class="btn btn-default">
									    <input type="checkbox" autocomplete="off" name="2016_mon[]" value="04">春(4月)
									  </label>

									  <label class="btn btn-default">
									    <input type="checkbox" autocomplete="off" name="2016_mon[]" value="07">夏(7月)
									  </label>

									  <label class="btn btn-default">
									    <input type="checkbox" autocomplete="off" name="2016_mon[]" value="10">秋(10月)
									  </label>

									  <label class="btn btn-default">
									    <input type="checkbox" autocomplete="off" name="2016_mon[]" value="01">冬(1月)
									  </label>

									</div>
	            				</td>
	            			</tr>
	            			<tr></tr>
	            		</tbody>
	            		<tfoot>
	            			<tr>
	            				
	            			</tr>
	            		</tfoot>
	            	</table>
	            	<button >submit</button>
            	</form>
            
            	
           
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