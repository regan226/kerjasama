@extends('template')
@section('content')
<div class="container my-5 w-75 border p-5 shadow bg-light" style="">
  <h1 class="text-center mb-5">Pengajuan Kerjasama</h1>
  <form class="d-flex flex-column" enctype="multipart/form-data" action="/pengajuanInputMenuExecute" method="post">
  <!-- keknya perlu ganti method? menu ini cuman buat liat detail pengajuan saja, gak buat modif" -->
  
      @csrf

        <div class="mb-3">
          <label for="dokNo" class="form-label">No Dokumen</label>
          <input type="text" class="form-control" id="dokNo" name="dokNo">
        </div>


        <div class="mb-3">
          <label for="dokTipe" class="form-label">Jenis Dokumen</label>
            <input type="text" class="form-control" id="dokTipe" name="dokTipe">
        </div>

      <div class="mb-3">
          <label for="mitraNama" class="form-label">Nama Mitra</label>
          <input type="text" class="form-control" id="mitraNama" name="mitraNama">
      </div>

      <div class="mb-3">
          <label for="mitraDeskripsi" class="form-label">Deskripsi Mitra</label>
          <input type="text" class="form-control" id="mitraDeskripsi" name="mitraDeskripsi">
      </div>

      <div class="mb-3">
          <label for="mitraAlamat" class="form-label">Alamat Mitra</label>
          <input type="text" class="form-control" id="mitraAlamat" name="mitraAlamat">
      </div>

      <div class="mb-3">
          <label for="ksJudul" class="form-label">Judul Kerjasama</label>
          <input type="text" class="form-control" id="ksJudul" name="ksJudul">
      </div>

      <div class="mb-3">
          <label for="ksDetail" class="form-label">Detail Kerjasama</label>
          <input type="text" class="form-control" id="ksDetail" name="ksDetail">
      </div>

      <div class="mb-3">
          <label for="tingkat" class="form-label">Tingkat</label>
          <select class="form-control" id="tingkat">
            <option id="Internasional"> Internasional </option>
            <option id="Nasional"> Nasional </option>
            <option id="Wilayah"> Wilayah </option>
          </select>
      </div>

      <div class="mb-3">
          <label for="pdt" class="form-label">Nama Pejabat Penandatangan</label>
          <input type="text" class="form-control" id="pdt" name="pdt">
      </div>

      <div class="mb-3">
          <label for="pdtJb" class="form-label">Jabatan Pejabat Penandatangan</label>
          <input type="text" class="form-control" id="pdtJb" name="pdtJb">
      </div>

      <div class="mb-3">
          <label for="pdtMitra" class="form-label">Nama Pejabat Mitra Penandatangan</label>
          <input type="text" class="form-control" id="pdtMitra" name="pdtMitra">
      </div>

      <div class="mb-3">
          <label for="pdtMitraJb" class="form-label">Jabatan Pejabat Mitra Penandatangan</label>
          <input type="text" class="form-control" id="pdtMitraJb" name="pdtMitraJb">
      </div>

      <div class="mb-3">
          <label for="pdtLokasi" class="form-label">Tempat Penandatangan</label>
          <input type="text" class="form-control" id="pdtLokasi" name="pdtLokasi">
      </div>

      <div class="mb-3">
          <label for="dtStart" class="form-label">Tanggal Penandatangan</label>
          <input type="text" class="form-control" id="dtStart" name="dtStart">
      </div>

      <div class="mb-3">
          <label for="dtEnd" class="form-label">Tanggal Berakhir Kerjasama</label>
          <input type="text" class="form-control" id="dtEnd" name="dtEnd">
      </div>

      <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <input type="text" class="form-control" id="status" name="status">
      </div>

      <!-- Munculin list jurusan checkbox dan yang sudah dipilih -->
      <div class="mb-3">
          <label for="jurusan" class="form-label">Jurusan</label>
          <input type="text" class="form-control" id="jurusan" name="jurusan" >
      </div>

      <div class="mb-5">
        @foreach ($jurusan as $j)
          <div class="d-inline mx-2 ">
            <input type="checkbox" name="{{$j->jurusan}}" id="{{$j->jurusan}}" value="{{$j->id}}">
            <label for="{{$j->jurusan}}">{{$j->jurusan}}</label>
          </div>
        @endforeach
        </div>

        <button type="submit w-100" class="btn btn-primary" value="insert">Save</button>
        <!-- kekmana mau tutup balek ke halamn selanjutnya ini mau lihat detail doang -->
        
    </form>



        
    </form>

@endsection
  