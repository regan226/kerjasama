@extends('template')
@section('content')
<div class="container my-5 w-75 border p-5 shadow bg-light" style="">
  <h1 class="text-center mb-5">Detail Kerjasama</h1>
  <form class="d-flex flex-column" enctype="multipart/form-data" action="/updateBook/{{$buku->id}}" method="post">
  <!-- keknya perlu ganti method? menu ini cuman buat liat detail pengajuan saja, gak buat modif" -->
  
      @csrf

        <div class="mb-3">
          <label for="dokNo" class="form-label">No Dokumen</label>
          <input type="text" class="form-control" id="dokNo" name="dokNo" value="{{$kerjasama->dok_no}}">
        </div>


        <div class="mb-3">
          <label for="dokTipe" class="form-label">Jenis Dokumen</label>
            <input type="text" class="form-control" id="dokTipe" name="dokTipe" value="{{$kerjasama->dok_tipe}}">
        </div>

        <div id="baseNotMou"class="mb-3" style="display:none;">
          <label for="dokDasar" class="form-label">Dasar Dokumen</label>
            <input type="text" class="form-control" id="dokDasar" name="dokDasar" value="{{$kerjasama->dok_dasar}}">
          <!-- Ini buat masukin nomor dokumen MOU, pilihan ini muncul kalau jenis dokumen nya MOA / IA -->
        </div>



      <div class="mb-3">
          <label for="mitraNama" class="form-label">Nama Mitra</label>
          <input type="text" class="form-control" id="mitraNama" name="mitraNama" value="{{$kerjasama->mitra_nama}}">
      </div>

      <div class="mb-3">
          <label for="ksJudul" class="form-label">Judul Kerjasama</label>
          <input type="text" class="form-control" id="ksJudul" name="ksJudul" value="{{$kerjasama->ks_judul}}">
      </div>

      <div class="mb-3">
          <label for="ksDetail" class="form-label">Detail Kerjasama</label>
          <input type="text" class="form-control" id="ksDetail" name="ksDetail" value="{{$kerjasama->ks_detail}}">
      </div>

      <div class="mb-3">
          <label for="tingkat" class="form-label">Tingkat</label>
          <select class="form-control" id="tingkat" value="{{$kerjasama->tingkat}}">
            <option id="Internasional"> Internasional </option>
            <option id="Nasional"> Nasional </option>
            <option id="Wilayah"> Wilayah </option>
          </select>
      </div>

      <div class="mb-3">
          <label for="dtStart" class="form-label">Tanggal Mulai</label>
          <input type="text" class="form-control" id="dtStart" name="dtStart" value="{{$kerjasama->dt_start}}">
      </div>

      <div class="mb-3">
          <label for="dtEnd" class="form-label">Tanggal Berakhir</label>
          <input type="text" class="form-control" id="dtEnd" name="dtEnd" value="{{$kerjasama->dt_end}}">
      </div>

      <!-- Munculin list jurusan checkbox dan yang sudah dipilih -->
      <div class="mb-3">
          <label for="jurusan" class="form-label">Jurusan</label>
          <input type="text" class="form-control" id="jurusan" name="jurusan" >
      </div>

      <div class="mb-5">
            @foreach ($jurusan as $j)
                @php
                $flag = false
                @endphp
                @foreach ($assign as $a)
                    @if($j->id == $a->unit_id)
                    <input type="checkbox" name="{{$j->jurusan}}" id="{{$j->jurusan}}" checked  >{{$j->jurusan}}
                    @php
                    $flag = true
                    @endphp
                    @break
                    @endif
                    
                @endforeach
                @if ($flag == false)
                <input type="checkbox" name="{{$j->jurusan}}" id="{{$j->jurusan}}"   >{{$j->jurusan}}
                @endif
            @endforeach
        </div>

        <div class="form-group mb-3">
            <label for="ks_bukti">Bukti Realisasi Kerjasama</label>
            <input type="file" class="form-control-file" id="ks_bukti" name="ks_bukti" onchange="loadFile(event)">
            <img id="output" src="{{ Storage::url($kerjasama->ks_bukti)}}" class="w-10">
        </div>

        <div class="form-group mb-3">
            <label for="ks_dokumen">Dokumen Kerjasama</label>
            <input type="file" class="form-control-file" id="ks_dokumen" name="ks_dokumen" onchange="loadFile(event)">
            <img id="output" src="{{ Storage::url($kerjasama->ks_dokumen)}}" class="w-10">
        </div>

        <button type="submit w-100" class="btn btn-primary" value="insert">Close</button>
        <!-- kekmana mau tutup balek ke halamn selanjutnya ini mau lihat detail doang -->
        
    </form>



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


        
        
        
    </form>

@endsection
  