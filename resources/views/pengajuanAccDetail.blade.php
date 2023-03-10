@extends('template')
@section('content')
<div class="container my-5 w-75 border p-5 shadow bg-light" style="">
  <h1 class="text-center mb-5">Detail Pengajuan</h1>
  <form class="d-flex flex-column" enctype="multipart/form-data" action="/updateBook/{{$buku->id}}" method="post">
  <!-- keknya perlu ganti method? menu ini cuman buat liat detail pengajuan saja, gak buat modif" -->
  
      @csrf

        <div class="mb-3">
          <label for="dokNo" class="form-label">No Dokumen</label>
          <input type="text" class="form-control" id="dokNo" name="dokNo" value="{{$pengajuan->dok_no}}">
        </div>


        <div class="mb-3">
          <label for="dokTipe" class="form-label">Jenis Dokumen</label>
            <input type="text" class="form-control" id="dokTipe" name="dokTipe" value="{{$pengajuan->dok_tipe}}">
        </div>

      <div class="mb-3">
          <label for="mitraNama" class="form-label">Nama Mitra</label>
          <input type="text" class="form-control" id="mitraNama" name="mitraNama" value="{{$pengajuan->mitra_nama}}">
      </div>

      <div class="mb-3">
          <label for="mitraDeskripsi" class="form-label">Deskripsi Mitra</label>
          <input type="text" class="form-control" id="mitraDeskripsi" name="mitraDeskripsi" value="{{$pengajuan->mitra_deskripsi}}">
      </div>

      <div class="mb-3">
          <label for="mitraAlamat" class="form-label">Alamat Mitra</label>
          <input type="text" class="form-control" id="mitraAlamat" name="mitraAlamat" value="{{$pengajuan->mitra_alamat}}">
      </div>

      <div class="mb-3">
          <label for="ksJudul" class="form-label">Judul Kerjasama</label>
          <input type="text" class="form-control" id="ksJudul" name="ksJudul" value="{{$pengajuan->ks_judul}}">
      </div>

      <div class="mb-3">
          <label for="ksDetail" class="form-label">Detail Kerjasama</label>
          <input type="text" class="form-control" id="ksDetail" name="ksDetail" value="{{$pengajuan->ks_detail}}">
      </div>

      <div class="mb-3">
          <label for="tingkat" class="form-label">Tingkat</label>
          <select class="form-control" id="tingkat" value="{{$pengajuan->tingkat}}">
            <option id="Internasional"> Internasional </option>
            <option id="Nasional"> Nasional </option>
            <option id="Wilayah"> Wilayah </option>
          </select>
      </div>

      <div class="mb-3">
          <label for="pdt" class="form-label">Nama Pejabat Penandatangan</label>
          <input type="text" class="form-control" id="pdt" name="pdt" value="{{$pengajuan->pdt}}">
      </div>

      <div class="mb-3">
          <label for="pdtJb" class="form-label">Jabatan Pejabat Penandatangan</label>
          <input type="text" class="form-control" id="pdtJb" name="pdtJb" value="{{$pengajuan->pdt_jb}}">
      </div>

      <div class="mb-3">
          <label for="pdtMitra" class="form-label">Nama Pejabat Mitra Penandatangan</label>
          <input type="text" class="form-control" id="pdtMitra" name="pdtMitra" value="{{$pengajuan->pdt_mitra}}">
      </div>

      <div class="mb-3">
          <label for="pdtMitraJb" class="form-label">Jabatan Pejabat Mitra Penandatangan</label>
          <input type="text" class="form-control" id="pdtMitraJb" name="pdtMitraJb" value="{{$pengajuan->pdt_mitrajb}}">
      </div>

      <div class="mb-3">
          <label for="pdtLokasi" class="form-label">Tempat Penandatangan</label>
          <input type="text" class="form-control" id="pdtLokasi" name="pdtLokasi" value="{{$pengajuan->pdt_okasi}}">
      </div>

      <div class="mb-3">
          <label for="dtStart" class="form-label">Tanggal Penandatangan</label>
          <input type="text" class="form-control" id="dtStart" name="dtStart" value="{{$pengajuan->dt_start}}">
      </div>

      <div class="mb-3">
          <label for="dtEnd" class="form-label">Tanggal Berakhir Kerjasama</label>
          <input type="text" class="form-control" id="dtEnd" name="dtEnd" value="{{$pengajuan->dt_end}}">
      </div>

      <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <input type="text" class="form-control" id="status" name="status" value="{{$pengajuan->status}}">
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

        <button type="submit w-100" class="btn btn-primary" value="insert">Close</button>
        <!-- kekmana mau tutup balek ke halamn selanjutnya ini mau lihat detail doang -->
        
    </form>



        
    </form>

@endsection
  