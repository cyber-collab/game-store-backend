<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubCategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/api-subcategories",
     *     summary="Get a list of categories",
     *     tags={"Sub-categories"},
     *     @OA\Response(response="200", description="Successful operation"),
     *     @OA\Response(response="401", description="Unauthorized")
     * )
     */
    public function index(): AnonymousResourceCollection
    {
        return SubCategoryResource::collection(SubCategory::all());
    }

    /**
     * @OA\Post(
     *     path="/api/api-subcategories",
     *     summary="Add a new category",
     *     tags={"Sub-categories"},
     *     @OA\Response(response="201", description="Category created"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="string", example="1"),
     *             @OA\Property(property="name", type="string", example="Lewis"),
     *             @OA\Property(property="slug", type="string", example="https://example.com/"),
     *             @OA\Property(property="status", type="int", example="1"),
     *         )
     *     )
     * )
     */
    public function store(CategoryRequest $request)
    {
        $category = SubCategory::create($request->validated());

        return new SubCategoryResource($category);
    }

    /**
     * @OA\Get(
     *     path="/api/api-subcategories/{id}",
     *     summary="Get a category",
     *     tags={"Sub-categories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the category",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Successful operation"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Category not found")
     * )
     */
    public function show(int $id)
    {
        $category = SubCategory::findOrFail($id);

        return new SubCategoryResource($category);
    }

    /**
     * Update information for a specific category.
     *
     * @OA\Put(
     *      path="/api/api-subcategories/{id}",
     *      tags={"Sub-categories"},
     *      summary="Update a category",
     *      description="Update information for a specific category",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="The ID of the category",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="name", type="string", maxLength=256),
     *                  @OA\Property(property="slug", type="string", maxLength=255),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Sub category updated successfully",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Sub category not found",
     *      ),
     * )
     **/
    public function update(CategoryRequest $request, int $id): SubCategoryResource
    {
        $category = SubCategory::findOrFail($id);
        $category->update($request->validated());

        return new SubCategoryResource($category);
    }

    /**
     * @OA\Delete(
     *     path="/api/api-subcategories/{id}",
     *     summary="Delete a category",
     *     tags={"Sub-categories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="id of the category",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Category deleted"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Category not found")
     * )
     */
    public function destroy(SubCategory $category)
    {
        $category->delete();

        return response()->noContent();
    }
}
