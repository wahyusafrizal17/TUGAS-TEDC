<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projek;

class ProjekController extends Controller
{
    public function index(Request $request)
    {
        try{
            $response = ['status' => false, 'message' => null, 'data' => null];
            $data = Projek::where('nama_projek', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_mulai', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_selesai', 'like', '%' . $request->search . '%')
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
                'nama_projek'          => 'required',
                'tanggal_mulai'        => 'required',
                'tanggal_selesai'      => 'required',
            ]);
            $response = ['status' => false, 'message' => null, 'data' => null];
            if($validation){
                $data = Projek::create($request->all());
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
            $data = Projek::where('id', $request->id)->first();
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
                'id'                   => 'required',
                'nama_projek'          => 'required',
                'tanggal_mulai'        => 'required',
                'tanggal_selesai'      => 'required',
                
            ]);
            $response = ['status' => false, 'message' => null, 'data' => null];
            if($validation){
                $data = Projek::find($request->id);
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
                $data = Projek::find($request->id);
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
