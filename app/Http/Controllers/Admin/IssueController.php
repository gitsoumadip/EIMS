<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryMaster;
use App\Models\EventMaster;
use App\Models\ItemTbls;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    //
    public function index()
    {
        $data['eventOrderId'] = EventMaster::all();
        $data['category'] = CategoryMaster::all();
        // return $data;
        return view('issues.issue',$data);
    }


    public function eventOredr(Request $request)
    {
        //    print_r($_POST);
        // dd($request->eventId);
        // return $request->eventId;
        $eventId = $request->eventId;
        $eventAllData = EventMaster::where('id', $eventId)->first();
        return $eventAllData;
    }
    public function category(Request $request)
    {
        $categoryId=$request->post('categoryId');
        $brandId=ItemTbls::with('brands')->where('category_id', $categoryId)
        ->get();
        // dd($brandId);
        // return $brandId->brands['brand_name'];
        // $html='<option>select </option>';
        // foreach ($brandId as $brandIds){
        //     $html.=  "<option values='$brandIds->item_brand'>$brandIds->brands->brand_name</option>";
        // }
        // return $html;
        // echo $html;
        return response()->json(['brand'=>$brandId]);
        // print_r($brandId->brands);
    }
    public function brandId(Request $request)
    {
        $cId=$request->post('cId');
        $bId=$request->post('bId');

        $modelId=ItemTbls::with('modelNo')->where('category_id', $cId)->where('brand_id', $bId)->get();
        // return $modelId;
        // $html='<option>select </option>';
        // foreach ($modelId as $modelIds){
        // $html.= "<option values='$modelIds->item_model_no'>$modelIds->item_model_no</option>";
        // }
        // echo $html;
        return response()->json(['model'=>$modelId]);

    }
    public function modelId(Request $request){
        $cId=$request->post('cId');
        $bId=$request->post('bId');
        $mId=$request->post('mId');

        $product=ItemTbls::with('products')->where('category_id', $cId)->where('brand_id', $bId)->where('models_id', $mId)->get();
        // return $modelId;
        // $html='<option>select </option>';
        // foreach ($modelId as $modelIds){
        // $html.= "<option values='$modelIds->item_model_no'>$modelIds->item_model_no</option>";
        // }
        // echo $html;
        return response()->json(['product'=>$product]);
    }

    public function productId(Request $request){
        $cId=$request->post('cId');
        $bId=$request->post('bId');
        $mId=$request->post('mId');
        $pId=$request->post('pId');

        $productSerialNo=ItemTbls::where('category_id', $cId)
            ->where('brand_id', $bId)
            ->where('models_id', $mId)
            ->where('products_id', $pId)
            ->get();
        // return $modelId;
        // $html='<option>select </option>';
        // foreach ($modelId as $modelIds){
        // $html.= "<option values='$modelIds->item_model_no'>$modelIds->item_model_no</option>";
        // }
        // echo $html;
        return response()->json(['productSerialNo'=>$productSerialNo]);
    }
}
