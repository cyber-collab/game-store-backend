<?php

namespace App\Http\Controllers\Api;

use App\Models\Banner;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Resources\BannerResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return BannerResource::collection(Banner::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request): BannerResource
    {
        $banner = Banner::create($request->validated());

        return new BannerResource($banner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, string $id): BannerResource
    {
        $banner = Banner::findOrFail($id);
        $banner->update($request->validated());

        return new BannerResource($banner);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return response()->noContent();
    }
}
