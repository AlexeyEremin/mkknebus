<?php

namespace App\Http\Controllers;

use App\Http\Requests\Building\SearchDistanceRequest;
use App\Http\Requests\Building\StoreRequest;
use App\Http\Requests\Building\UpdateRequest;
use App\Http\Resources\Building\OrganizationResource;
use App\Http\Resources\Building\ShowResource;
use App\Models\Building;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ShowResource::collection(Building::simplePaginate(15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $building = Building::create($request->validated());
        return response(['data' => ShowResource::make($building)], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        return ShowResource::make($building);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Building $building)
    {
        $building->update($request->validated());
        return response(['data' => ShowResource::make($building)], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $building->delete();
        return response()->noContent();
    }

    public function organizations(Building $building)
    {
        return OrganizationResource::make($building);
    }

    public function search(SearchDistanceRequest $request)
    {
        if($request->type == Building::TYPE_RADIUS_SEARCH) {
            $rawHaversine = '(6371 * acos(cos(radians(' . $request->latitude . ')) * cos(radians(latitude)) * cos(radians(longitude) - radians(' . $request->longitude . ')) + sin(radians(' . $request->latitude . ')) * sin(radians(latitude)))) as distance';
            $buildings = Building::query()->select(
                    [
                        'id',
                        DB::raw($rawHaversine)
                    ]
                )
                ->having('distance', '<=', $request->radius)
                ->get();
        } else {
            $latitudeDistance = $request->radiusX / 111.0;
            $longitudeDistance = $request->radiusY / (111.0 * deg2rad($request->latitude));
            $latitudeBetween = [
                ($request->latitude - $latitudeDistance),
                ($request->latitude + $latitudeDistance),
            ];
            $longitudeBetween = [
                ($request->longitude - $longitudeDistance),
                ($request->longitude + $longitudeDistance),
            ];

            $buildings = Building::query()
                ->select(['id'])
                ->whereBetween('latitude', [$latitudeBetween[0], $latitudeBetween[1]])
                ->whereBetween('longitude', [$longitudeBetween[0], $longitudeBetween[1]])
                ->get();
        }

        if($buildings->count() == 0) {
            return response([]);
        }

        $organizations = Organization::whereIn('building_id', $buildings->pluck('id'))->get();
        return ShowResource::collection($organizations);
    }
}
