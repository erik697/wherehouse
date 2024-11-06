<?php

namespace App\Http\Controllers;

use App\Http\Requests\WherehouseStoreRequest;
use App\Http\Requests\WherehouseUpdateRequest;
use App\Models\Wherehouse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class WherehouseController extends Controller
{
    public function index(Request $request)
    {
        $wherehouses = Wherehouse::all();

        return view('wherehouse.index', compact('wherehouses'));
    }

    public function create(Request $request)
    {
        return view('wherehouse.create');
    }

    public function store(WherehouseStoreRequest $request)
    {
        $wherehouse = Wherehouse::create($request->validated());

        Session::flash('message', 'Success Add Wherehouse'); 

        return redirect()->route('wherehouses.index');
    }

    public function show(Request $request, Wherehouse $wherehouse)
    {
        return view('wherehouse.show', compact('wherehouse'));
    }

    public function edit(Request $request, Wherehouse $wherehouse)
    {
        return view('wherehouse.edit', compact('wherehouse'));
    }

    public function update(WherehouseUpdateRequest $request, Wherehouse $wherehouse)
    {
        $wherehouse->update($request->validated());

        Session::flash('message', 'Success Update Wherehouse'); 

        return redirect()->route('wherehouses.index');
    }

    public function destroy(Request $request, Wherehouse $wherehouse)
    {
        $wherehouse->delete();

        Session::flash('message', 'Success Delete Wherehouse'); 

        return redirect()->route('wherehouses.index');
    }
}
