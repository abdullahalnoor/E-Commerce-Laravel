<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\SubImage;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
   public function showProductForm(){
       $publishedCategory = Category::where('publication_status',1)->get();
       $publishedBrand = Brand::where('publication_status',1)->get();
       return view('admin.product.add-product',[
           'categories'=>$publishedCategory,
           'brands'=>$publishedBrand
       ]);
   }
   public function saveProductInfo(Request $request){
       $productImage = $request->file('product_image');
       $imageName = $productImage->getClientOriginalName();
       $imageDrectory ='product-images/';
       $productImage->move($imageDrectory,$imageName);
       $imageUrl = $imageDrectory.$imageName;

       $product = new Product();
       $product->product_name = $request->product_name;
       $product->category_id = $request->category_id;
       $product->brand_id = $request->brand_id;
       $product->product_info = $request->product_info;
       $product->product_details = $request->product_details;
       $product->product_image = $imageUrl;
       $product->product_quantity = $request->product_quantity;
       $product->product_price = $request->product_price;
       $product->publication_status = $request->publication_status;
       $product->save();

       $productId = $product->id;


       $productSubImages = $request->file('sub_image');
       foreach($productSubImages as $productSubImage){
           $subImageName =$productSubImage->getClientOriginalName();
           $subImageDirectory = 'product-sub-images/';
           $productSubImage->move($subImageDirectory,$subImageName);
           $subImageUrl =$subImageDirectory.$subImageName;

           $subImage = new SubImage();
           $subImage->product_id = $productId;
           $subImage->sub_image = $subImageUrl;
           $subImage->save();
       }


       return redirect('/product/add-product')->with('message','Product info save successfully !!');
   }

   public function showProductManageTable(){
       $products=  DB::table('products')
                       ->join('categories','categories.id','=','products.category_id')
                       ->join('brands','brands.id','=','products.brand_id')
                       ->select('products.*','categories.category_name','brands.brand_name')
                       ->orderBy('id','desc')
                       ->get();
      return view('admin.product.manage-product',[
          'products'=>$products
      ]);
   }

   public function unpublishedProductInfo($id){
      $unpublishedProductInfo = Product::find($id);
       $unpublishedProductInfo->publication_status = 0;
       $unpublishedProductInfo->save();

       return redirect('/product/manage-product')->with('message','Product info unpublished successfully !!');
   }
   public function publishedProductInfo($id){
      $unpublishedProductInfo = Product::find($id);
       $unpublishedProductInfo->publication_status = 1;
       $unpublishedProductInfo->save();

       return redirect('/product/manage-product')->with('message','Product info published successfully !!');
   }
   public function deleteProductInfo($id){
       $deleteProductInfo = Product::find($id);
        @unlink($deleteProductInfo->product_name);
       $subImages = SubImage::where('sub_images.product_id','=',$id)->get();
       foreach($subImages as $subImage){
           @unlink($subImage->sub_image);
           $subImage->delete();
       }
       $deleteProductInfo->delete();
       return redirect('/product/manage-product')->with('message','Product info delete successfully !!');

   }
   public function editProductInfo($id){

        $currentProductInfo =  DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('categories.category_name','brands.brand_name','products.*')->where('products.id','=',$id)
            ->first();
        $publishedCategory = Category::where('publication_status',1)->get();
        $publishedBrand = Brand::where('publication_status',1)->get();
        $publishedSubImage = SubImage::where('sub_images.product_id','=',$id)->get();
        return view('admin.product.edit-product',[
            'product'=>$currentProductInfo,
            'categories'=>$publishedCategory,
            'brands'=>$publishedBrand,
            'subImages'=>$publishedSubImage
        ]);

   }
   public function updateProductInfo(Request $request){
        $product =Product::find($request->id);
        @unlink($product->product_image);
        $subImages = SubImage::where('sub_images.product_id','=',$product->id)->get();
        foreach ($subImages as $subImage){
            @unlink($subImage->sub_image);
        }
        $productImage =$request->file('product_image');
       $imageName =$productImage->getClientOriginalName();
       $imageDirectory ='product-images/';
       $imageUrl = $imageDirectory.$imageDirectory;
       $productImage->move($imageDirectory,$imageName);

       $product->product_name = $request->product_name;
       $product->category_id = $request->category_id;
       $product->brand_id = $request->brand_id;
       $product->product_info = $request->product_info;
       $product->product_details = $request->product_details;
       $product->product_image = $imageUrl;
       $product->product_quantity = $request->product_quantity;
       $product->product_price = $request->product_price;
       $product->publication_status = $request->publication_status;
       $product->save();

       $productId = $product->id;
        $subImages = $request->file('sub_image');
        foreach ($subImages as $subImage){
            $subImageName = $subImage->getClientOriginalName();
            $subImageDirectory = 'product-sub-images/';
            $subImageUrl = $subImageDirectory.$subImageName;
            $subImage->move($subImageDirectory,$subImageName);


            $subImage = new SubImage();
            $subImage->product_id = $productId;
            $subImage->sub_image = $subImageUrl;
            $subImage->save();

        }


   }







}
