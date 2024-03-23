<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\ProductResource;
use App\Models\Partner;
use App\Models\Products\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\PartnerRequest;
use Illuminate\Http\Response;
use OpenApi\Annotations as OA;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/api-products",
     *     summary="Display a listing of products",
     *     tags={"Proudcts"},
     *     @OA\Response(
     *         response=200,
     *         description="List of products",
     *     )
     * )
     */
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * @OA\Post(
     *     path="/api/api-partners",
     *     summary="Store a newly created partner",
     *     tags={"Partners"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="link", type="string", example="https://example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Partner created successfully",
     *     )
     * )
     */
    public function store(PartnerRequest $request): PartnerResource
    {
        $partner = Partner::create($request->validated());

        return new PartnerResource($partner);
    }

    /**
     * @OA\Put(
     *     path="/api/api-partners/{id}",
     *     summary="Update the specified partner",
     *     tags={"Partners"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the partner",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="link", type="string", example="https://example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Partner updated successfully",
     *     )
     * )
     */
    public function update(PartnerRequest $request, string $id): PartnerResource
    {
        $partner = Partner::findOrFail($id);
        $partner->update($request->validated());

        return new PartnerResource($partner);
    }

    /**
     * @OA\Delete(
     *     path="/api/api-partners/{partner}",
     *     summary="Remove the specified partner from storage",
     *     tags={"Partners"},
     *     @OA\Parameter(
     *         name="partner",
     *         in="path",
     *         description="ID of the partner",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Partner deleted successfully"
     *     )
     * )
     */
    public function destroy(int $id): Response
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return response()->noContent();
    }
}
