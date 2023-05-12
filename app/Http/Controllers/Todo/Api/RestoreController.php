<?php

namespace App\Http\Controllers\Todo\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Todo\TodoResource;
use App\Http\Services\Todo\TodoService;
use App\Models\Todo;

final class RestoreController extends Controller
{
    public function __invoke($todoId): TodoResource
    {
        $todo = TodoService::restore($todoId);

        return new TodoResource($todo);
    }
}
