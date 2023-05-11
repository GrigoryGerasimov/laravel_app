<?php

namespace App\Http\Controllers\Todo\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Todo\TodoService;
use App\Http\Requests\Todo\TodoRequest;
use App\Http\Resources\Todo\TodoResource;
use App\Models\Todo;

class UpdateController extends Controller
{
    public function __invoke(Todo $todo, TodoRequest $request): TodoResource
    {
        $todo = TodoService::update($todo, $request);

        return new TodoResource($todo);
    }
}
