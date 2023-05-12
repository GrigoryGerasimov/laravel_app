<?php

namespace App\Http\Controllers\Todo\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Todo\TodoResource;
use App\Models\Todo;

final class DestroyController extends Controller
{
    public function __invoke(Todo $todo): TodoResource
    {
        $todo->delete();

        return new TodoResource($todo);
    }
}
