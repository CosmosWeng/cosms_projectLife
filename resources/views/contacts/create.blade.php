@extends('layouts.master')

@section('title', '聯絡')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li><a href="{{ route('home.index') }}">首頁</a></li>
            <li><a href="#">聯絡方式</a></li>
          </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>聯絡方式</h1>
                    <hr class="small">
                    <span class="subheading">有任何問題嗎？歡迎留言給我！</span>
                </div>
            </div>
        </div>
    </div>
</div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        
            @include('layouts.partials.notification')

            <p>請填寫以下表單，我們會儘快回覆您的！</p>
            {!! Form::open(['route' => 'contacts.store', 'method' => 'POST', 'id' => 'contactForm', 'name' => 'sentMessage', 'novalidate']) !!}
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        {!! Form::label('name', '姓名') !!}
                        {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => '姓名', 'data-validation-required-message' => '請輸入姓名', 'required']) !!}
                        <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        {!! Form::label('email', '電子郵件') !!}
                        {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => '電子郵件', 'data-validation-required-message' => '請輸入電子郵件', 'required']) !!}
                        <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        {!! Form::label('message', '想說的話') !!}
                        {!! Form::textarea('message', null, ['id' => 'message', 'row' => 5, 'class' => 'form-control', 'placeholder' => '想說的話', 'data-validation-required-message' => '請輸入想說的話', 'required']) !!}
                        <p class="help-block text-danger">{{ $errors->first('message') }}</p>
                        {!! app('captcha')->display(); !!}
                    </div>

                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">

                        <button type="submit" class="btn btn-default">送出</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection