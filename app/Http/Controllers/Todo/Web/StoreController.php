<?php

namespace App\Http\Controllers\Todo\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\TodoRequest;
use App\Http\Services\Todo\TodoService;
use Illuminate\Http\RedirectResponse;

final class StoreController extends Controller
{
    public function __invoke(TodoRequest $request): RedirectResponse
    {
        TodoService::store($request);

        return redirect(route('todo.index'), 201);
    }
}
