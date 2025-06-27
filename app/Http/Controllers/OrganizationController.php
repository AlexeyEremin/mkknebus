<?php

namespace App\Http\Controllers;

use App\Http\Requests\Building\SearchRequest;
use App\Http\Requests\Organization\StoreRequest;
use App\Http\Requests\Organization\UpdateRequest;
use App\Http\Resources\Organization\OrganizationWithActivitiesResource;
use App\Http\Resources\Organization\ShowResource;
use App\Models\Organization;
use App\Services\OrganizationService;

class OrganizationController extends Controller
{
    public function __construct(protected OrganizationService $organizationService) {}

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ShowResource::collection(Organization::simplePaginate(15));
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|object
     */
    public function store(StoreRequest $request)
    {
        $organization = $this->organizationService->create($request->validated());
        return response(['data' => OrganizationWithActivitiesResource::make($organization)], 201);
    }

    /**
     * @param Organization $organization
     * @return ShowResource
     */
    public function show(Organization $organization)
    {
        return ShowResource::make($organization);
    }

    /**
     * @param UpdateRequest $request
     * @param Organization $organization
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|object
     */
    public function update(UpdateRequest $request, Organization $organization)
    {
        $organization = $this->organizationService->update($organization, $request->validated());
        return response(['data' => OrganizationWithActivitiesResource::make($organization)], 201);
    }

    /**
     * @param Organization $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        return response()->noContent();
    }

    /**
     * @param SearchRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function search(SearchRequest $request)
    {
        $organizations = Organization::query()->where('name', 'LIKE', '%' . $request->name . '%')->simplePaginate(20);
        return ShowResource::collection($organizations);
    }
}
