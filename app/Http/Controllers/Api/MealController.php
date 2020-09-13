<?php

namespace App\Http\Controllers\Api;

use App\Meal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return MealResource::collection(Meal::all());
        $meals = MealResource::collection(Meal::paginate(9));
        $response = [
            'pagination' => [
                'total' => $meals->total(),
                'per_page' => $meals->perPage(),
                'current_page' => $meals->currentPage(),
                'last_page' => $meals->lastPage(),
                'from' => $meals->firstItem(),
                'to' => $meals->lastItem(),
                'prev_link'=>($meals->currentPage())-1,
                'next_link'=>($meals->currentPage())+1
            ],
            'data' =>$meals
        ];
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        return new MealResource($meal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
