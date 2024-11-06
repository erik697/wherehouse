<?php

namespace App\Http\Controllers;

use App\Http\Requests\productStoreRequest;
use App\Http\Requests\productUpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class productController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function create(Request $request)
    {
        return view('product.create');
    }

    public function store(productStoreRequest $request)
    {
        // dd($request->all());
        $product = Product::create($request->validated());

        Session::flash('message', 'Success Adding Product'); 


        return redirect()->route('products.index');
    }

    public function show(Request $request, product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Request $request, product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(productUpdateRequest $request, product $product)
    {
        $product->update($request->validated());

        Session::flash('message', 'Success Update Product'); 

        return redirect()->route('products.index');
    }

    public function destroy(product $product)
    {
        $product->delete();

        Session::flash('message', 'Success Delete Product'); 

        return redirect()->route('products.index');
    }
}
