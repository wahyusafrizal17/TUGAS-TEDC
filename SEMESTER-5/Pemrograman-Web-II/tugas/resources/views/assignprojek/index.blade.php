@extends('layouts.app')
@section('content')

<div class="card">
   <div class="card-header">
      <h5 class="card-title">Assign Projek</h5>
   </div>
   <div class="card-body">
    <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
           <tr>
              <th style="width: 5%">No</th>
              <th>Nama Karyawan</th>
              <th>Nama Projek</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th style="width: 20%" class="text-center">Action</th>
           </tr>
        </thead>
        <tbody>
            @foreach($model as $row)
           <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $row->karyawan->nama ?? '-' }}</td>
              <td>{{ $row->projek->nama_projek ?? '-' }}</td>
              <td>{{ $row->projek->tanggal_mulai ?? '-' }}</td>
              <td>{{ $row->projek->tanggal_selesai ?? '-' }}</td>
             <td class="text-center">
                 <div class="form-button-action">
                    <a href="{{ route('assignprojek.edit',[$row->id]) }}" data-toggle="tooltip" title="" class="btn btn-primary btn-sm" data-original-title="Edit">
                       Edit
                    </a>
                    <a href="{{ route('assignprojek.destroy',[$row->id]) }}" data-toggle="tooltip" title="" class="btn btn-danger btn-sm" data-original-title="Edit">
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