<?php

namespace App\Http\Controllers;

use App\Http\Requests\Activity\StoreRequest;
use App\Http\Requests\Activity\UpdateRequest;
use App\Http\Resources\Activity\ActivityResource;
use App\Http\Resources\Activity\ShowResource;
use App\Models\Activity;
use App\Services\ActivityService;

class ActivityController extends Controller
{
    public function __construct(protected ActivityService $activityService) {}

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ShowResource::collection(Activity::simplePaginate(15));
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|object
     */
    public function store(StoreRequest $request)
    {
        $activity = Activity::create($request->validated());
        return response(['data' => ShowResource::make($activity)], 201);
    }

    /**
     * @param Activity $activity
     * @return ShowResource
     */
    public function show(Activity $activity)
    {
        return ShowResource::make($activity);
    }

    /**
     * @param UpdateRequest $request
     * @param Activity $activity
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|object
     */
    public function update(UpdateRequest $request, Activity $activity)
    {
        $activity = $this->activityService->update($activity, $request->validated());
        return response(['data' => ShowResource::make($activity)], 201);
    }

    /**
     * @param Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return response()->noContent();
    }

    /**
     * @param Activity $activity
     * @return ActivityResource
     */
    public function organizations(Activity $activity)
    {
        return ActivityResource::make($activity);
    }

    /**
     * @param Activity $activity
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function search(Activity $activity)
    {
        $activities = $this->activityService->getActivityWithDescendants($activity);
        return ShowResource::collection($activities);
    }
}
