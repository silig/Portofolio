@extends('layouts.admin')

@section('title', 'User')

@section('content_header')
    <h1>Form User</h1>
@stop

@section('content')
	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pendidikan</h3>
              </div>
              <form role="form" action="{{route('update_pendidikan', $profil->id) }}" method="post">
              	@csrf
                <div class="card-body">
                	@include('widgets.error')
                	@include('widgets.message')
                	<div id="pendidikan">
                	@forelse($pendidikan as $pendidikan)	
                	<div class="row" >
                		<div class="col-sm-2">
			                  <div class="form-group">
			                    <label for="tahun">tahun mulai</label>
			                    <input type="input" class="form-control" name="tahun_mulai[]" placeholder="Enter.." value="{{$pendidikan->tahun_mulai}}">
			                    <input type="input" class="form-control" name="id[]" placeholder="Enter.." value="{{$pendidikan->id}}" hidden="">
			                  </div>
			            </div> 
			            <div class="col-sm-2">
			                  <div class="form-group">
			                    <label for="tahun">tahun selesai</label>
			                    <input type="input" class="form-control" name="tahun_selesai[]" placeholder="Enter.." value="{{$pendidikan->tahun_selesai}}">
			                  </div>
			            </div>  
			            <div class="col-sm-4">
			                  <div class="form-group">
			                    <label for="tahun">Nama Instansi</label>
			                    <input type="input" class="form-control" name="institusi[]" placeholder="Enter.." value="{{$pendidikan->institusi}}">
			                  </div>
			            </div>
			            <div class="col-sm-3">
			                  <div class="form-group">
			                    <label for="tahun">Jurusan</label>
			                    <input type="input" class="form-control" name="jurusan[]" placeholder="Enter.." value="{{$pendidikan->nama_jurusan}}">
			                  </div>
			            </div>  
			            <div class="col-sm-1">
			            	<div class="form-group">
			            		<label for="tahun">hapus</label>
			            	   	<a href="{{route('del_pendidikan', $pendidikan->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)">Del</a>
			            	</div>
			            </div>         
	                </div>
	                @empty
	                <div class="row" >
                		<div class="col-sm-2">
			                  <div class="form-group">
			                    <label for="tahun">tahun mulai</label>
			                    <input type="input" class="form-control" name="tahun_mulai[]" placeholder="Enter.." >
			                    <input type="input" class="form-control" name="id[]" placeholder="Enter.."  hidden="">
			                  </div>
			            </div> 
			            <div class="col-sm-2">
			                  <div class="form-group">
			                    <label for="tahun">tahun selesai</label>
			                    <input type="input" class="form-control" name="tahun_selesai[]" placeholder="Enter.." >
			                  </div>
			            </div>  
			            <div class="col-sm-4">
			                  <div class="form-group">
			                    <label for="tahun">Nama Instansi</label>
			                    <input type="input" class="form-control" name="institusi[]" placeholder="Enter.." >
			                  </div>
			            </div>
			            <div class="col-sm-3">
			                  <div class="form-group">
			                    <label for="tahun">Jurusan</label>
			                    <input type="input" class="form-control" name="jurusan[]" placeholder="Enter.." >
			                  </div>
			            </div>        
	                </div>
	                @endforelse
	                </div> 
	                <div class="col-sm-2">
	                	<input type="button" class="btn btn-info list_add" value="Tambah" onClick="addInput('pendidikan');"><br>
	                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
    </div>
@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
<script type="text/javascript">
	var counter = 1;
	var limit = 5;
	function addInput(divName){
	     if (counter == limit)  {
	          alert("You have reached the limit of adding " + counter + " inputs");
	     }
	     else {
	          var newdiv = document.createElement('div');
	          newdiv.innerHTML = 
	          			
	          			'<div class="row pendidikan_'+ (counter + 1) +'">'+
		          			'<div class="col-sm-2">'+
			                  '<div class="form-group">'+
			                    '<label for="tahun">tahun mulai</label>'+
			                    '<input type="input" class="form-control" name="tahun_mulai[]" placeholder="Enter..">'+
			                    '<input type="input" class="form-control" name="id[]" placeholder="Enter.." hidden>'+
			                  '</div>'+
				            '</div> '+
				            '<div class="col-sm-2">'+
				                  '<div class="form-group">'+
				                    '<label for="tahun">tahun selesai</label>'+
				                    '<input type="input" class="form-control" name="tahun_selesai[]" placeholder="Enter..">'+
				                  '</div>'+
				            '</div>  '+
				            '<div class="col-sm-4">'+
				                  '<div class="form-group">'+
				                    '<label for="tahun">Nama Instansi</label>'+
				                    '<input type="input" class="form-control" name="institusi[]" placeholder="Enter..">'+
				                  '</div>'+
				            '</div>'+
				            '<div class="col-sm-3">'+
				                  '<div class="form-group">'+
				                    '<label for="tahun">Jurusan</label>'+
				                    '<input type="input" class="form-control" name="jurusan[]" placeholder="Enter..">'+
				            	  '</div>'+
			            	'</div>'+
				            '<div class="col-sm-1">'+
			            	'<div class="form-group">'+
			            		'<label for="tahun">hapus</label>'+
			            	'<a href="{{route("del_pendidikan", "null") }}" class="btn btn-danger btn-sm" onclick="confirmation(event)">Del</a>'+
			            	'</div>'+
			            '</div>'+  
			            '</div>';
	          document.getElementById(divName).appendChild(newdiv);
	          counter++;
	     }
	}
</script>
@endsection