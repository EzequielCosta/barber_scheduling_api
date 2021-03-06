<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        try {
            $response = $this->userService->update($data, $id);
            return response()->json($response);

        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage(),
            ], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
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
            ], 401);
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
            ], 401);
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
            ], 401);
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
            ], 401);
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
            ], 401);
        }

    }

    /**
     * @return JsonResponse
     */

    public function allCustomers(): JsonResponse
    {
        try {
            $response = $this->userService->allCustomers();
            return response()->json($response);

        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ], 401);
        }
    }

    /**
     * @param int $employeeId
     * @return JsonResponse
     */
    public function serviceOfEmployee(int $employeeId): JsonResponse
    {
        try {
            $response = $this->userService->serviceOfEmployee($employeeId);
            return response()->json($response);

        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ], 401);
        }
    }

    /**
     * @param int $customerId
     * @return JsonResponse
     */

    public function showCustomer(int $customerId): JsonResponse
    {
        try {
            $response = $this->userService->findCustomer($customerId);
            return response()->json($response);

        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ], 401);
        }
    }

    /**
     * @param int $id
     * @return JsonResponse
     */

    public function schedulingsOfEmployees(int $id): JsonResponse
    {

        try {
            $response = $this->userService->scheduligsOfEmployee($id);
            if (array_key_exists("error", $response)) {

                return response()->json([
                    "error" => $response
                ], 401);
            }
            return response()->json($response);

        } catch (Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ], 401);
        }
    }
}
