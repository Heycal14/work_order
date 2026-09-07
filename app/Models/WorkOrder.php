<?php

namespace App\Models;

use App\Enums\WorkOrderStatus;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = ['title', 'description', 'status'];

    protected $casts = [
        'status' => WorkOrderStatus::class,
    ];
}