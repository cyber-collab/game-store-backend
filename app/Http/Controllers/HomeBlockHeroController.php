<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomeBlockHeroResource;
use App\Models\HomeBlockHero;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HomeBlockHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return HomeBlockHeroResource::collection(HomeBlockHero::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, HomeBlockHero $homeBlockHero): HomeBlockHeroResource
    {
        $homeBlockHero = HomeBlockHero::create($request->validated());

        return new HomeBlockHeroResource($homeBlockHero);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeBlockHero $homeBlockHero): HomeBlockHeroResource
    {
        $homeBlockHero->update($request->validated());

        return new HomeBlockHeroResource($homeBlockHero);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeBlockHero $homeBlockHero)
    {
        $homeBlockHero->delete();

        return response()->noContent();
    }
}
