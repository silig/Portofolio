@extends('layouts.admin')

@section('title', 'User')

@section('content_header')
    <h1>Form User</h1>
@stop

@section('content')
	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Prestasi</h3>
              </div>
              <form role="form" action="{{route('update_prestasi', $profil->id) }}" method="post">
              	@csrf
                <div class="card-body">
                	@include('widgets.error')
                	@include('widgets.message')
                	<div id="prestasi">
                	@forelse($prestasi as $prestasi)	
                	<div class="row" >
                		<div class="col-sm-3">
			                  <div class="form-group">
			                    <label for="tahun">Tahun</label>
			                    <input type="input" class="form-control" name="tahun[]" placeholder="Enter.." value="{{$prestasi->tahun}}">
			                    <input type="input" class="form-control" name="id[]" placeholder="Enter.." value="{{$prestasi->id}}" hidden="">
			                  </div>
			            </div> 
			            <div class="col-sm-8">
			                  <div class="form-group">
			                    <label for="tahun">Prestasi</label>
			                    <input type="input" class="form-control" name="prestasi[]" placeholder="Enter.." value="{{$prestasi->prestasi}}">
			                  </div>
			            </div>
			            <div class="col-sm-1">
			            	<div class="form-group">
			            		<label for="tahun">hapus</label>
			            	   	<a href="{{route('del_prestasi', $prestasi->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)">Del</a>
			            	</div>
			            </div>         
	                </div>
	                @empty
	                <div class="row" >
                		<div class="col-sm-3">
			                  <div class="form-group">
			                    <label for="tahun">Tahun</label>
			                    <input type="input" class="form-control" name="tahun[]" placeholder="Enter..">
			                    <input type="input" class="form-control" name="id[]" placeholder="Enter.."  hidden="">
			                  </div>
			            </div> 
			            <div class="col-sm-8">
			                  <div class="form-group">
			                    <label for="tahun">Prestasi</label>
			                    <input type="input" class="form-control" name="prestasi[]" placeholder="Enter.." >
			                  </div>
			            </div>  
			                    
	                </div>
	                @endforelse 
	                </div> 
	                <div class="col-sm-2">
	                	<input type="button" class="btn btn-info list_add" value="Tambah" onClick="addInput('prestasi');"><br>
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
	          			
	          			'<div class="row pengalaman_'+ (counter + 1) +'">'+
		          			'<div class="col-sm-3">'+
			                  '<div class="form-group">'+
			                    '<label for="tahun">Tahun</label>'+
			                    '<input type="input" class="form-control" name="tahun[]" placeholder="Enter..">'+
			                    '<input type="input" class="form-control" name="id[]" placeholder="Enter.." hidden>'+
			                  '</div>'+
				            '</div> '+
				            '<div class="col-sm-8">'+
				                  '<div class="form-group">'+
				                    '<label for="tahun">Prestasi</label>'+
				                    '<input type="input" class="form-control" name="prestasi[]" placeholder="Enter..">'+
				                  '</div>'+
				            '</div>  '+
				            '<div class="col-sm-1">'+
			            	'<div class="form-group">'+
			            		'<label for="tahun">hapus</label>'+
			            	'<a href="{{route("del_pengalaman", "null") }}" class="btn btn-danger btn-sm" onclick="confirmation(event)">Del</a>'+
			            	'</div>'+
			            '</div>'+  
			            '</div>';
	          document.getElementById(divName).appendChild(newdiv);
	          counter++;
	     }
	}
</script>
@endsection