<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\TodoRequest;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(TodoRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $todoData = $request->validated();

            $todoData['user_id'] = auth()->id();

            Todo::create($todoData);

            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
        }

        return redirect(route('todo.index'), 201);
    }
}
