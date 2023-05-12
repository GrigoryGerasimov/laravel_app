<?php

namespace App\Http\Controllers\Todo\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\TodoApiRequest;
use App\Http\Services\Todo\TodoService;
use App\Http\Resources\Todo\TodoResource;

final class StoreController extends Controller
{
    public function __invoke(TodoApiRequest $request): TodoResource
    {
        $todo = TodoService::store($request);

        return new TodoResource($todo);
    }
}
