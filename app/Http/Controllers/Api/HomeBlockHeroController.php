<?php

namespace App\Http\Controllers\Api;

use App\Models\HomeBlockHero;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeBlockHeroRequest;
use App\Http\Resources\HomeBlockHeroResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
class HomeBlockHeroController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/api-home-hero",
     *     summary="Display a listing of the home block heroes",
     *     tags={"Home Block Heroes"},
     *     @OA\Response(
     *         response=200,
     *         description="List of home block heroes"
     *     )
     * )
     */
    public function index(): AnonymousResourceCollection
    {
        return HomeBlockHeroResource::collection(HomeBlockHero::all());
    }

    /**
     * @OA\Post(
     *     path="/api/api-home-hero",
     *     summary="Store a newly created home block hero",
     *     tags={"Home Block Heroes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="string", example="1"),
     *             @OA\Property(property="title", type="string", example="Lorem ipsum dolor sit"),
     *             @OA\Property(property="description", type="string", example="Lorem ipsum dolor sit")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Home block hero created successfully"
     *     )
     * )
     */

    public function store(HomeBlockHeroRequest $request, HomeBlockHero $homeBlockHero): HomeBlockHeroResource
    {
        $homeBlockHero = HomeBlockHero::create($request->validated());

        return new HomeBlockHeroResource($homeBlockHero);
    }

    /**
     * @OA\Put(
     *     path="/api/api-home-hero/{homeBlockHero}",
     *     summary="Update the specified home block hero",
     *     tags={"Home Block Heroes"},
     *     @OA\Parameter(
     *         name="homeBlockHero",
     *         in="path",
     *         description="ID of the home block hero",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="New Title"),
     *             @OA\Property(property="description", type="string", example="New Description")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Home block hero updated successfully"
     *     )
     * )
     */

    public function update(HomeBlockHeroRequest $request, int $id): HomeBlockHeroResource
    {
        $homeBlockHero = HomeBlockHero::findOrFail($id);
        $homeBlockHero->update($request->validated());

        return new HomeBlockHeroResource($homeBlockHero);
    }

    /**
     * @OA\Delete(
     *     path="/api/api-home-hero/{homeBlockHero}",
     *     summary="Remove the specified home block hero",
     *     tags={"Home Block Heroes"},
     *     @OA\Parameter(
     *         name="homeBlockHero",
     *         in="path",
     *         description="ID of the home block hero",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Home block hero deleted successfully"
     *     )
     * )
     */
    public function destroy(HomeBlockHero $homeBlockHero): Response
    {
        $homeBlockHero->delete();

        return response()->noContent();
    }
}
