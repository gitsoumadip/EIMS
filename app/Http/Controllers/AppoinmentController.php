<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
use App\Models\AppoinmentMaster;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AppoinmentController extends Controller
{
    //
    public function index()
    {
        $data['appoinment'] = AppoinmentMaster::all();
        return view('appoinment.appoinment', $data);
        // return "Appoinment";
    }
    public function addAppoinment(Request $request)
    {
        // return $request;
        try {
            $validator = Validator::make($request->all(), [
                'appoinment_name' =>'required',
                'appoinment_ph_no' =>'required',
                'appoinment_email' =>'required',
                'dateOfProgramm'=>'required',
                'appoinment_requirement' =>'required',
                'appoinmen_discussion_details' =>'required',
                'appoinmen_reference' =>'required',
                'appoinmen_status' =>'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, $validator->errors()]);
            }
            AppoinmentMaster::insert([
                'client_name' => $request->appoinment_name,
                'clint_phone' => $request->appoinment_ph_no,
                'clint_email' => $request->appoinment_email,
                'clint_requirement' => $request->appoinment_requirement,
                'dateOfProgram' => $request->dateOfProgramm,
                'client_discussion_details' => $request->appoinmen_discussion_details,
                'client_reference' => $request->appoinmen_reference,
                'status' => $request->appoinmen_status
            ]);

            return response()->json(['success' => true, 'msg' => 'Item added successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    public function editappoinment(Request $request)
    {
        // return $request;
        $appoinments = AppoinmentMaster::where('id', $request->id)->get();
        return  response()->json(['success' => true, 'data' => $appoinments]);
    }
    public function updateAppoinment(Request $request)
    {
        // return $request;
        try {
            AppoinmentMaster::where('id', $request->edit_appoinment_id)->update([
                'client_name' => $request->edit_appoinment_name,
                'clint_phone' => $request->edit_appoinment_ph_no,
                'clint_email' => $request->edit_appoinment_email,
                'clint_requirement' => $request->edit_appoinment_requirement,
                'dateOfProgram' => $request->edit_dateOfProgramm,
                'client_discussion_details' => $request->edit_appoinmen_discussion_details,
                'client_reference' => $request->edit_appoinmen_reference,
                'status' => $request->edit_appoinmen_status
            ]);

            return response()->json(['success' => true, 'msg' => 'Appoinment Upadte successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deletAppoinment(Request $request)
    {
        try {
            // return $request;
            $delete = AppoinmentMaster::where('id', $request->delete_appoinment_id)->delete();
            return response()->json(['success' => true, 'msg' => 'Appoinment Upadte successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}

// {"_token":"mJ2bvcMEd1hlgjiWRGSqGkFDa9g0YioVhsAZIJPB",
//     "edit_appoinment_id":"1",
//     "edit_appoinment_name":"hello",
//     "edit_appoinment_ph_no":"876",
//     "edit_appoinment_email":"fghjk@dfg.com",
//     "edit_appoinment_requirement":"kjh",
//     "edit_dateOfProgramm":"jhgvf",
//     "edit_appoinmen_discussion_details":"ghjk",
//     "edit_appoinmen_reference":"mnbv",
//     "edit_appoinmen_status":"active"}
