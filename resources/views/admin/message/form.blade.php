@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @include('layouts.partials.notification')

            <div class="panel panel-default">
                <div class="panel-heading">留言訊息</div>
                <div class="panel-body">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <table>
                        <tr>
                            <td>姓名 :</td>
                            <td>{{$post->name}}</td>
                        </tr>
                        <tr>
                            <td>時間 :</td>
                            <td>{{$post->created_at}}</td>
                        </tr>
                         <tr>
                            <td>信箱 :</td>
                            <td>{{$post->email}}</td>
                        </tr>
                        <tr>
                            <td>內容 :</td>
                            <td>{{$post->description}}</td>
                        </tr>
                    </table>
					<br>
                    <form action="{{route('message.update',$post) }}" method="POST">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <table>
                        <tr>
                        	<td>狀態 :</td>
                        	<td>
                        		<select name="status">
		                        	@if($post['status'])
		                        		<option value="1" selected="selected">開起</option>
		                        		<option value="0"> 關閉</option>
		                        	@else
		                        		<option value="1">開起</option>
		                        		<option value="0" selected="selected">關閉</option>
		                        	@endif
		                        </select>
                        	</td>
                        </tr>

                        <tr>
                        	<td>回覆 :</td>
                        	<td>
                        		<textarea name="reply">{{$post->reply}}</textarea>
                        	</td>
                        </tr>
                        </table>
                       

                        <button class="btn btn-sm btn-info pull-right" style="margin:0px 0px 5px 5px;">修改</button>

                        <a href="{{ route('message.index') }}" class="btn btn-sm btn-info pull-right" style="margin:0px 0px 5px 5px;">返回</a>
                       
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection