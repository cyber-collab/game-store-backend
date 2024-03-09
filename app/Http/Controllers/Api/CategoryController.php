<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;


class CategoryController extends Controller
{
     /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Get a list of categories",
     *     tags={"Categories"},
     *     @OA\Response(response="200", description="Successful operation"),
     *     @OA\Response(response="401", description="Unauthorized")
     * )
     */
    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::all());
    }

    /**
     * @OA\Post(
     *     path="/api/categories",
     *     summary="Add a new category",
     *     tags={"Categories"},
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
        $category = Category::create($request->validated());

        return new CategoryResource($category);
    }

    /**
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     summary="Get a category",
     *     tags={"Categories"},
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
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

   /**
     * Update information for a specific category.
     *
     * @OA\Put(
     *      path="/api/category/{id}",
     *      tags={"Categories"},
     *      summary="Update a category",
     *      description="Update information for a specific student",
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
     *                  @OA\Property(property="status", type="int", maxLength=10),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Student updated successfully",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Student not found",
     *      ),
     * )
     **/
    public function update(Request $request, Category $category)
    {
        $category->update($request->validated());

        return new CategoryResource($category);
    }


    /**
     * @OA\Delete(
     *     path="/api/categories/{id}",
     *     summary="Delete a category",
     *     tags={"Categories"},
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
    public function destroy(Category $category): Response
    {
        $category->delete();

        return response()->noContent();
    }

}
