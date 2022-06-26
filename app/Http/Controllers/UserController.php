<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return JsonResponse
     */

    public function allEmployees(): JsonResponse
    {
        try {
            $response = $this->userService->allEmployees();
            return response()->json($response);

        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ]);
        }
    }

    /**
     * @param int $employeeId
     * @return JsonResponse
     */

    public function schedulesOfEmployees(int $employeeId): JsonResponse
    {
        try {
            $response = $this->userService->schedulesOfEmployees($employeeId);
            return response()->json($response);

        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ]);
        }

    }

    /**
     * @param Request $request
     * @param int $employeeId
     * @return JsonResponse
     */

    public function employeeSchedulesAvailable(Request $request, int $employeeId): JsonResponse
    {
        $data = $request->all();
        $date = $data["date"];

        try {
            $response = $this->userService->employeeSchedulesAvailable($employeeId, $date);
            return response()->json($response);

        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ]);
        }
    }

    public function addServiceToEmployee(Request $request, $employeeId): JsonResponse
    {
        $serviceIds = $request->input("serviceIds");

        try {
            $response = $this->userService->addServiceToEmployee($serviceIds, $employeeId);
            return response()->json($response);

        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ]);
        }

    }

    public function addScheduleToEmployee(Request $request, $employeeId): JsonResponse
    {
        $scheduleIds = $request->input("scheduleIds");

        try {
            $response = $this->userService->addScheduleToEmployee($scheduleIds, $employeeId);
            return response()->json($response);

        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ]);
        }

    }


}
