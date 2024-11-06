<?php

namespace App\Http\Controllers;

use App\Models\LogProduct;
use App\Models\Product;
use App\Models\Wherehouse;
use App\Models\WherehouseProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ManageWherehouseController extends Controller
{
    function index(Request $request){

        $products = Product::selectRaw('products.*,
        SUM(case when type = "in" && log_products.status = "good" then amount else 0 end) - SUM(case when type = "out" && log_products.status = "good" then amount else 0 end) as good,
        SUM(case when type = "in" && log_products.status = "bad" then amount else 0 end) - SUM(case when type = "out" && log_products.status = "bad" then amount else 0 end) as bad,
        SUM(case when type = "in" then price * amount else 0 end) - SUM(case when type = "out" then price * amount else 0 end) as amount')->groupBy('products.id')
        ->join('log_products', 'products.id','=', 'log_products.product_id')
        ->join('wherehouse_products', 'wherehouse_products.id','=','log_products.wherehouse_product_id')
        ->where('wherehouse_id', $request->id)
        ->get();
// dd($request->all());
        $wherehouses = Wherehouse::get();
        $id=$request->id;
        return view('manageWherehouse.index',['id'=>$request->id], compact('products','wherehouses','id'));
    }

    function createNewProduct(Request $request){
        $products = Product::all();
        // dd($products);
        $wherehouse_id = $request->wherehouse_id;
        return view('manageWherehouse.create', compact('products', 'wherehouse_id'));
    }

    function storeNewProduct(Request $request){
        // dd($request->all());
        $products = []; 
        $data = [
                    'Wherehouse_id'=> $request->wherehouse_id,
                    'user_id'=> Auth::user()->id,
                    'status'=> 'success',
                    'register'=> date('Y-m-d')
                ];


                DB::transaction(function () use($data, $request, $products) {
                    $i=0;
                    $wherehouse_product = WherehouseProduct::create($data);
                    foreach($request->product_id as $item){
                        $products[] =[
                            "Wherehouse_product_id"=> $wherehouse_product->id,
                            "product_id"=> $item,
                            "amount"=> $request->amount[$i],
                            "type"=> $request->type[$i],
                            "status"=> $request->status[$i]
                        ];
                        $i++;
                    }
                    // LogProduct::insert($products);
                    DB::table('log_products')->insert($products);

                });

        Session::flash('message', 'Success Adding Product to Wherehouse'); 


        return redirect()->route('manageWherehouse.index',['id'=>$request->wherehouse_id]);
    }

    public function getProduct(Request $request)
    {
        $products = Product::where('code', $request->code)->first();
        return response()->json([
            'products' => $products,
            'request' => $request->all()
        ]);

    }

    function listLog(Request $request){
        $product = Product::where('id',$request->id)->first();
        $logs = LogProduct::with('wherehouseProduct')->where('product_id',$request->id)->get();
        return view('manageWherehouse.listLog', compact('logs','product'));
    }
}
