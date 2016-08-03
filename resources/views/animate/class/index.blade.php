@extends('layouts.master')
@section('title', 'Animate列表')
@section('content')
<!-- Page Header -->

<header>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
          <ul class="breadcrumb">
           	<li><a href="{{ route('home.index') }}">首頁</a></li>
        	<li><a href="{{ route('article.list') }}">Animate列表</a></li>
          </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>Animate列表</h1>
                    <hr class="small">
                    @if($year!=null)
                    	<h2>{{ $year }}</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</header>

<div id="content">
  <div class="container-fluid">
    <div class="row">
		<div class="nav table-striped pull-left col-md-2">
			<ul class="nav navbar-left table" role="tablist" >
				@foreach($categories as $key => $category)
				<li role="presentation" class="btn"> 
					<a href="{{ route('animate.list').'?year='.$category['key_year']}}">{{$category['key_year']}}</a>
				</li>
				@endforeach
					
			</ul>
	
		</div>
		
		<div class="col-md-10 pull-right">
			<div class="tabbable tabs-left col-md-8">
				<ul class="nav nav-tabs">
		        	<li class="active"><a href="#04" data-toggle="tab">04</a></li>
		        	<li><a href="#07" data-toggle="tab">07</a></li>
		        	<li><a href="#10" data-toggle="tab">10</a></li>
		        	<li><a href="#01" data-toggle="tab">01</a></li>
		        </ul>
		    </div>
		    <div class="tab-content col-md-8">
		    	@if(is_null($year))
					<div class="alert alert-info" role="alert">請選擇年份!</div>
		    	@endif
		    	
				    <div class="tab-pane active" id="04">
		                <div class="list-group clearfix " style="padding:2px">
		                @foreach($posts as $post)
		                	@if($post['key_mon'] == '04')
		                	<a href="#" class="list-group-item" style="margin:2px" data-toggle="modal" data-target="#myModal" onclick="getdata({{ $post['id'] }})"><span class="badge"></span>{{ $post['name_tw'] }}</a>
		                	@endif
		                @endforeach
		                </div>
	                </div>
	                <div class="tab-pane" id="07">
	                	 <div class="list-group">
		                @foreach($posts as $post)
		                	@if($post['key_mon'] == '07')
		                	<a href="#" class="list-group-item" style="margin:2px" data-toggle="modal" data-target="#myModal" onclick="getdata({{ $post['id'] }})"><span class="badge"></span>{{ $post['name_tw'] }}</a>
		                	@endif
		                @endforeach
		                </div>
	                </div>
	                <div class="tab-pane" id="10">
		                <div class="list-group">
		                @foreach($posts as $post)
		                	@if($post['key_mon'] == '10')
		                	<a href="#" class="list-group-item" style="margin:2px" data-toggle="modal" data-target="#myModal" onclick="getdata({{ $post['id'] }})"><span class="badge"></span>{{ $post['name_tw'] }}</a>
		                	@endif
		                @endforeach
		                </div>
	                </div>
	                <div class="tab-pane" id="01">
	                	 <div class="list-group">
		                @foreach($posts as $post)
		                	@if($post['key_mon'] == '01')
		                	<a href="#" class="list-group-item" style="margin:2px" data-toggle="modal" data-target="#myModal" onclick="getdata({{ $post['id'] }})"><span class="badge"></span>{{ $post['name_tw'] }}</a>
		                	@endif
		                @endforeach
		                </div>
	                </div>
			</div>
		</div>
    </div>
  </div>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
              
            </h4>
         </div>
         <div class="modal-body col-md-offset-2" id="myModalcontext">
          
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭
            </button>
         </div>
      </div><!-- /.modal-content -->
</div><!-- /.modal -->

<script type="text/javascript">


	function getdata(obj){
		$.ajax({
				url: "{{ route('animate.getdata') }}",
				type: "GET", 
				data: {'id':obj}, 
				dataType:'json',
				success: function(data){
		        	console.log(data);
		        	//console.log(data[0].name_tw);
		        	var str ='';
		        	str += data[0].broadcast_date + ' <br> ';
		        	str += '<img src="http://www.animen.com.tw' +data[0].image + '" class="img-responsive" alt="Responsive image"> <br> '  ;
		        	str += '<div class="clearfix">';
		        	str +='<textarea readonly  style="margin: 0px; height: 310px; width: 187px; float:left;">'+ data[0].pt_list +'</textarea>';
		        	str +='<textarea readonly style="margin: 0px; height: 310px; width: 187px; float:left;">'+ data[0].cv_list +'</textarea>';
		        	str += '</div>' ;

		        	$('#myModalLabel').text(data[0].name_tw)
		        	$('#myModalcontext').html(str)
		      }
		  	});
	}
</script>

@endsection



