<?php

namespace App\Http\Controllers\Todo\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Todo\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Resources\Json\JsonResource;

final class ShowController extends Controller
{
    public function __invoke(Todo $todo): JsonResource
    {
        return new TodoResource($todo);
    }
}
