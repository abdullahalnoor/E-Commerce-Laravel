<?php

namespace App\Providers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Support\ServiceProvider;
use View;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('*',function ($view){
            $view->with('categories', Category::where('publication_status',1)->get());
        });
        View::composer('*',function ($view){
            $view->with('brands', Brand::where('publication_status',1)->get());
        });
        View::composer('*',function ($view){
            $view->with('products',
                DB::table('products')
                ->join('categories','categories.id','=','products.category_id')
                ->join('brands','brands.id','=','products.brand_id')
                ->select('products.*','categories.category_name','brands.brand_name')
                ->orderBy('id','desc')
                ->get()
            );
            ///Product::where('publication_status',1)->orderBy('id','desc')->take(6)->get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
