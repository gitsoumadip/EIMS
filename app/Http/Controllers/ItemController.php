<?php

namespace App\Http\Controllers;

use App\Models\BrandMaster;
use App\Models\CategoryMaster;
use App\Models\ProductMaster;
use App\Models\ModelMaster;
use App\Models\StoreMaster;
use App\Models\ItemTbls;
use App\Models\StockMaster;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * @title Item Views
     */
    public function index()
    {

        $data['items'] = ItemTbls::with('categories', 'brands', 'products', 'storeloc', 'modelNo')->get();
        $data['products'] = ProductMaster::all();
        $data['brands'] = BrandMaster::all();
        $data['categorys'] = CategoryMaster::all();
        $data['storeloc'] = StoreMaster::all();
        $data['modelNumber'] = ModelMaster::all();
        return view('item.item', $data);
    }

    /**
     * @title Add Itmes
     * @Request get items
     */
    public function addItem(Request $request)
    {
        try {
            // return $request;
            $validator = Validator::make($request->all(), [
                'item_name' => 'required',
                'item_category' => 'required',
                'item_brand' => 'required',
                'item_store_loc' => 'required|string',
                'item_model_no' => 'required',
                'item_serial_no' => 'required|string',
                'item_approx_rate' => 'required',
                'item_desc' => 'required',
                'item_status' => ['required', 'in:available,unavailable,damage'],
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, $validator->errors()]);
            }

            $itemAdd = ItemTbls::Insert([
                'products_id' => $request->item_name,
                'category_id' => $request->item_category,
                'brand_id' => $request->item_brand,
                'stores_id' => $request->item_store_loc,
                'models_id' => $request->item_model_no,
                'item_sl_no' => $request->item_serial_no,
                'item_approx_price' => $request->item_approx_rate,
                'item_desc' => $request->item_desc,
                'item_total_qty' => 1,
                'item_sale_qty' => 0,
                'item_status' => $request->item_status,
            ]);
            // products_id
            // category_id
            // brand_id
            // models_id
            // stores_id
            $this->stockAdd($cat = $request->item_category, $brand = $request->item_brand, $model = $request->item_model_no, $item = $request->item_name);
            return response()->json(['success' => true, 'msg' => 'Stock Add Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    /**
     * @title Add Stock item
     * @param request get $cat, $brand, $model, $item
     */
    public function stockAdd($cat, $brand, $model, $item)
    {

        $stocktable = StockMaster::where([
            ['category_id', $cat],
            ['brand_id', $brand],
            ['model_no_id', $model],
            ['item_id', $item]
        ])->first();

        if ($stocktable == null) {
            $stockCategory = StockMaster::create([
                'category_id' => $cat,
                'brand_id' => $brand,
                'model_no_id' => $model,
                'item_id' => $item,
                'in_item_qty' => 1,
                'out_item_qty' => 0,
                'remaing_stock' => 0

            ]);
        } else {
            $stockCategory = StockMaster::where('category_id', $cat)
                ->where('brand_id', $brand)
                ->where('model_no_id', $model)
                ->where('item_id', $item)
                ->update([
                    'category_id' => $cat,
                    'brand_id' => $brand,
                    'model_no_id' => $model,
                    'item_id' => $item,
                    'in_item_qty' => $stocktable['in_item_qty'] + 1,
                    'out_item_qty' => 0,
                    'remaing_stock' => 0
                ]);
        }
    }

    /**
     * @title item Edit
     * @param Request $request get item id
     */

    public function editItem(Request $request)
    {
        $data['item'] = ItemTbls::with('categories', 'brands', 'products', 'storeloc', 'modelNo')->where('item_id', $request->id)->get();
        $data['products'] = ProductMaster::all();
        $data['brands'] = BrandMaster::all();
        $data['categorys'] = CategoryMaster::all();
        $data['storeloc'] = StoreMaster::all();
        $data['modelNumber'] = ModelMaster::all();
        return response()->json(['success' => true, 'data' => $data]);
    }

    /**
     * @title update item
     * @param Request $request
     */

    public function updateItem(Request $request)
    {
        // return $request;
        try {
            $validator = Validator::make($request->all(), [
                'edit_item_id' => 'required',
                'edit_item_name' => 'required',
                'edit_item_brand' => 'required',
                'edit_item_category' => 'required',
                'edit_item_store_loc' => 'required',
                'edit_item_model_no' => 'required',
                'edit_item_serial_no' => 'required',
                'edit_item_approx_rate' => 'required',
                'edit_item_desc' => 'required',
                'edit_item_status' => 'required',

            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, $validator->errors()]);
            }
            $ItemsUpdate = ItemTbls::where('item_id', $request->edit_item_id)->update([
                'products_id' => $request->edit_item_name,
                'brand_id' => $request->edit_item_brand,
                'category_id' => $request->edit_item_category,
                'stores_id' => $request->edit_item_store_loc,
                'models_id' => $request->edit_item_model_no,
                'item_sl_no' => $request->edit_item_serial_no,
                'item_approx_price' => $request->edit_item_approx_rate,
                'item_desc' => $request->edit_item_desc,
                'item_status' => $request->edit_item_status,
            ]);
            return response()->json(['success' => True, 'msg' => 'Item succesfully Update']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    /**
     * @title Delete item
     * @param Request $request get items id
     */
    public function deleteItem(Request $request)
    {
        // return $request;
        try {
            ItemTbls::where('item_id', $request->delete_item_id)->delete();
            return response()->json(['success' => true, 'msg' => 'Item deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
