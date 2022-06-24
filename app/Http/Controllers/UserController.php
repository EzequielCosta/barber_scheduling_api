<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PHPUnit\Framework\ExpectationFailedException;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct( UserService $userService)
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
            $response =  $this->userService->allEmployees();
            return response()->json($response);

        }catch (Exception $exception){
            return response()->json([
                "error" => $exception->getMessage()
            ]);
        }
    }

    public function schedulesOfEmployees(int $employeeId){
        try {
            $response = $this->userService->schedulesOfEmployees($employeeId);
            return response()->json($response);

        }catch (Exception $exception){
            return response()->json([
                "error" => $exception->getMessage()
            ]);
        }

    }
}
