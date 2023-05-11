<?php

namespace App\Http\Controllers\Todo\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\TodoRequest;
use App\Http\Services\Todo\TodoService;
use App\Http\Resources\Todo\TodoResource;

class StoreController extends Controller
{
    public function __invoke(TodoRequest $request): TodoResource
    {
        $todo = TodoService::store($request);

        return new TodoResource($todo);
    }
}
