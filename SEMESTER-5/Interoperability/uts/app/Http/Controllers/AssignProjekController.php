<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignProjek;

class AssignProjekController extends Controller
{
    public function index(Request $request)
    {
        try{
            $response = ['status' => false, 'message' => null, 'data' => null];
            $data = AssignProjek::with('projek','karyawan')->where('karyawan_id', 'like', '%' . $request->search . '%')
            ->orWhere('projek_id', 'like', '%' . $request->search . '%')
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
                'karyawan_id'          => 'required',
                'projek_id'            => 'required',
            ]);
            $response = ['status' => false, 'message' => null, 'data' => null];
            if($validation){
                $data = AssignProjek::create($request->all());
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
            $data = AssignProjek::with('projek','karyawan')->where('id', $request->id)->first();
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
                'karyawan_id'          => 'required',
                'projek_id'            => 'required',
                
            ]);
            $response = ['status' => false, 'message' => null, 'data' => null];
            if($validation){
                $data = AssignProjek::with('projek','karyawan')->find($request->id);
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
                $data = AssignProjek::with('projek','karyawan')->find($request->id);
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
