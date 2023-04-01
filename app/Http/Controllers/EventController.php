<?php

namespace App\Http\Controllers;

use App\Models\EventMaster;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class EventController extends Controller
{
    //
    public function index()
    {
        $data['event'] = EventMaster::all();

        return view('event.event', $data);
    }
    public function addEvent(Request $request)
    {
        // return $request;
        try {
            $validator = Validator::make($request->all(), [
                'event_name' => 'required',
                'event_Loc' => 'required',
                'event_date' => 'required',
                'event_strt_time' => 'required',
                'event_end_time' => 'required',
                'event_person_name' => 'required',
                'event_person_phone' => 'required',
                'event_status' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => true, 'msg' => $validator->errors()]);
            }
            $envNumber = 'ENV/' . date("Y-m-d") . '/' . time();
            $eventdata = EventMaster::create([
                'env_number' => $envNumber,
                'env_name' => $request->event_name,
                'env_loc' => $request->event_Loc,
                'env_date' => $request->event_date,
                'env_st_time' => $request->event_strt_time,
                'env_end_time' => $request->event_end_time,
                'env_person_name' => $request->event_person_name,
                'env_person_ph' => $request->event_person_phone,
                'env_status' => $request->event_status,
            ]);
            return response()->json(['success' => true, 'msg' => 'Event Add Successfully']);
        } catch (Exception $e) {
            return  response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function editEvent(Request $request)
    {
        // return $request->id;
        $eventdata = EventMaster::where('id', $request->id)->get();
        return response()->json(['success' => true, 'data' => $eventdata]);
    }


    public function updateEvent(Request $request)
    {
        try {
            // return $request;
            $validator = Validator::make($request->all(), [
                'edit_event_id' => 'required',
                'edit_event_name' => 'required',
                'edit_event_Loc' => 'required',
                'edit_event_date' => 'required',
                'edit_event_strt_time' => 'required',
                'edit_event_end_time' => 'required',
                'edit_event_person_name' => 'required',
                'edit_event_person_phone'=>'required',
                'edit_event_status'=>'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, $validator->errors()]);
            }
            $supplierUpdate = EventMaster::where('id', $request->edit_event_id)->update([

                'env_name'=>$request->edit_event_name,
                'env_loc'=>$request->edit_event_Loc,
                'env_date'=>$request->edit_event_date,
                'env_st_time'=>$request->edit_event_strt_time,
                'env_end_time'=>$request->edit_event_end_time,
                'env_person_name'=>$request->edit_event_person_name,
                'env_person_ph'=>$request->edit_event_person_phone,
                'env_status'=>$request->edit_event_status,
            ]);
            return response()->json(['success' => True, 'msg' => 'Event succesfully Update']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }



    public function deleteEvent(Request $request)
    {
        // return $request->event_id;
        try {
            EventMaster::where('id', $request->event_id)->delete();
            return response()->json(['success' => true, 'msg' => 'event deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
