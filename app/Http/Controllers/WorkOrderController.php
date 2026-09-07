<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkOrderRequest;
use App\Http\Requests\UpdateWorkOrderRequest;
use App\Models\WorkOrder;
use Illuminate\Http\JsonResponse;

class WorkOrderController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            WorkOrder::latest()->paginate(10)
        );
    }

    public function store(StoreWorkOrderRequest $request): JsonResponse
    {
        $workOrder = WorkOrder::create($request->validated());

        return response()->json($workOrder, 201);
    }

    public function show(WorkOrder $workOrder): JsonResponse
    {
        return response()->json($workOrder);
    }

    public function update(UpdateWorkOrderRequest $request, WorkOrder $workOrder): JsonResponse
    {
        $workOrder->update($request->validated());

        return response()->json($workOrder);
    }

    public function destroy(WorkOrder $workOrder): JsonResponse
    {
        $workOrder->delete();

        return response()->json(null, 204);
    }
}