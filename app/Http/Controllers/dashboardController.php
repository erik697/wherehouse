<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        
        $wherehouses = Product::selectRaw('wherehouses.*,
        SUM(case when type = "in" then amount else 0 end) - SUM(case when type = "out" then amount else 0 end) as amount
        ')
        ->join('log_products', 'products.id','=', 'log_products.product_id')
        ->join('wherehouse_products', 'wherehouse_products.id','=','log_products.wherehouse_product_id')
        ->join('wherehouses', 'wherehouse_products.wherehouse_id','=','wherehouses.id')
        ->groupBy('wherehouse_id')
        ->get();

        
        $listProduct = [];
        $listProductC =[];
        $productGood = Product::selectRaw('products.*,
        SUM(case when type = "in" && log_products.status = "good" then amount else 0 end) - SUM(case when type = "out" && log_products.status = "good" then amount else 0 end) as good')->groupBy('products.id')
        ->join('log_products', 'products.id','=', 'log_products.product_id')
        ->join('wherehouse_products', 'wherehouse_products.id','=','log_products.wherehouse_product_id')
        ->groupBy('product_id')
        ->orderBy('good', 'DESC')
        ->limit(5)
        ->get();

        foreach($productGood as $item){
            $listProduct[] = $item->name;
            $listProductC[] = $item->good;
        }

        $listProductGood= json_encode($listProduct);
        $listProductGoodC= json_encode($listProductC);

        $listProduct = [];
        $listProductC =[];
        $productGood = Product::selectRaw('products.*,
        SUM(case when type = "in" && log_products.status = "bad" then amount else 0 end) - SUM(case when type = "out" && log_products.status = "bad" then amount else 0 end) as bad')->groupBy('products.id')
        ->join('log_products', 'products.id','=', 'log_products.product_id')
        ->join('wherehouse_products', 'wherehouse_products.id','=','log_products.wherehouse_product_id')
        ->groupBy('product_id')
        ->orderBy('bad', 'DESC')
        ->limit(5)
        ->get();

        foreach($productGood as $item){
            $listProduct[] = $item->name;
            $listProductC[] = $item->bad;
        }

        $listProductBad= json_encode($listProduct);
        $listProductBadC= json_encode($listProductC);

        // dd($listProductBad, $listProductBadC);
        return view('welcome', compact('wherehouses','listProductBad','listProductGood','listProductBadC','listProductGoodC'));
    }
    
}
