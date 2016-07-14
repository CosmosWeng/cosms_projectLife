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

                    <form action="{{route('article.update',$post) }}" method="POST">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <select name="category" class="selectpicker">
                            @foreach($category_info as $info)
                                @if ($info['id'] == $post->category)
                                <option value="{{$info['id']}}" selected="selected">{{$info['name']}}</option>
                                @else
                                <option value="{{$info['id']}}">{{$info['name']}}</option>
                                @endif
                            @endforeach
                        </select>

                        <br>
                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题" value="{{$post->title}}">
                        <br>
                        <textarea id="content" name="description" rows="10" class="form-control" required="required" placeholder="请输入内容">{{$post->description}}</textarea>
                        <br>
                        <button class="btn btn-sm btn-info pull-right" style="margin:0px 0px 5px 5px;">修改</button>

                        <a href="{{ route('article.index') }}" class="btn btn-sm btn-info pull-right" style="margin:0px 0px 5px 5px;">返回</a>

                        
                        
                       
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('/js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/ckfinder/ckfinder_v1.js') }}"></script>

<script type="text/javascript">

var url = '{{ route('home.index') }}' +'/js';
//alert(url);
//url.replace("admin/", "");

var content = CKEDITOR.replace( 'content',
                    {
                        language: 'zh',
                        height: 450,
                        filebrowserBrowseUrl : url+'/ckfinder/ckfinder.html',
                        filebrowserImageBrowseUrl : url+'/ckfinder/ckfinder.html?type=Images',
                        filebrowserFlashBrowseUrl : url+'/ckfinder/ckfinder.html?type=Flash',
                        filebrowserUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        filebrowserImageUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                    });
           //CKFinder.setupCKEditor( content );

</script>


@endsection