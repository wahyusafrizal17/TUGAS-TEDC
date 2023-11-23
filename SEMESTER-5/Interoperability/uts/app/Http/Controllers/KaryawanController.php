<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        try{
            $response = ['status' => false, 'message' => null, 'data' => null];
            $data = Karyawan::where('nama', 'like', '%' . $request->search . '%')
            ->orWhere('nik', 'like', '%' . $request->search . '%')
            ->orWhere('jenis_kelamin', 'like', '%' . $request->search . '%')
            ->orWhere('alamat', 'like', '%' . $request->search . '%')
            ->orWhere('tempat_lahir', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_lahir', 'like', '%' . $request->search . '%')
            ->orWhere('no_hp', 'like', '%' . $request->search . '%')
            ->orWhere('jabatan', 'like', '%' . $request->search . '%')
            ->get();
            
            if(!empty($data)){
                $response = [
                    'status' => true,
                    'message' => 'Data was successfully',
                    'data' => $data
                ];
            }

            return response()->json($response);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function store(Request $request)
    {
        try{
            $validation = $this->validate($request, [
                'nama'          => 'required',
                'nik'           => 'required',
                'email'         => 'required',
                'no_hp'         => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir'  => 'required',
                'tanggal_lahir' => 'required',
                'jabatan'       => 'required',
                'alamat'        => 'required',
            ]);
            $response = ['status' => false, 'message' => null, 'data' => null];
            if($validation){
                $data = Karyawan::create($request->all());
                $response = [
                    'status' => true,
                    'message' => 'Data was successfully in created',
                    'data' => $data
                ];
            }
            return response()->json($response);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function show(Request $request)
    {
        try{
            $response = ['status' => false, 'message' => null, 'data' => null];
            $validation = $this->validate($request, [
                'id' => 'required',
            ]);
            $data = Karyawan::where('id', $request->id)->first();
            if(!empty($data)){
                $response = [
                    'status' => true,
                    'message' => 'Data was successfully in list',
                    'data' => $data
                ];
            }else{
                $response = [
                    'status' => false,
                    'message' => 'Data not found',
                ];
            }

            return response()->json($response);
        }catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function update(Request $request)
    {
        try{
            $validation = $this->validate($request, [
                'id'            => 'required',
                'nama'          => 'required',
                'nik'           => 'required',
                'email'         => 'required',
                'no_hp'         => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir'  => 'required',
                'tanggal_lahir' => 'required',
                'jabatan'       => 'required',
                'alamat'        => 'required',
                
            ]);
            $response = ['status' => false, 'message' => null, 'data' => null];
            if($validation){
                $data = Karyawan::find($request->id);
                if(!empty($data)){
                    $data->update($request->all());
                    $response = [
                        'status' => true,
                        'message' => 'Data was successfully updated',
                        'data' => $data
                    ];
                }else{
                    $response = [
                        'status' => false,
                        'message' => 'Data not found',
                    ];
                }
            }
            return response()->json($response);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        try{
            $validation = $this->validate($request, [
                'id' => 'required',
            ]);
            $response = ['status' => false, 'message' => null, 'data' => null];
            if($validation){
                $data = Karyawan::find($request->id);
                if(!empty($data)){
                    $data->delete();
                    $response = [
                        'status' => true,
                        'message' => 'Data was successfully deleted',
                        'data' => $data
                    ];
                }else{
                    $response = [
                        'status' => false,
                        'message' => 'Data not found',
                    ];
                }
                
            }
            return response()->json($response);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
