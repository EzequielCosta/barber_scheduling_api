<?php

namespace App\Http\Controllers;

use App\Services\ServicesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psy\Util\Json;

class ServiceController extends Controller
{
    private ServicesService $servicesService;

    public function __construct( ServicesService $servicesService){
        $this->servicesService = $servicesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $allServices = $this->servicesService->all();

        return response()->json($allServices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $objectCreated = $this->servicesService->store($request->all());
            return  response()->json($objectCreated, 201);
        }catch (\Exception $e){
            return  response()->json(["error" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        try {
            $object =  $this->servicesService->show($id);
            return  response()->json($object);
        }catch (\Exception $e){
            return \response()->json(["error" => $e->getMessage()]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        try {
            $object = $this->servicesService->update($request->all(), $id);
            return response()->json($object);
        }catch (\Exception $e){
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $object =  $this->servicesService->destroy($id);
            return response()->json($object);
        }catch (Exception $e){
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}
