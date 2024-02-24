<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\HomeBlockHero;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeBlockHeroRequest;
use App\Http\Resources\HomeBlockHeroResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HomeBlockHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $homeBlockHero = HomeBlockHero::lastes();
        return view('home.block-hero.index', compact('homeBlockHero'));
        // return HomeBlockHeroResource::collection(HomeBlockHero::all());
    }

    public function create(): View
    {
        return view('home.block-hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HomeBlockHeroRequest $request, HomeBlockHero $homeBlockHero): HomeBlockHeroResource
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
