@extends('template')
@section('content')
<div class="container my-5 w-75 border p-5 shadow bg-light" style="">
  <h1 class="text-center mb-1">INPUT KERJASAMA BARU</h1>
  <form class="d-flex flex-column" enctype="multipart/form-data" action="/inputData" method="post">
    @csrf

      <div class="mb-3">
          <label for="dokNo" class="form-label">Nomor Dokumen</label>
          <select class="form-control" id="dokNo" name="dokNo">
          @foreach ($pengajuan as $p)
            <option id="dokNo" value='{{$p->id}}'> {{$p->dok_no}} </option>
          @endforeach
          </select>

      
      <div id="baseNotMou"class="mb-3">
          <label for="dokDasar" class="form-label">Dasar Dokumen</label>
          <input type="text" class="form-control" id="dokDasar" name="dokDasar" >
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