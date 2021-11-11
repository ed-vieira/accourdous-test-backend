<?php

namespace App\Http\Controllers\Contracts;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Resources\Contracts\ContractResource;
use App\Repository\Contracts\ContractService;
use App\Http\Requests\Contracts\Request as ContractRequest;
use App\Http\Controllers\Auth\API_Controller;

class ContractController extends API_Controller
{


    protected $service;

    public function __construct(ContractService $service)
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
        return response()->json($data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractRequest $request)
    {
        $input = $request->all();
        $data = $this->service->create($input);
        return (new ContractResource($data))
                    ->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        return new ContractResource($contract);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(ContractRequest $request, Contract $contract)
    {
        $this->service->update($contract, $request->all());
        return new ContractResource($contract);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $this->service->delete($contract);
        return response()->json([],204);
    }
}
