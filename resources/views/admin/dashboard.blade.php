@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <div class="alert alert-success">
			<marquee>Halloo <b>{{Auth::user()->name}}</b>! Selamat datang di web sistem informasi portofolio </marquee>
	</div>
@stop

@section('content')
    <div class="row">
    	<div class="card col-md-12">
    		<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Panduan!</h5>
                  Cukup dengan mengisi data di menu profile, dan kemudian cetak!
            </div>
	    	<div class="card-body" style="text-align: center;">
	    		<img src="{{asset('image/Undip.png')}}" style="width: 200px;height: 230px">
	    		<p><h3>Fakultas Teknik</h3></p>
	    		<p><h3>Universitas Diponegoro</h3></p>
	    	</div>
	    </div>
	</div>
@stop