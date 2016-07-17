@extends('layouts.master')
@section('title', '首頁')
@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<!-- Main Content -->


<div class="more-reviews" style="background:#FFBB66;padding:3em 0;">
    <ul id="flexiselDemo2">
      @foreach ($images_filename as $image_filename)
        <li><img src="img/images/{{$image_filename}}" alt=""/></li>
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
    
    

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6"> 網站建置中...</div>
    </div>
  </div>
</div>


@endsection