<?php

namespace App\Http\Controllers;

use App\Models\StoreMaster;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function index()
    {
        $data['stores'] = StoreMaster::all();
        return view('store.store', $data);
    }
    public function addStore(Request $request)
    {
        // return $request;
        try {
            $stroeValidator = Validator::make($request->all(), [
                'store_name' => 'required',
                'store_loc' => 'required',
                'store_incharge' => 'required',
                'store_phone' => 'required',
                'store_status' => 'required',
            ]);
            if ($stroeValidator->fails()) {
                return response()->json(['success' => false, 'msg' => $stroeValidator->messages()]);
            }

            StoreMaster::create([
                'store_name' => $request->store_name,
                'store_location' => $request->store_loc,
                'store_incharge' => $request->store_incharge,
                'store_phone' => $request->store_phone,
                'store_status' => $request->store_status,
            ]);
            return response()->json(['success' => true, 'msg' => 'store added successfully']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    public function editStore(Request $request)
    {
        // return $request;
        $storeData = StoreMaster::where('store_id', $request->id)->get();

        return response()->json(['success' => true, 'data' => $storeData]);
    }
    public function updateStore(Request $request)
    {
        // return $request;

        //         edit_store_name	"xdfv"
        // edit_store_loc	"jhg"
        // edit_store_incharge	"yuiol"
        // edit_store_phone	"098765"
        // edit_store_status	"active"


        try {
            $stroeValidator = Validator::make($request->all(), [
                'edit_store_name' => 'required',
                'edit_store_loc' => 'required',
                'edit_store_incharge' => 'required',
                'edit_store_phone' => 'required',
                'edit_store_status' => 'required',
            ]);
            if ($stroeValidator->fails()) {
                return response()->json(['success' => false, 'msg' => $stroeValidator->messages()]);
            }

            $storeUpdate = StoreMaster::where('store_id', $request->edit_store_id)->update([
                'store_name' => $request->edit_store_name,
                'store_location' => $request->edit_store_loc,
                'store_incharge' => $request->edit_store_incharge,
                'store_phone' => $request->edit_store_phone,
                'store_status' => $request->edit_store_status
            ]);

            return response()->json(['success' => True, 'msg' => 'store succesfully Update']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    public function deleteStore(Request $request)
    {
        try {
            $storeDelet = StoreMaster::where('store_id', $request->store_id)->delete();
            return response()->json(['success' => true, 'msg' => 'store deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}

// store_name
// store_location
// store_incharge
// store_phone
// store_status
