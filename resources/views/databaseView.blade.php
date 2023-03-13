@extends('template')
@section('content')
<div class="container my-5 w-75 border p-5 shadow bg-light" style="">
  <h1 class="text-center mb-1">Kerjasama Program, INPUT KERJASAMA BARU</h1>
  <form class="d-flex flex-column" enctype="multipart/form-data">
    @csrf
    <div >
      <table class="table table-light mt-3">
        <thead class="thead-light">
          <tr>
            <th scope="1">No</th>
            <th scope="1">Judul Kerjasama</th>
            <th scope="1">Tingkat</th>
            <th scope="1">Masa Berlaku</th>  
            <th scope="1">Jenis Dokumen</th> 
            <th scope="1">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kerjasama as $ks)
          <tr>
            <td>1</td>
            <!-- kekmana bikin auto numbering? -->
            <td>{{$ks->ks_judul}}</td>
            <td>{{$ks->tingkat}}</td>
            <td>{{$ks->dt_start}}</td>
            <!-- kekmana munculin periode kerjasama? -->
            <td>{{$ks->dt_end}}</td>
            <td>
              <a class="btn btn-secondary" href='/viewDBDetail/{{$ks->id}}' >View Detail</a>
              <a class="btn btn-danger" href='{{url('/viewDBDelete/$ks->id')}}' >Delete</a>
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