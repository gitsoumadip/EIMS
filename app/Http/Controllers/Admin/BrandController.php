<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandMaster;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index()
    {
        $brands = BrandMaster::all();
        return view('brand.brand', compact('brands'));
    }

    public function addBrand(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'brand_name' => 'required|string',
                'brand_status' => ['required', 'in:active,inactive']
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $brand_data = [
                'brand_name' => $request->brand_name,
                'brand_status' => $request->brand_status
            ];
            BrandMaster::insert($brand_data);

            return response()->json(['success' => true, 'msg' => 'Brand added successfully']);
        } catch (\Exception $e) {
            response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function editBrand(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'brand_name' => 'required|string',
                'brand_status' => ['required', 'in:active,inactive']
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            $update_data = [
                'brand_name' => $request->brand_name,
                'brand_status' => $request->brand_status
            ];
            BrandMaster::where("brand_id", $request->brand_id)->update($update_data);

            return response()->json(['success' => true, 'msg' => 'Brand Updated successfully']);
        } catch (\Exception $e) {
            response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deleteBrand(Request $request)
    {
        try {
            BrandMaster::where('brand_id', $request->brand_id)->delete();
            return response()->json(['success' => true, 'msg' => 'Brand deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
