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
          @error('dokNo')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>


        <div class="mb-3">
          <label for="dokTipe" class="form-label">Jenis Dokumen</label>
          <select class="form-control" id="dokTipe" name="dokTipe">
            <option value="MOU"> MOU </option>
            <option value="MOA"> MOA </option>
            <option value="IA"> IA </option>
          </select>
        </div>

      <div class="mb-3">
          <label for="mitraNama" class="form-label">Nama Mitra</label>
          <input type="text" class="form-control" id="mitraNama" name="mitraNama">
          @error('mitraNama')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="mitraDeskripsi" class="form-label">Deskripsi Mitra</label>
          <input type="text" class="form-control" id="mitraDeskripsi" name="mitraDeskripsi">
          @error('mitraDeskripsi')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="mitraAlamat" class="form-label">Alamat Mitra</label>
          <input type="text" class="form-control" id="mitraAlamat" name="mitraAlamat">
          @error('mitraAlamat')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="ksJudul" class="form-label">Judul Kerjasama</label>
          <input type="text" class="form-control" id="ksJudul" name="ksJudul">
          @error('ksJudul')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="ksDetail" class="form-label">Detail Kerjasama</label>
          <input type="text" class="form-control" id="ksDetail" name="ksDetail">
          @error('ksDetail')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>


      <div class="mb-3">
          <label for="tingkat" class="form-label">Jenis Dokumen</label>
          <select class="form-control" id="tingkat" name="tingkat">
            <option value="Internasional"> Internasional </option>
            <option value="Nasional"> Nasional </option>
            <option value="Wilayah"> Wilayah </option>
          </select>
        </div>

      

      <div class="mb-3">
          <label for="pdt" class="form-label">Nama Pejabat Penandatangan</label>
          <input type="text" class="form-control" id="pdt" name="pdt">
          @error('pdt')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="pdtJb" class="form-label">Jabatan Pejabat Penandatangan</label>
          <input type="text" class="form-control" id="pdtJb" name="pdtJb">
          @error('pdtJb')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="pdtMitra" class="form-label">Nama Pejabat Mitra Penandatangan</label>
          <input type="text" class="form-control" id="pdtMitra" name="pdtMitra">
          @error('pdtMitra')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="pdtMitraJb" class="form-label">Jabatan Pejabat Mitra Penandatangan</label>
          <input type="text" class="form-control" id="pdtMitraJb" name="pdtMitraJb">
          @error('pdtMitraJb')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="pdtLokasi" class="form-label">Tempat Penandatangan</label>
          <input type="text" class="form-control" id="pdtLokasi" name="pdtLokasi">
          @error('pdtLokasi')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="dtStart" class="form-label">Tanggal Penandatangan</label>
          <input type="text" class="form-control" id="dtStart" name="dtStart">
          @error('dtStart')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <div class="mb-3">
          <label for="dtEnd" class="form-label">Tanggal Berakhir Kerjasama</label>
          <input type="text" class="form-control" id="dtEnd" name="dtEnd">
          @error('dtEnd')
                        <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>

      <!-- Munculin list jurusan checkbox dan yang sudah dipilih -->
      <div class="mb-3">
          <label for="jurusan" class="form-label">Jurusan</label>
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
  