<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryMaster;
use Exception;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryMaster::all();
        return view('category.category', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'cat_name' => 'required|string',
                'cat_slug' => 'required|string',
                'cat_status' => ['required', 'in:active,inactive']
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            CategoryMaster::insert([
                'cat_name' => $request->cat_name,
                'cat_slug' => $request->cat_slug,
                'cat_status' => $request->cat_status
            ]);

            return response()->json(['success' => true, 'msg' => 'Category added successfully']);
        } catch (\Exception $e) {
            response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function editCategory(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'cat_name' => 'required|string',
                'cat_slug' => 'required|string',
                'cat_status' => ['required', 'in:active,inactive']
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            CategoryMaster::where('cat_id', $request->cat_id)->update([
                'cat_name' => $request->cat_name,
                'cat_slug' => $request->cat_slug,
                'cat_status' => $request->cat_status
            ]);

            return response()->json(['success' => true, 'msg' => 'Category Updated successfully']);
        } catch (\Exception $e) {
            response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deleteCategory(Request $request)
    {
        try {
            CategoryMaster::where('cat_id', $request->cat_id)->delete();
            return response()->json(['success' => true, 'msg' => 'Category deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
