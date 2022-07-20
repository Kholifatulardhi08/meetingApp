<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meal;
use App\Http\Requests\MealStoreRequest;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $meals = Meal::all();
        if($request->has('search')){
            $meals = Meal::where('name', 'like', "%{$request->search}%")->orWhere('total', 'like', "%{$request->search}%")->get();
        }
        return view('meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MealStoreRequest $request)
    {
        Meal::create([
            'name' => $request->name,
            'total' => $request->total
        ]);
        return redirect()->route('meals.index')->with('message', 'Meal created Succsesfully!');
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
    public function edit(Meal $meals, $id)
    {
        $meals = Meal::find($id);
        return view('meals.edit', compact('meals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meals, $id)
    {
        $meals = Meal::find($id);
        $meals->name = $request->name;
        $meals->total = $request->total;
        $meals->update();
        return redirect()->route('meals.index')->with('message','Meal Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meals, $id)
    {
        $meals = Meal::find($id);
        $meals->delete();
        return redirect()->route('meals.index')->with('message','Meal Deleted Successfully');
    }
}
