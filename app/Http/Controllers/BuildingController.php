<?php

namespace App\Http\Controllers;

use App\Http\Requests\Building\SearchDistanceRequest;
use App\Http\Requests\Building\StoreRequest;
use App\Http\Requests\Building\UpdateRequest;
use App\Http\Resources\Building\BuildingWithOrganizationsResource;
use App\Http\Resources\Building\ShowResource;
use App\Models\Building;
use App\Models\Organization;
use App\Services\BuildingSearchService;

class BuildingController extends Controller
{
    public function __construct(protected BuildingSearchService $buildingSearchService) {}

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ShowResource::collection(Building::simplePaginate(15));
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|object
     */
    public function store(StoreRequest $request)
    {
        $building = Building::create($request->validated());
        return response(['data' => ShowResource::make($building)], 201);
    }

    /**
     * @param Building $building
     * @return ShowResource
     */
    public function show(Building $building)
    {
        return ShowResource::make($building);
    }

    /**
     * @param UpdateRequest $request
     * @param Building $building
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|object
     */
    public function update(UpdateRequest $request, Building $building)
    {
        $building->update($request->validated());
        return response(['data' => ShowResource::make($building)], 201);
    }

    /**
     * @param Building $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        $building->delete();
        return response()->noContent();
    }

    /**
     * @param Building $building
     * @return BuildingWithOrganizationsResource
     */
    public function organizations(Building $building)
    {
        return BuildingWithOrganizationsResource::make($building);
    }

    /**
     * @param SearchDistanceRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response|object
     */
    public function search(SearchDistanceRequest $request)
    {
        if ($request->type === Building::TYPE_RADIUS_SEARCH) {
            $buildings = $this->buildingSearchService->findByRadius(
                $request->latitude,
                $request->longitude,
                $request->radius
            );
        } else {
            $buildings = $this->buildingSearchService->findByRectangle(
                $request->latitude,
                $request->longitude,
                $request->radiusX,
                $request->radiusY
            );
        }

        if ($buildings->isEmpty()) {
            return response([]);
        }

        $organizations = Organization::whereIn('building_id', $buildings->pluck('id'))->get();
        return ShowResource::collection($organizations);
    }
}
