@extends('layouts.app')

@section('content')

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<div class="panel-heading">動畫列表列表</div>
                <div class="panel-body">
                
            @include('layouts.partials.notification')

            	<form action="{{route('animate.post')}}" method="get">
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
	            </form>
	            <form action="{{route('animate.post')}}" method="get">
	            {{ csrf_field() }}
	            	<table>
	            		<thead>
	            			<tr>
	            				<td>年分</td>
	            				<td>季度</td>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			@foreach($category as $key => $ca)

	            			<tr>
	            				<td><a type="button" class="btn btn-default">{{ $ca['key_year'] }}</a></td>
	            				<td>
	            					<div class="btn-group" data-toggle="buttons">
									  <label class="btn btn-default <?php if(isset($list_array[$ca['key_year']])){ echo (in_array('04', $list_array[$ca['key_year']]))?'active':'';} ?>">
									    <input type="checkbox" autocomplete="off" name="list[{{ $ca['key_year'] }}][]" value="04" <?php if(isset($list_array[$ca['key_year']])){ echo (in_array('04', $list_array[$ca['key_year']]))?'checked="checked"':'';} ?>>春(4月)
									  </label>
									  <label class="btn btn-default <?php if(isset($list_array[$ca['key_year']])){ echo (in_array('07', $list_array[$ca['key_year']]))?'active':'';} ?>">
									    <input type="checkbox" autocomplete="off" name="list[{{ $ca['key_year'] }}][]" value="07" <?php if(isset($list_array[$ca['key_year']])){ echo (in_array('07', $list_array[$ca['key_year']]))?'checked="checked"':'';} ?>>夏(7月)
									  </label>
									  <label class="btn btn-default <?php if(isset($list_array[$ca['key_year']])){ echo (in_array('10', $list_array[$ca['key_year']]))?'active':'';} ?>">
									    <input type="checkbox" autocomplete="off" name="list[{{ $ca['key_year'] }}][]" value="10" <?php if(isset($list_array[$ca['key_year']])){ echo (in_array('10', $list_array[$ca['key_year']]))?'checked="checked"':'';} ?>>秋(10月)
									  </label>
									  <label class="btn btn-default <?php if(isset($list_array[$ca['key_year']])){ echo (in_array('01', $list_array[$ca['key_year']]))?'active':'';} ?>">
									    <input type="checkbox" autocomplete="off" name="list[{{ $ca['key_year'] }}][]" value="01" <?php if(isset($list_array[$ca['key_year']])){ echo (in_array('01', $list_array[$ca['key_year']]))?'checked="checked"':'';} ?>>冬(1月)
									  </label>

									</div>
	            				</td>
	            			</tr>
	            			@endforeach

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
				              <td>年度</td>
				              <td>季度</td>
				              <td>名稱</td>
				              <td>播放日</td>
				              <td>
				              <a class="btn btn-default">動作</a>
				             
				              </td>

				            </tr>
				          </thead>
				          <tbody>

				          	@foreach ($posts as $post)
				          	<tr class="text-center">
				              <td>{{$post['id']}}</td>
				              <td>{{$post['key_year']}}</td>
				              <td>{{$post['key_mon']}}</td>
				              <td>{{$post['name_tw']}}</td>
				              <td>{{$post['broadcast_date']}}</td>
				              <td>
				              	<a href="{{ route('animate.edit',$post['id']) }}" class="btn btn-success">编辑</a>
				              	<form id="delform" action="{{ route('animate.destroy',$post['id']) }}" method="POST" style="display: inline;">
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
	                {!! $paginations !!}
	            </div>
		    
		        @else
		        <div class="alert alert-info">請選擇 年份 月期 !! </div>
			    @endif
		    	</div>
        	</div>
        </div>
    </div>
</div>


@endsection