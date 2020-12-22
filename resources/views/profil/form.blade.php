@extends('layouts.admin')

@section('title', 'User')

@section('content_header')
    <h1>Form User</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
	      <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Data Diri</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" id="datadiri" files="true" action="{{ route('update-user', $profil->id) }}" method="post" enctype="multipart/form-data">
                	@csrf
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" value="{{$profil->nama_lengkap}}" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jk" value="{{$profil->jenis_kelamin}}" placeholder="Enter ..." >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="{{$profil->tempat_lahir}}" placeholder="Enter ..." >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="{{$profil->tgl_lahir}}" placeholder="Enter ..." >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Agama</label>
                        <input type="text" class="form-control" name="agama" value="{{$profil->agama}}" placeholder="Enter ..." >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{$profil->alamat}}" placeholder="Enter ..." >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>NIM</label>
                        <input type="text" class="form-control" name="nim" value="{{$profil->nim}}" placeholder="Enter ..." >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" value="{{$profil->jurusan}}" placeholder="Enter ..." >
                      </div>
                    </div>
                  </div>
                                          
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group" >
                        <label>foto</label>
                        
                        @if(isset($profil->foto))
		                  <img  id="output" class="form-control"
		                       src="{{asset('storage/uploads/foto/'.$profil->foto)}}"
		                       alt="User profile picture" style="width: 250px;height: 300px">
		                @else
		                  <img  id="output" class="form-control"
		                       src="{{asset('image/default-user.png')}}"
		                       alt="User profile picture" style="width: 250px;height: 300px">
		                @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>foto <sup class="label label-success">(max 500kb)</sup></label>
                        <input type="file" class="form-control" name="foto" placeholder="Enter ..." accept="image/png, image/jpeg" onchange="loadFile(event)">
                        <p class="text-danger">{{ $errors->first('foto') }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="phone" value="{{$profil->phone}}" placeholder="Enter ..." >
                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" >
                        <label>Tentang anda</label>
                        <textarea class="form-control" rows="3" name="tentang" placeholder="Enter ...">{!!$profil->tentang!!}</textarea>
                      </div>
                    </div>
                  </div>
                  
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Update</button>
                  </form>
              </div>
            </div>
	    </div>	
	</div>

	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sosial Media</h3>
              </div>
              <form role="form" action="{{ route('update_sosmed',$profil->id) }}" method="post">
              	@csrf
                <div class="card-body">
                	<div id="sosmed">
                	@foreach($sosmed as $sosmed)	
                	<div class="row" >
                		<div class="col-sm-2">
			                  <div class="form-group">
			                    <label for="tahun">Sosial Media</label>
			                    <select class="form-control" name="sosial_media[]">
		                          <option value="facebook" {{$sosmed->sosial_media == "facebook" ? 'selected':'' }}>Facebook</option>
		                          <option value="twitter" {{$sosmed->sosial_media == "twitter" ? 'selected':'' }}>Twitter</option>
		                          <option value="linkedin" 
		                          {{$sosmed->sosial_media == "linkedin" ? 'selected':'' }}>Linked in</option>
		                          <option value="instagram" {{$sosmed->sosial_media == "instagram" ? 'selected':'' }}>Instagram</option>
		                        </select>
			                  </div>
			            </div> 
			            <div class="col-sm-5">
			                  <div class="form-group">
			                    <label for="tahun">Link</label>
			                    <input type="input" class="form-control" name="link[]" placeholder="Enter.." value="{{$sosmed->link}}">
			                    <input type="input" class="form-control" hidden name="id[]" placeholder="Enter.." value="{{$sosmed->id}}">
			                  </div>
			            </div>  
			            <div class="col-sm-1">
			            	<div class="form-group">
			            		<label for="tahun">hapus</label>
			            	   	<a href="{{route('del_sosmed', $sosmed->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)">Del</a>
			            	</div>
			            </div>         
	                </div>
	                @endforeach 
	                </div> 
	                <div class="col-sm-2">
	                	<input type="button" class="btn btn-info list_add" value="Tambah" onClick="addInput('sosmed');"><br>
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
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
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
				                    '<label for="tahun">Sosial Media</label>'+
				                    '<select class="form-control" name="sosial_media[]">'+
			                          '<option value="facebook">Facebook</option>'+
			                          '<option value="twitter" >Twitter</option>'+
			                          '<option value="linkedin">Linked in</option>'+
			                          '<option value="instagram" >Instagram</option>'+
			                        '</select>'+
				                  '</div>'+
				            '</div> '+
				            '<div class="col-sm-5">'+
				                  '<div class="form-group">'+
				                    '<label for="tahun">Link</label>'+
				                    '<input type="input" class="form-control" name="link[]" placeholder="Enter.." required>'+
				                  '</div>'+
				            '</div>  '+
				            '<div class="col-sm-1">'+
			            	'<div class="form-group">'+
			            		'<label for="tahun">hapus</label>'+
			            	  '<a class="btn btn-danger btn-sm hapus" data-id="pendidikan_'+ (counter + 1) +'" >Del</a>'+
			            	'</div>'+
			            '</div>'+  
			            '</div>';
	          document.getElementById(divName).appendChild(newdiv);
	          counter++;
	     }
	}
</script>
<script type="text/javascript">
   $(document).on('click','.hapus',function(){
    var tes = $(this).data("id");
    $('.'+tes).remove();
   });
</script>
@endsection