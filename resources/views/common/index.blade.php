@extends('layouts.master')
@section('title', '首頁')
@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<!-- Main Content -->


<div class="more-reviews" style="background:#FFBB66;padding:3em 0;">
    <ul id="flexiselDemo2">
      @foreach ($images_filename as $image_filename)
        <li><a href="{{$image_filename["pixv"]}}" target="pixv"><img src="{{$image_filename["url"]}}" alt="{{$image_filename["filename"]}}"/></a></li>
      @endforeach
    </ul>
</div>
<script type="text/javascript">
  $(window).load(function() {
    $("#flexiselDemo2").flexisel({
      visibleItems: 6,
      animationSpeed: 3000,
      autoPlay: true,
      autoPlaySpeed: 600,        
      pauseOnHover: false,
      enableResponsiveBreakpoints: true,
      responsiveBreakpoints: { 
        portrait: { 
          changePoint:480,
          visibleItems: 2
        }, 
        landscape: { 
          changePoint:640,
          visibleItems: 3
        },
        tablet: { 
          changePoint:768,
          visibleItems: 3
        }
      }
    });
  });
</script>

<div id="content">

  <div class="page-header">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li><a href="#">首頁</a></li>
      </ul>
    </div>
  </div>
    
    

  <div class="container">
    <div class="row">
    <h1 class="text-center">Cosmos'Blog (網站建置中...)</h1>
        <div class="col-lg-8 col-md-10">
          <h4>更新日誌</h4>
          <p>{!!$txt_log!!}</p> 

      </div>
      
    </div>
  </div>


@endsection