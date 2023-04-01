<?php

namespace App\Http\Controllers;

use App\Models\ModelMaster;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModelController extends Controller
{
    //
    public function index()
    {
        $data['model'] = ModelMaster::all();
        return view('modelno.modelNo', $data);
    }
    public function addModel(Request $request)
    {
        // return $request;
        try {
            $validator = Validator::make($request->all(), [
                'model_name' => 'required',
                'model_slug' => 'required',
                'model_status' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            $Modeladd = ModelMaster::create([
                'mdl_name' => $request->model_name,
                'mdl_slug' => $request->model_slug,
                'mdl_status' => $request->model_status,
            ]);
            return response()->json(['success' => true, 'msg' => "Model number added successfully"]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function editModelno(Request $request)
    {
        $modelData = ModelMaster::where('mdl_id', $request->id)->get();
        return response()->json(['success' => true, 'data' => $modelData]);
    }
    /**
     * update Model number
     */
    public function updateModelno(Request $request)
    {
        try {
            // return $request;
            $validator = Validator::make($request->all(), [
                'edit_model_id' => 'required',
                'edit_model_name' => 'required',
                'edit_model_slug' => 'required',
                'edit_model_status' => 'required',

            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, $validator->errors()]);
            }
            $supplierUpdate = ModelMaster::where('mdl_id', $request->edit_model_id)->update([

                'mdl_name' => $request->edit_model_name,
                'mdl_slug' => $request->edit_model_slug,
                'mdl_status' => $request->edit_model_status,
            ]);
            return response()->json(['success' => True, 'msg' => 'Model Number succesfully Update']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deleteModels(Request $request)
    {
        // return $request->delete_model_id;
        try {
            ModelMaster::where('mdl_id', $request->delete_model_id)->delete();
            return response()->json(['success' => true, 'msg' => 'Item deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
