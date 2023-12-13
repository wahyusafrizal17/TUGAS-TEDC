@extends('layouts.app')
@section('content')

<div class="card">
   <div class="card-header">
      <h5 class="card-title">Projek</h5>
   </div>
   <div class="card-body">
    <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
           <tr>
              <th style="width: 5%">No</th>
              <th>Nama</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th style="width: 20%" class="text-center">Action</th>
           </tr>
        </thead>
        <tbody>
            @foreach($model as $row)
           <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $row->nama_projek }}</td>
              <td>{{ $row->tanggal_mulai }}</td>
              <td>{{ $row->tanggal_selesai }}</td>
             <td class="text-center">
                 <div class="form-button-action">
                    <a href="{{ route('projek.edit',[$row->id]) }}" data-toggle="tooltip" title="" class="btn btn-primary btn-sm" data-original-title="Edit">
                       Edit
                    </a>
                    <a href="{{ route('projek.destroy',[$row->id]) }}" data-toggle="tooltip" title="" class="btn btn-danger btn-sm" data-original-title="Edit">
                       Hapus
                    </a>
                 </div>
              </td>
           </tr>
           @endforeach
        </tbody>
     </table>
   </div>
</div>
    
@endsection