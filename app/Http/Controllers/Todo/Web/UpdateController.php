<?php

namespace App\Http\Controllers\Todo\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\TodoRequest;
use App\Http\Services\Todo\TodoService;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;

final class UpdateController extends Controller
{
    public function __invoke(Todo $todo, TodoRequest $request): RedirectResponse
    {
        TodoService::update($todo, $request);

        return redirect()->route('todo.index');
    }
}
