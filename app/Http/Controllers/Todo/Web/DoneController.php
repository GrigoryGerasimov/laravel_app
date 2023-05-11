<?php

namespace App\Http\Controllers\Todo\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\TodoRequest;
use App\Http\Services\Todo\TodoService;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DoneController extends Controller
{
    public function __invoke(Todo $todo, TodoRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            TodoService::update($todo, $request);

            $todo->delete();

            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
        }

        return redirect()->route('todo.index');
    }
}
