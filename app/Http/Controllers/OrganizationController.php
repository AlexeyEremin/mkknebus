<?php

namespace App\Http\Controllers;

use App\Http\Requests\Building\SearchRequest;
use App\Http\Requests\Organization\StoreRequest;
use App\Http\Requests\Organization\UpdateRequest;
use App\Http\Resources\Organization\ShowActivityResource;
use App\Http\Resources\Organization\ShowResource;
use App\Models\Organization;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ShowResource::collection(Organization::simplePaginate(15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $organization = Organization::create($data);
        $organization->activities()->sync($data['activities']);

        return response(['data' => ShowActivityResource::make($organization)], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        return ShowResource::make($organization);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Organization $organization)
    {
        $data = $request->validated();
        $organization->update($data);
        if(isset($data['activities']))
            $organization->activities()->sync($data['activities']);

        $organization = Organization::find($organization->id);

        return response(['data' => ShowActivityResource::make($organization)], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        return response()->noContent();
    }

    public function search(SearchRequest $request)
    {
        $organizations = Organization::query()->where('name', 'LIKE', '%' . $request->name . '%')->simplePaginate(20);
        return ShowResource::collection($organizations);
    }
}
