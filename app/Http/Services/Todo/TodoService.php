<?php

declare(strict_types=1);

namespace App\Http\Services\Todo;

use App\Http\Services\Service;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

final class TodoService extends Service
{
    public static function store(FormRequest $request): Model
    {
        try {
            DB::beginTransaction();

            $todoData = $request->validated();

            $todoData['user_id'] = auth()->id();

            $todo = Todo::create($todoData);

            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
        }

        return $todo;
    }

    public static function update(Model $model, FormRequest $request): Model
    {
        try{
            DB::beginTransaction();

            $todoData = $request->validated();

            $model->update($todoData);

            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
        }

        return $model;
    }
}
