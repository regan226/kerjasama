@extends('template')
@section('content')
<div class="container my-5 w-75 border p-5 shadow bg-light" style="">
  <h1 class="text-center mb-1">Antrian Penerimaan Pengajuan</h1>
  <a class="btn btn-primary" href="{{url('/pengajuanInputMenu')}}" >Ajukan Kerjasama</a>
  <form class="d-flex flex-column" enctype="multipart/form-data">
    @csrf
    <div >
      <table class="table table-light mt-3">
        <thead class="thead-light">
          <tr>
            <th scope="1">No</th>
            <th scope="1">Judul Kerjasama</th>
            <th scope="1">Tingkat</th>
            <th scope="1">Tanggal Pengajuan</th>  
            <th scope="1">Status</th> 
            <th scope="1">Aksi</th> 
          </tr>
        </thead>
        <tbody>
          @foreach ($pengajuan as $pgj)
          <tr>
            <td>1</td>
            <!-- kekmana bikin auto numbering? -->
            <td>{{$pgj->ks_judul}}</td>
            <td>{{$pgj->tingkat}}</td>
            <td>{{$pgj->dt_start}}</td>
            <!-- kekmana munculin periode kerjasama? -->
            <td>{{$pgj->status}}</td>
              <td>
                <a class="btn btn-secondary" href='/pengajuanInputDetail/{{$pgj->id}}' >View Detail</a>
                <a class="btn btn-danger" href='/pengajuanDelete/{{$pgj->id}}' >Delete</a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
</div>
<script>
  var loadFile = function(event){
      
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endsection