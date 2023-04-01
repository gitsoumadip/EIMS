<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Contracts\Validation\Validator;
use App\Models\SupplierTbls;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplerController extends Controller
{
    //
    public function index()
    {
        try {
            $data['supplier'] = SupplierTbls::all();
            return view('supplier.supplier', $data);
            // return response()->json(['success' => true, 'msg' => 'supplier added successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    public function addSupplier(Request $request)
    {
        // return $request;
        try {
            $input = $request->all();
            // dd($input);
            $validator = Validator::make($input, [
                'supplier_name' => 'required',
                'supplier_company_name' => 'required',
                'supplier_address' => 'required',
                'supplier_phone' => 'required',
                'supplier_comp_phone' => 'required',
                'supplier_email' => 'required',
                'supplier_status' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'msg' => $validator->messages()
                ]);
            }

            $supplier = SupplierTbls::insert([
                'sup_name' => $request->supplier_name,
                'sup_company_name' => $request->supplier_company_name,
                'sup_office_address' => $request->supplier_address,
                'sup_mob_no' => $request->supplier_phone,
                'sup_comp_mob_no' => $request->supplier_comp_phone,
                'sup_email' => $request->supplier_email,
                'sup_status' => $request->supplier_status,
            ]);

            return response()->json(['success' => true, 'msg' => 'supplier added successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
        // echo "jhgfd";
    }

    public function editSupplier(Request $request)
    {
        // return $request->id;
        $supplier = SupplierTbls::where('sup_id', $request->id)->get();
        return response()->json(['success' => true, 'data' => $supplier]);
    }


    public function updateSupplier(Request $request)
    {
        try {
            // return $request;
            $validator = Validator::make($request->all(), [
                'edit_supplier_name' => 'required',
                'edit_supplier_company_name' => 'required',
                'edit_supplier_address' => 'required',
                'edit_supplier_phone' => 'required',
                'edit_supplier_comp_phone' => 'required',
                'edit_supplier_email' => 'required',
                'edit_supplier_status' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, $validator->errors()]);
            }
            $supplierUpdate = SupplierTbls::where('sup_id', $request->edit_supplier_id)->update([
                'sup_name' => $request->edit_supplier_name,
                'sup_company_name' => $request->edit_supplier_company_name,
                'sup_office_address' => $request->edit_supplier_address,
                'sup_mob_no' => $request->edit_supplier_phone,
                'sup_comp_mob_no' => $request->edit_supplier_comp_phone,
                'sup_email' => $request->edit_supplier_email,
                'sup_status' => $request->edit_supplier_status,
            ]);
            return response()->json(['success' => True, 'msg' => 'supplier succesfully Update']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deleteSupplier(Request $request)
    {
        try {
            $supploireDelet = SupplierTbls::where('sup_id', $request->supplier_id)->delete();
            return response()->json(['success' => true, 'msg' => 'Item deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}


// {"_token":"Oofo8D5i5taxTx6Z25JAlIWHNIl9a2EXImSXzByI","edit_supplier_id":"1","supplier_name":"dfg","supplier_company_name":"sdfawsdfg","supplier_address":"sdcf","supplier_phone":"65432","supplier_comp_phone":"23456","supplier_email":"asdf","supplier_status":"inactive"}
// edit_supplier_name
// edit_supplier_company_name
// edit_supplier_address
// edit_supplier_phone
// edit_supplier_comp_phone
// edit_supplier_email
// edit_supplier_status
