@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @include('layouts.partials.notification')
            <div class="panel panel-default">
                <div class="panel-heading">內容編輯</div>
                <div class="panel-body">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    
					<br>
                    <form action="{{route('animate.update',$post) }}" method="POST">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <table class="table">
                            <tr>
                                <td><input type="text" name="key_year" class="form-control" required="required" placeholder="请输入年份" value="{{$post->key_year}}"></td>
                                <td><input type="text" name="key_mon" class="form-control" required="required" placeholder="请输入月期" value="{{$post->key_mon}}"></td>
                            </tr>
                            <tr>
                                <td>作品名稱(中文):</td>
                                <td><input type="text" name="name_tw" class="form-control" required="required" placeholder="请输入作品名稱" value="{{$post->name_tw}}"></td>
                            </tr>
                            <tr>
                                <td>作品名稱(日文):</td>
                                <td><input type="text" name="name_jp" class="form-control" placeholder="请输入作品名稱" value="{{$post->name_jp}}"></td>
                            </tr>
                            <tr>
                                <td>預覽圖:</td>
                                <td><input type="text" name="image" class="form-control" placeholder="请输入預覽圖" value="{{$post->image}}"></td>
                            </tr>
                            <tr>
                                <td>播放日:</td>
                                <td><input type="text" name="broadcast_date" class="form-control" value="{{$post->broadcast_date}}"></td>
                            </tr>
                            <tr>
                                <td>描述:</td>
                                <td><textarea id="content" rows="10" class="form-control" name="description" class="form-control" placeholder="簡述">{{$post->description}}</textarea></td>
                            </tr>
                            <tr>
                                <td>製作團隊:</td>
                                <td><textarea id="content1" rows="10" class="form-control" name="pt_list" class="form-control">{{$post->pt_list}}</textarea></td>
                            </tr>
                            <tr>
                                <td>聲優表:</td>
                                <td><textarea id="content2" rows="10" class="form-control" name="cv_list" class="form-control">{{$post->cv_list}}</textarea></td>
                            </tr>
                        </table>

                        <button class="btn btn-sm btn-info pull-right" style="margin:0px 0px 5px 5px;">修改</button>

                        <a href="{{ route('animate.index') }}" class="btn btn-sm btn-info pull-right" style="margin:0px 0px 5px 5px;">返回</a>
                       
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

CKEDITOR.replace('content',
                    {
                        language: 'zh',
                        weight:800,
                        height: 450,
                        filebrowserBrowseUrl : url+'/ckfinder/ckfinder.html',
                        filebrowserImageBrowseUrl : url+'/ckfinder/ckfinder.html?type=Images',
                        filebrowserFlashBrowseUrl : url+'/ckfinder/ckfinder.html?type=Flash',
                        filebrowserUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        filebrowserImageUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                    });
CKEDITOR.replace('content1',
                    {
                        language: 'zh',
                        weight:800,
                        height: 450,
                        filebrowserBrowseUrl : url+'/ckfinder/ckfinder.html',
                        filebrowserImageBrowseUrl : url+'/ckfinder/ckfinder.html?type=Images',
                        filebrowserFlashBrowseUrl : url+'/ckfinder/ckfinder.html?type=Flash',
                        filebrowserUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        filebrowserImageUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                    });
CKEDITOR.replace('content2',
                    {
                        language: 'zh',
                        weight:800,
                        height: 450,
                        filebrowserBrowseUrl : url+'/ckfinder/ckfinder.html',
                        filebrowserImageBrowseUrl : url+'/ckfinder/ckfinder.html?type=Images',
                        filebrowserFlashBrowseUrl : url+'/ckfinder/ckfinder.html?type=Flash',
                        filebrowserUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        filebrowserImageUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl : url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                    });

</script>

@endsection