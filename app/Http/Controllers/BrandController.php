<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function showBrandForm(){
        return view('admin.brand.add-brand');
    }
    public function saveBrandInfo(Request $request){
      $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return redirect('/brand/add-brand')->with('message','Brand info save successfully !!');
    }
    public function showBrandManageTable(){
      $brands = Brand::orderBy('id','desc')->get();

      return view('admin.brand.manage-brand',[
          'brands'=>$brands
      ]);
    }
    public function unpublishedBrandInfo($id){
        $unpublishedBrand =  Brand::find($id);
        $unpublishedBrand->publication_status = 0;
        $unpublishedBrand->save();
        return redirect('/brand/manage-brand')->with('message','Brand info unpublished successfully !!');

    }
    public function publishedBrandInfo($id){
        $publishedBrand =  Brand::find($id);
        $publishedBrand->publication_status = 1;
        $publishedBrand->save();
        return redirect('/brand/manage-brand')->with('message','Brand info published successfully !!');

    }
    public function deleteBrandInfo($id){
        $deleteBrand = Brand::find($id);
        $deleteBrand->delete();
        return redirect('/brand/manage-brand')->with('message','Brand info delete successfully !!');

    }
    public function editBrandInfo($id){
        $brandById = Brand::find($id);

        return view('admin.brand.edit-brand',[
            'brand'=>$brandById
        ]);
    }
    public function updateBrandInfo(Request $request){
        $updateBrand = Brand::find($request->brand_id);
        $updateBrand->brand_name = $request->brand_name;
        $updateBrand->brand_description = $request->brand_description;
        $updateBrand->publication_status = $request->publication_status;
        $updateBrand->save();
        return redirect('/brand/manage-brand')->with('message','Brand info update successfully !!');
    }
}
