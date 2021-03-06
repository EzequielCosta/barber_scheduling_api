<?php

namespace App\Http\Controllers;

use App\Services\ScheduleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScheduleController extends Controller
{
    private ScheduleService $scheduleService;

    public function __construct( ScheduleService $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $response = $this->scheduleService->allSchedules();
            return response()->json($response);
        } catch (\Exception $exception) {
            return response()->json(["error" => $exception->getMessage()],401);
        }
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
    public function store(Request $request): JsonResponse
    {

        $data = $request->all();

        try {
            $response = $this->scheduleService->store($data);
            if( is_array($response) &&  array_key_exists("error", $response) ){
                return response()->json(["error" => $response],401);
            }
            return response()->json($response);
        } catch (\Exception $exception) {
            return response()->json(["error" => $exception->getMessage()],401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $response = $this->scheduleService->destroy($id);
            return response()->json($response);
        } catch (\Exception $exception) {
            return response()->json(["error" => $exception->getMessage()],401);
        }
    }
}
