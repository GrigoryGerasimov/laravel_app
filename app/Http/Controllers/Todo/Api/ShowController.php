<?php

namespace App\Http\Controllers\Todo\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Todo\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowController extends Controller
{
    public function __invoke(Todo $todo): JsonResource
    {
        return new TodoResource($todo);
    }
}
