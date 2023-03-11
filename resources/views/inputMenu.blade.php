@extends('template')
@section('content')
<div class="container my-5 w-75 border p-5 shadow bg-light" style="">
  <h1 class="text-center mb-1">INPUT KERJASAMA BARU</h1>
  <form class="d-flex flex-column" enctype="multipart/form-data" action="/inputData" method="post">
    @csrf

      <div class="mb-3">
        <label for="dokNo" class="form-label">No Dokumen</label>
        <input type="text" class="form-control" id="dokNo" name="dokNo" >
        @error('dokNo')
                        <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- pakai foreach mau panggil semua pengajuan yang status "ACCEPT", baru formnya autofill tapi masih bisa diedit gitu -->
      </div>

      <div class="mb-3">
          <label for="dokTipe" class="form-label">Jenis Dokumen</label>
          <select class="form-control" id="dokTipe" onchange="typeCheck(dokTipe)">
            <option id="MOU"> MOU </option>
            <option id="MOA"> MOA </option>
            <option id="IA"> IA </option>
          </select>

        <!-- DropDown 1,2,3 MOU/MOA/IA
      
        kalau MOU tidak muncul unit pelaksana
        kalau MOA/IA muncul Dasar Dokumen
        -->
      </div>
      
      <div id="baseNotMou"class="mb-3" style="display:none;">
          <label for="dokDasar" class="form-label">Dasar Dokumen</label>
          <input type="text" class="form-control" id="dokDasar" name="dokDasar" >
          
          <!-- Ini buat masukin nomor dokumen MOU, pilihan ini muncul kalau jenis dokumen nya MOA / IA -->
      </div>



      <!-- Javascript buat munculin field  -->
      <script>
        function typeCheck(dokTipe){
          if(dokTipe.value == "MOU"){
            document.getElementById("baseNotMou").style.display="none";
          }
          else
          {
            document.getElementById("baseNotMou").style.display="block";
          }
        }
      </script>





      <div class="mb-3">
          <label for="mitraNama" class="form-label">Nama Mitra</label>
          <input type="text" class="form-control" id="mitraNama" name="mitraNama" >
          @error('mitraNama')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="tingkat" class="form-label">Tingkat</label>
          <select class="form-control" id="tingkat">
            <option id="1"> Internasional </option>
            <option id="2"> Nasional </option>
            <option id="3"> Wilayah </option>
          </select>
      </div>

      <div class="mb-3">
          <label for="ksJudul" class="form-label">Judul Kerjasama</label>
          <input type="text" class="form-control" id="ksJudul" name="ksJudul" >
          @error('ksJudul')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-5">
          <label for="ksDetail" class="form-label">Bentuk Kegiatan</label>
          <textarea class="form-control" id="ksDetail" name="ksDetail" rows="5"></textarea>
          @error('ksDetail')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="dtStart" class="form-label">Tanggal Mulai</label>
          <input type="date" class="form-control" id="dtStart" name="dtStart" >
          @error('dtStart')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
      <div class="mb-3">
          <label for="dtEnd" class="form-label">Tanggal Berakhir</label>
          <input type="date" class="form-control" id="dtEnd" name="dtEnd" >
          @error('dtEnd')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <label for="ksBukti">Bukti Realisasi Kerjasama</label>
      <div class="form-group mb-3 border border-dark d-flex">
        <input type="file" class="form-control-file" id="ksBukti" name="ksBukti" onchange="loadFile(event)" style="border:none">
          @error('ksBukti')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
        <img id="output" >
      
      <label for="ksDoc">Upload Dokumen</label>
      <div class="form-group mb-3 border border-dark d-flex">
        <input type="file" class="form-control-file" id="ksDoc" name="ksDoc" onchange="loadFile(event)" style="border:none">
          @error('ksDoc')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
        <img id="output" >

      <div class="mb-5">
            <!-- @foreach ($jurusan as $j)
              <input type="checkbox" name="{{$j->jurusan}}" id="{{$j->jurusan}}" style="margin:10px;" >{{$j->jurusan}}
            @endforeach -->

            @foreach ($jurusan as $j)
          <div class="d-inline mx-2 ">
            <input type="checkbox" name="{{$j->jurusan}}" id="{{$j->jurusan}}" value="{{$j->id}}">
            <label for="{{$j->jurusan}}">{{$j->jurusan}}</label>
          </div>
          @endforeach
        </div>

      <button type="submit w-100" class="btn btn-primary" value="insert">Input</button>
    </form>
    

</div>
</div>
<script>
  var loadFile = function(event){
      
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endsection