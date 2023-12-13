@extends('layouts.app')
@section('content')

<div class="card">
   <div class="card-header">
      <h5 class="card-title">Karyawan</h5>
   </div>
   <div class="card-body">
      <table class="table table-striped table-hover">
         <thead>
            <tr>
               <th style="width: 5%">No</th>
               <th>Nama</th>
               <th>Nik</th>
               <th>Email</th>
               <th>No Hp</th>
               <th>Jenis Kelamin</th>
               <th>Tempat Lahir</th>
               <th>Tanggal Lahir</th>
               <th>Jabatan</th>
               <th>Alamat</th>
               <th style="width: 20%" class="text-center">Action</th>
            </tr>
         </thead>
         <tbody>
             @foreach($model as $row)
            <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $row->nama }}</td>
               <td>{{ $row->nik }}</td>
               <td>{{ $row->email }}</td>
               <td>{{ $row->no_hp }}</td>
               <td>{{ $row->jenis_kelamin }}</td>
               <td>{{ $row->tempat_lahir }}</td>
               <td>{{ $row->tanggal_lahir }}</td>
               <td>{{ $row->jabatan }}</td>
               <td>{{ $row->alamat }}</td>
              <td class="text-center">
                  <div class="form-button-action">
                     <a href="{{ route('karyawan.edit',[$row->id]) }}" data-toggle="tooltip" title="" class="btn btn-primary btn-sm" data-original-title="Edit">
                        Edit
                     </a>
                     <a href="{{ route('karyawan.destroy',[$row->id]) }}" data-toggle="tooltip" title="" class="btn btn-danger btn-sm" data-original-title="Edit">
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

