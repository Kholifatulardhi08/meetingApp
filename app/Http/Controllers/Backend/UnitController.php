<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Http\Requests\UnitStoreRequest;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
      $this->middleware('permission:user-list', ['only' => ['index','show']]);
      $this->middleware('permission:user-create', ['only' => ['create','store']]);
      $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
      $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $units = Unit::all();
        if($request->has('search')){
            $units = Unit::where('name', 'like', "%{$request->search}%")->orWhere('code', 'like', "%{$request->search}%")->get();
        }
        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitStoreRequest $request)
    {
        Unit::create([
            'name' => $request->name,
            'code' => $request->code
        ]);
        return redirect()->route('units.index')->with('message', 'Unit created Succsesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $units, $id)
    {
        $units = Unit::find($id);
        return view('units.edit', compact('units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $units, $id)
    {
        $units = Unit::find($id);
        $units->name = $request->name;
        $units->code = $request->code;
        $units->update();
        return redirect()->route('units.index')->with('message','Unit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Unit $units, $id)
    {
        $units = Unit::find($id);
        $units->delete();
        return redirect()->route('units.index')->with('message','Unit Deleted Successfully');
    }
}
