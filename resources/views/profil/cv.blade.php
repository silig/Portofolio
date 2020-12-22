<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Resume/CV</title>
	<link rel="stylesheet" href="{{ asset('template_cv/styles.css')}}">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body onload="window.print()">

<div id="printableArea">
  <div class="resume">
     <div class="resume_left">
       <div class="resume_profile">
         <img src="{{asset('storage/uploads/foto/'.$datadiri->foto)}}" alt="profile_pic">
       </div>
       <div class="resume_content">
         <div class="resume_item resume_info">
           <div class="title">
             <p class="bold" style="text-align: center">{{$datadiri->nama_lengkap}}</p>
           </div>
           <ul>
             <li>
               <div class="icon">
                 <i class="fas fa-praying-hands"></i>
               </div>
               <div class="data">
                 {{$datadiri->agama}}
               </div>
             </li>
             <li>
               <div class="icon">
                 <i class="fas fa-venus-mars"></i>
               </div>
               <div class="data">
                 {{$datadiri->jenis_kelamin}}
               </div>
             </li>
             <li>
               <div class="icon">
                 <i class="fas fa-street-view"></i>
               </div>
               <div class="data">
                 <p>{{$datadiri->tempat_lahir}}</p>
                 <p>{{$datadiri->tgl_lahir}}
               </div>
             </li>
             <li>
               <div class="icon">
                 <i class="fas fa-map-signs"></i>
               </div>
               <div class="data">
                 {{$datadiri->alamat}}
               </div>
             </li>
             <li>
               <div class="icon">
                 <i class="fas fa-mobile-alt"></i>
               </div>
               <div class="data">
                 {{$datadiri->phone}}
               </div>
             </li>
             <li>
               <div class="icon">
                 <i class="fas fa-envelope"></i>
               </div>
               <div class="data">
                 {{$profile->email}}
               </div>
             </li>
           </ul>
         </div>
         <div class="resume_item resume_skills">
           <div class="title">
             <p class="bold">skill's</p>
           </div>
           <ul>
            @foreach($skill as $skill)
             <li>
               <div class="skill_name">
                 {{$skill->skill}}
               </div>
             </li>
             <li>  
               <div class="skill_progress">
                 <span style="width: {{$skill->kemahiran}}%;"></span>
               </div>
               <div class="skill_per">{{$skill->kemahiran}}%</div>
             </li>
            @endforeach 
           </ul>
         </div>
         <div class="resume_item resume_social">
           <div class="title">
             <p class="bold">Social</p>
           </div>
           <ul>
            @foreach($sosmed as $sosmed)
             <li>
               <div class="icon">
                 <i class="fab fa-{{$sosmed->sosial_media}}"></i>
               </div>
               <div class="data">
                 <p class="semi-bold">{{$sosmed->sosial_media}}</p>
                 @php
                            $removeChar = ["https://", "http://"];
                            $result = str_replace($removeChar, "", $sosmed->link);
                 @endphp
                 <p>{{$result}}</p>
               </div>
             </li>
            @endforeach 
           </ul>
         </div>
       </div>
    </div>
    <div class="resume_right">
      <div class="resume_item resume_about">
          <div class="title">
             <p class="bold">Tentang Saya</p>
           </div>
          <p style="font-size: 12px">{{$datadiri->tentang}}</p>
      </div>
      <div class="resume_item resume_work">
          <div class="title">
             <p class="bold">Pengalaman</p>
           </div>
          <ul>
            @foreach($pengalaman as $pengalaman)
              <li>
                  <div class="date" style="margin-bottom: 0px">{{$pengalaman->pengalaman}}</div> 
                  <div class="info" style="margin-bottom: 0px">
                    <p>{{$pengalaman->penjelasan}}</p>
                  </div>
              </li>
            @endforeach  
          </ul>
      </div>
      <div class="resume_item resume_education">
        <div class="title">
             <p class="bold">Riwayat Pendidikan</p>
        </div>
        <ul>
          @foreach($pendidikan as $pendidikan)
              <li>
                  <div class="date" style="margin-bottom: 0px">{{$pendidikan->tahun_mulai.' - '.$pendidikan->tahun_selesai}}</div> 
                  <div class="info" style="margin-bottom: 0px">
                       <p class="semi-bold">{{$pendidikan->institusi}}</p> 
                    <p>{{$pendidikan->nama_jurusan}}</p>
                  </div>
              </li>
          @endforeach
          </ul>
      </div>
      <div class="resume_item resume_education">
        <div class="title">
             <p class="bold">Prestasi</p>
        </div>
        <ul>
          @foreach($prestasi as $prestasi)
              <li>
                  <div class="date" style="margin-bottom: 0px">{{$prestasi->tahun}}</div> 
                  <div class="info" style="margin-bottom: 0px">
                       <p class="semi-bold" style="margin-bottom: 0px">{{$prestasi->prestasi}}</p>
                  </div>
              </li>
          @endforeach
          </ul>
      </div>
      <div class="resume_item resume_education">
        <div class="title">
             <p class="bold">Hobby</p>
           </div>
         <ul>
          @foreach($hobi as $hobi)
           <li><div class="info" style="margin-bottom: 0px">{{$hobi->nama_hobi}}</div></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
  function printDiv(divName){
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;

    }

</script>
</html>