<?php

namespace App\Http\Controllers;

use App\Models\Scheduling;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SchedulingService;

class SchedulingController extends Controller
{
    private SchedulingService $schedulingService;

    public function __construct(SchedulingService $schedulingService)
    {
        $this->schedulingService = $schedulingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $response = $this->schedulingService->all();
            return response()->json($response);
        } catch (\Exception $exception) {
            return response()->json(["error" => $exception->getMessage()]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $response = $this->schedulingService->store($request->all());
            return response()->json($response, 201);
        } catch (\Exception $exception) {
            return response()->json(["error" => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $response = $this->schedulingService->show($id);
            return response()->json($response);
        } catch (\Exception $exception) {
            return response()->json(["error" => $exception->getMessage()]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
//        try {
//            $response = $this->schedulingService->destroy($id);
//            return response()->json($response);
//        } catch (\Exception $exception) {
//            return response()->json(["error" => $exception->getMessage()]);
//        }
    }

}
