<?php

use App\Http\Controllers\WorkOrderController;
use Illuminate\Support\Facades\Route;

Route::apiResource('work-orders', WorkOrderController::class);