<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandMaster;
use App\Models\CategoryMaster;
use App\Models\ProductMaster;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Exception;


class ProductController extends Controller
{
    //
    public function index()
    {
        $data['products'] = ProductMaster::all();
        return view('product.product', $data);
    }

    public function addProduct(Request $request)
    {
        // return $request ;
        try {
            $validator = Validator::make($request->all(), [
                'product_name' => 'required',
                'product_desc' => 'required',
                'product_status' => ['required', 'in:available,unavailable'],
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, $validator->errors()]);
            }

            ProductMaster::Insert([
                'product_name' => $request->product_name,
                'product_desc' => $request->product_desc,
                'product_status' => $request->product_status,
            ]);

            return response()->json(['success' => true, 'msg' => 'Product added successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function editProduct(Request $request)
    {
        $items = ProductMaster::where('product_id', $request->id)->get();
        return response()->json(['success' => true, 'data' => $items]);
    }


    public function updateProduct(Request $request)
    {
        // return ['success'=>true,$request->input()];
        // return $request->input();
        try {
            $validator = Validator::make($request->all(), [
                'edit_product_id' => 'required',
                'edit_product_name' => 'required',
                'edit_product_desc' => 'required',
                'edit_product_status' => 'required'
            ]);
            // return $validator;
            if ($validator->fails()) {
                return response()->json(['success' => false, $validator->errors()]);
            }

            ProductMaster::where('product_id', $request->edit_product_id)->update([
                'product_name' => $request->edit_product_name,
                'product_desc' => $request->edit_product_desc,
                'product_status' => $request->edit_product_status
            ]);

            return response()->json(['success' => true, 'msg' => 'Item added successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deleteProduct(Request $request)
    {
        return $request->delete_product_id;
        try {

            ProductMaster::where('product_id', $request->item_id)->delete();
            return response()->json(['success' => true, 'msg' => 'Item deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
