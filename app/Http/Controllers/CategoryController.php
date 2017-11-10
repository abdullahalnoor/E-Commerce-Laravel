<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function showCategoryForm(){
        return view('admin.category.add-category');
    }
    public function saveCategoryInfo(Request $request){
       $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect('/category/add-category')->with('message','Category info save successfully !!');
    }
    public function showCategoryManageTable(){
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.category.manage-category',[
            'categories'=>$categories
        ]);
    }
    public function unpublishedCategoryInfo($id){
       $unpublishedCategory =  Category::find($id);
        $unpublishedCategory->publication_status = 0;
        $unpublishedCategory->save();
        return redirect('/category/manage-category')->with('message','Category info unpublished successfully !!');

    }
    public function publishedCategoryInfo($id){
       $unpublishedCategory =  Category::find($id);
        $unpublishedCategory->publication_status = 1;
        $unpublishedCategory->save();
        return redirect('/category/manage-category')->with('message','Category info published successfully !!');

    }
    public function deleteCategoryInfo($id){
       $deleteCategory = Category::find($id);
        $deleteCategory->delete();
        return redirect('/category/manage-category')->with('message','Category info delete successfully !!');

    }
    public function showEditForm($id){
        $categoryById = Category::find($id);

        return view('admin.category.edit-category',[
            'category'=>$categoryById
        ]);
    }
    public function updateCategoryInfo(Request $request){
        $updateCategory = Category::find($request->category_id);
        $updateCategory->category_name = $request->category_name;
        $updateCategory->category_description = $request->category_description;
        $updateCategory->publication_status = $request->publication_status;
        $updateCategory->save();
        return redirect('/category/manage-category')->with('message','Category info update successfully !!');
    }
}
