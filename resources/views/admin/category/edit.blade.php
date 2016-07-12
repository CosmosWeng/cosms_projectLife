@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @include('layouts.partials.notification')

            <div class="panel panel-default">
                <div class="panel-heading">编辑文章</div>
                <div class="panel-body">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{route('category.update',$post) }}" method="POST">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入标题" value="{{$post->name}}">
                        <br>
                        <button class="btn btn-sm btn-info pull-right" style="margin:0px 0px 5px 5px;">修改</button>

                        <a href="{{ route('category.index') }}" class="btn btn-sm btn-info pull-right" style="margin:0px 0px 5px 5px;">返回</a>

                        
                        
                       
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection