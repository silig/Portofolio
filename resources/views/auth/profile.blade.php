@extends('layouts.admin')

@section('title', 'User Profile')



@section('content_header')
    <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('download', $datadiri->id) }}" class="btn btn-block btn-primary btn-sm">Preview</a></li>
            </ol>
          </div>
    </div>

@stop

@section('content')
	<div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if(isset($datadiri->foto))
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('storage/uploads/foto/'.$datadiri->foto)}}"
                       alt="User profile picture">
                  @else
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('image/default-user.png')}}"
                       alt="User profile picture">
                  @endif
                </div>

                <h3 class="profile-username text-center">{!!isset($datadiri->nama_lengkap) ? $datadiri->nama_lengkap: '('.$profile->name.')<span class="badge badge-danger right">default username</span>'!!}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Tempat lahir</b> <a class="float-right">{!!isset($datadiri->tempat_lahir) ? $datadiri->tempat_lahir : "<p style='background: red'>belum diisi</p>"!!}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tanggal lahir</b> <a class="float-right">{!!isset($datadiri->tgl_lahir) ? $datadiri->tgl_lahir : "<p style='background: red'>belum diisi</p>"!!}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Jenis Kelamin</b> <a class="float-right">{!!isset($datadiri->jenis_kelamin) ? $datadiri->jenis_kelamin : "<p style='background: red'>belum diisi</p>"!!}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Agama</b> <a class="float-right">{!!isset($datadiri->agama) ? $datadiri->agama : "<p style='background: red'>belum diisi</p>"!!}</a>
                  </li>
                </ul>

                <a href="{{route('form-user', $datadiri->id) }} " class="btn btn-primary btn-block"><b>Edit</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Jurusan</strong>

                <p class="text-muted">
                  {!!isset($datadiri->jurusan) ? $datadiri->jurusan : "<p style='background: red'>belum diisi</p>"!!}
                </p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> NIM</strong>

                <p class="text-muted">
                 {!!isset($datadiri->nim) ? $datadiri->nim : "<p style='background: red'>belum diisi</p>"!!}
                </p>

                <hr>                

              </div>
              <!-- /.card-body -->
            </div>

            <!-- Contact Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informasi kontak</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-phone mr-1"></i> Telepon</strong>

                <p class="text-muted">
                  {!!isset($datadiri->phone) ? $datadiri->phone : "<p style='background: red'>belum diisi</p>"!!}
                </p>

                <hr>

                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                <p class="text-muted">
                  {!!isset($profile->email) ? $profile->email : "<p style='background: red'>belum diisi</p>"!!}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted">
                  {!!isset($datadiri->alamat) ? $datadiri->alamat : "<p style='background: red'>belum diisi</p>"!!}</p>

                <hr>

                <strong><i class="fas fa-link mr-1"></i> Sosial Media</strong>

                <p class="text">
                    <ul>
                      @forelse($sosmed as $sosmed)
                          @php
                          $removeChar = ["https://", "http://"];
                          $result = str_replace($removeChar, "", $sosmed->link);
                          @endphp
                          <li><a href="{{$sosmed->link}}">{{$result}}</a></li>
                          
                      @empty
                        <p style='background: red'>belum diisi</p>
                      @endforelse
                    </ul>
                </p>

                <hr>

                

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#datadiri" data-toggle="tab">Data Diri</a></li>
                  <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Info Akun</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class=" tab-pane" id="activity">
                    <!-- konten -->
                    <div class="row">
          						<div class="col-md-6">
          							<div class="callout callout-info">
          								<h5>Username</h5>
          								<p>{{$profile->name}}</p>
          							</div>
          						</div>
          						<div class="col-md-6">
          							<div class="callout callout-info">
          								<h5>Email</h5>
          								<p>{{$profile->email}}</p>
          							</div>
          						</div>
          					</div>
          					<div class="row">
          						<div class="col-md-6">
          							<div class="callout callout-info">
          								<h5>User level</h5>
          								<p>{{$profile->role->name}}</p>
          							</div>
          						</div>
          					</div>
                    <!-- /.konten -->
                  </div>
                  
                  <div class="active tab-pane" id="datadiri">
                    
                    <div class="card card-inverse">
                      
                        <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-address-card"></i>
                          <b>Tentang Saya</b></h3>
                        </div>
                      <div class="callout callout-danger">
                        <div class="card-body">
                          
                            {!!isset($datadiri->tentang) ? $datadiri->tentang : "<a style='background: red'>belum diisi</a>"!!}
                          
                        </div>
                      </div>
                    </div>
                    

                    <div class="card card-inverse">
                      
                        <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-university"></i>
                          <strong>Riwayat Pendidikan</strong></h3>
                        </div>
                      <div class="callout callout-danger">
                        <div class="card-body">
                          <ul>
                            @foreach($pendidikan as $pendidikan)
                              <li>{{$pendidikan->tahun_mulai}} - {{$pendidikan->tahun_selesai}} - {{$pendidikan->nama_jurusan.' '.$pendidikan->institusi}}</li>
                            @endforeach
                          </ul>  
                        </div>
                      </div>
                      
                          <a href="{{route('form-pendidikan', $datadiri->id) }} " class="btn btn-primary"><b>Edit</b></a>
                      
                    </div>
                    

                    <div class="card card-inverse">
                      
                        <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-briefcase"></i>
                          <b>Pengalaman</b></h3>
                        </div>
                      <div class="callout callout-danger">
                        <div class="card-body">
                          <ul>
                            @forelse($pengalaman as $pengalaman)
                              <li><b>{{$pengalaman->pengalaman}}</b></li><br>
                              <p>{{$pengalaman->penjelasan}}</p>
                            @empty 
                              <a style="background: red">Belum diisi</a> 
                            @endforelse
                          </ul>
                        </div>
                      </div>
                    
                          <a href="{{route('form-pengalaman', $datadiri->id) }} " class="btn btn-primary"><b>Edit</b></a>
                      
                    </div>
                    
                    <div class="card card-default">
                      
                        <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-medal"></i>
                          <b>Prestasi</b></h3>
                        </div>
                      <div class="callout callout-danger">  
                        <div class="card-body">
                          <ul>
                            @forelse($prestasi as $prestasi)
                              <li><b>{{$prestasi->tahun}}</b></li><br>
                              <p>{{$prestasi->prestasi}}</p>
                            @empty 
                              <a style="background: red">Belum diisi</a> 
                            @endforelse
                          </ul>
                        </div>
                      </div>
                      
                          <a href="{{route('form-prestasi', $datadiri->id) }} " class="btn btn-primary"><b>Edit</b></a>
                        
                    </div>
                    
                    <div class="card card-default">
                      
                        <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-running"></i>
                          <b>Hobi</b></h3>
                        </div>
                      <div class="callout callout-danger">  
                        <div class="card-body">
                          <ul>
                            @forelse($hobi as $hobi)
                              <li><b>{{$hobi->nama_hobi}}</b></li><br>
                            @empty 
                              <a style="background: red">Belum diisi</a> 
                            @endforelse
                          </ul>
                        </div>
                      </div>
                      
                          <a href="{{route('form-hobi', $datadiri->id) }} " class="btn btn-primary"><b>Edit</b></a>
                        
                    </div>
                    

                    <div class="card card-inverse">
                      
                        <div class="card-header">
                          <h3 class="card-title">
                            <i class="fas fa-brain"></i>
                            <b>Skill</b></h3>
                        </div>
                        <div class="callout callout-danger">
                          <div class="card-body">
                                  <table class="table table-condensed">
                                    <thead>                  
                                      <tr>
                                        <th style="width: 30%">Skill</th>
                                        <th style="width: 50%">Penguasaan</th>
                                        <th style="width: 20%">Label</th>
                                      </tr>
                                    </thead>
                                  <tbody>
                                    @foreach($skill as $skill)
                                    <tr>
                                      <td>{{$skill->skill}}</td>
                                      <td>
                                        <div class="progress progress-xs">
                                          <div class="progress-bar progress-bar-danger" style="width: {{$skill->kemahiran}}%"></div>
                                        </div>
                                      </td>
                                      <td><span class="badge bg-success">{{$skill->kemahiran}}%</span></td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                          </div>
                        </div>

                          <a href="{{route('form-skill', $datadiri->id) }} " class="btn btn-primary"><b>Edit</b></a>
                          
                    </div>
                    
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
@stop

@section('js')

@endsection