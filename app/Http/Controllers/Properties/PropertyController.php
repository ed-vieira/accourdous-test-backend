<?php

namespace App\Http\Controllers\Properties;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\Properties\Request as PropertyRequest;
use App\Http\Resources\Properties\PropertyResource;
use App\Http\Controllers\Auth\API_Controller;
use App\Repository\Properties\PropertyService;

class PropertyController extends API_Controller
{

    protected $service;

    public function __construct(PropertyService $service)
    {
        parent::__construct();
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search','');
        $data = $this->service->search($search)->paginate();
        return PropertyResource::collection($data);
    }

    public function addresses()
    {
        $data = $this->service->addresses()
                    ->whereContracted(false)->get();
        return PropertyResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $input = $request->all();
        $data = $this->service->create($input);
        return (new PropertyResource($data))
                ->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return new PropertyResource($property);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $this->service->update($property, $request->all());
        return new PropertyResource($property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $this->service->delete($property);
        return response()->json([],204);
    }


    public function trashed()
    {
        $search = request('search','');
        $data = $this->service->search($search)->onlyTrashed()->paginate();
        return PropertyResource::collection($data);
    }


    public function restore(Property $trashedProperty)
    {
        $this->service->restore($trashedProperty);
        return new PropertyResource($trashedProperty);
    }

}
