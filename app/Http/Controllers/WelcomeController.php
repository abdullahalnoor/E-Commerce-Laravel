<?php

namespace App\Http\Controllers;

use App\Product;
use App\SubImage;
use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    public function index(){
        return view('front.home.home-content');
    }
    public function productCategory($id){
        //$productsCategory = Product::where('category_id',$id)->orderBy('id','desc')->get();
        //->join('sub_images','products.id','=','sub_images.product_id')

        $productsByCategory =  DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->where('category_id',$id)
            ->orderBy('id','desc')
            ->get();
    //return$productsByCategory;
//        $subImages = SubImage::where('product_id',$productsByCategory->id)->get();
//        return $subImages;

           $subImages = DB::table('products')
                ->join('categories','products.category_id','=','categories.id')
                ->join('sub_images','products.id','=','sub_images.product_id')
                ->select('sub_images.sub_image')
                ->where('category_id',$id)
                ->get();

        return view('front.product.product-category',[
            'productsByCategory'=>$productsByCategory,
            'subImages'=>$subImages
            //'subImages'=>$subImages
        ]);
    }

    public function productDetails($id){
        $productDetails = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->where('products.id',$id)
            ->first();
       $subImages = SubImage::where('product_id',$id)->get();

       $categoryProducts = Product::where('category_id',$productDetails->category_id)->get();
        //return$categoryProducts;
        return view('front.product.product-details',[
            'productDetails'=>$productDetails,
            'subImages'=>$subImages,
            'categoryProducts'=>$categoryProducts
        ]);
    }



}
