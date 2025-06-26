<?php

namespace App\Http\Controllers;

use App\Http\Requests\Activity\StoreRequest;
use App\Http\Requests\Activity\UpdateRequest;
use App\Http\Resources\Activity\ActivityResource;
use App\Http\Resources\Activity\ShowResource;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ShowResource::collection(Activity::simplePaginate(15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $activity = Activity::create($request->validated());
        return response(['data' => ShowResource::make($activity)], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return ShowResource::make($activity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Activity $activity)
    {
        $activity->update($request->validated());
        return response(['data' => ShowResource::make($activity)], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return response()->noContent();
    }

    public function organizations(Activity $activity)
    {
        return ActivityResource::make($activity);
    }

    public function search(Activity $activity)
    {
        $activityIds = [$activity->id];
        $activityIds = array_merge($activityIds, $activity->getIdsNesting());
        $activities = Activity::with('organizations')->without('parent')->whereIn('id', $activityIds)->get();
        return ShowResource::collection($activities);
    }
}
