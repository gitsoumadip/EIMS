<?php

namespace App\Http\Controllers;

use App\Models\BrandMaster;
use App\Models\CategoryMaster;
use App\Models\ItemTbls;
use App\Models\ModelMaster;
use App\Models\StockMaster;
use App\Models\StoreMaster;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StockeController extends Controller
{
    public function index()
    {
        // $data['stocks'] = StockMaster::with('brands', 'categories','item','modelNumber')->get();
        // $data['item'] = ItemTbls::all();

        // $data['item'] = ItemTbls::select('item_name', 'item_category', 'item_brand', 'item_model_no')
        //     ->groupBy('item_name', 'item_category', 'item_brand', 'item_model_no')
        //     ->get();

        // $data['item'] = ItemTbls::select('item_name', 'item_category', 'item_brand', 'item_model_no','item_total_qty')
        //     ->groupBy('item_name', 'item_category', 'item_brand', 'item_model_no','item_total_qty')
        //     ->get();

        // $data['item'] = ItemTbls::select('item_name', 'item_category', 'item_brand', 'item_model_no','item_total_qty')
        //     ->groupBy('item_name')
        //     ->get();

        // $data['item'] = DB::table('item_tbls')
        //     ->select('item_name', 'item_category', 'item_brand', 'item_model_no', 'item_total_qty', DB::raw('count(*) as total'))
        //     ->groupBy('item_name', 'item_category', 'item_brand', 'item_model_no', 'item_total_qty')
        //     ->get();

        // $data['item'] = DB::table('item_tbls')
        //     ->select('item_name', 'item_category', 'item_brand', 'item_model_no',  DB::raw('SUM(`item_total_qty`) as total'), DB::raw('SUM(`item_sale_qty`)as outitem'))
        //     ->groupBy('item_name', 'item_category', 'item_brand', 'item_model_no')
        //     ->get();

        $data['item'] = ItemTbls::with('categories', 'brands', 'products', 'storeloc', 'modelNo')
            ->select(
                'products_id',
                'category_id',
                'brand_id',
                'models_id',
                DB::raw('SUM(`item_sale_qty`)as outitem'),
                DB::raw('sum(`item_total_qty`)as total')
            )
            ->groupBy('products_id', 'category_id', 'brand_id', 'models_id')
            ->orderBy('products_id', 'asc')
            ->get();

        return view('stock.stock', $data);
    }
}
// SELECT SUM(`item_sale_qty`)as `outitem`,sum(`item_total_qty`)as `total` FROM `item_tbls`
// GROUP BY `item_name`, `item_category`, `item_brand`, `item_model_no`;
